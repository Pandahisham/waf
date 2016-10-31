<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Customer;
use App\Item;
use App\Quantity;
use App\Sale;
use App\Transaction;
use App\Offer;
use Illuminate\Http\Request;

use App\Http\Requests;

class SaleController extends Controller
{
    public function index(Customer $customer)
    {
        if(auth()->user())
        {

            $transactions=Transaction::where('status',0)->where('customer_id',$customer->id)->get();
            $saleinfo = array(
                'transactions'  => $transactions,
                'customer'   => $customer,
            );

            return view('sale')->with('saleinfo',$saleinfo);

        }
        else
            return view('welcome');
    }
    public function saleList()
    {
        if(auth()->user())
        {
                $sales=Sale::orderBy('created_at','desc')->get();


                return view('sales_new')->with('sales',$sales);

        }
        else
            return view('welcome');
    }
    public function receipt(Sale $sale)
    {
        if(auth()->user())
        {
            
                return view('receipt')->with('sale',$sale);

        }
        else
            return view('welcome');
    }
    public function addTransaction(Request $request){
        $item_tag=$request['item_tag'];
        $quantity=intval($request['item_quantity']);
        $customer_id=$request['customer_id'];
        $item=Item::where('tag',$item_tag)->first();
        $item_id=$item->id;
        $item_quantity=Quantity::where('item_id',$item_id)->first();
        if($item_quantity->item_quantity<$quantity){
            echo "Not enough items in the inventory";
            return back();
        }
        else{
        $offer=Offer::where('item_id',$item_id)->first();
        $date=date('Y-m-d');
        $discount=0;
        if(($offer->validity>$date) && ($quantity>=$offer->quantity)){
            $discount=$offer->price;
        }    
        $transaction=new Transaction();
        $transaction->item_id=$item_id;
        $transaction->status=0;
        $transaction->item_quantity=$quantity;
        $transaction->item_price=$quantity*($item->price);
        $transaction->item_discount=$discount;
        $transaction->customer_id=$customer_id;
        $transaction->save();
        $item_quantity->item_quantity=($item_quantity->item_quantity)-$quantity;
        $item_quantity->save();
        return back();
        }

    }
    public function deleteTransaction(Transaction $transaction)
    {
        if(!auth()->user()){
            return redirect('/');
        }
        $item_quantity=Quantity::where('item_id',$transaction->item_id)->first();
        $item_quantity->item_quantity=($item_quantity->item_quantity)+$transaction->item_quantity;
        $item_quantity->save();
        $transaction->delete();
        return back();
    }
    public function addSale($total_price,$total_discount,$customer_id,$vat){
        if(auth()->user())
        {
            $transactions=Transaction::where('status',0)->where('customer_id',$customer_id)->get();
            $sale=Sale::create([
                'customer_id' =>$customer_id,
                'total' => $total_price,
                'discount' => $total_discount,
                'vat' => $vat,
                'status'=>0,
            ]);

            foreach($transactions as $transaction){
                $sale->transaction()->save($transaction);
                $transaction->status=1;
                $transaction->save();
                $item_quantity=$transaction->item_quantity;
                $this->adjustBatch($item_quantity,$transaction->item_id);
            }

            return view('receipt')->with('sale',$sale);

        }

        return redirect('/welcome');
    }
    public function adjustBatch($item_quantity,$item_id)
    {
        if(!auth()->user()){
            return redirect('/');
        }
        $quantity=$item_quantity;
        $bathces=Batch::where('item_id',$item_id)->orderBy('expiry','asc')->get();
        foreach($bathces as $batch){
            if($quantity===0)
            {
                break;
            }
            elseif(($batch->quantity)>=$quantity)
            {
                $batch->quantity=($batch->quantity)-$quantity;
                $batch->sell=$quantity;
                $quantity=0;
                $batch->save();
            }
            else{
                $quantity=$quantity-($batch->quantity);
                $batch->sell=$batch->quantity;
                $batch->quantity=0;
                $batch->save();
            }
        }
        return back();
    }
}
