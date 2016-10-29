<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Customer;
use App\Item;
use App\Quantity;
use App\Sale;
use App\Transaction;
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
    public function addTransaction(Request $request){
        $item_tag=$request['item_tag'];
        $quanity=intval($request['item_quantity']);
        $customer_id=$request['customer_id'];

        $item=Item::where('tag',$item_tag)->first();
        $item_id=$item->id;
        $item_quanity=Quantity::where('item_id',$item_id)->first();
        if($item_quanity->item_quantity<$quanity){
            echo "Not enough items in the inventory";
            return back();
        }
        else{
        $transaction=new Transaction();
        $transaction->item_id=$item_id;
        $transaction->status=0;
        $transaction->item_quantity=$quanity;
        $transaction->item_price=$quanity*($item->price);
        $transaction->item_discount=0;
        $transaction->customer_id=$customer_id;
        $transaction->save();
        return back();
        }

    }
    public function deleteTransaction(Transaction $transaction)
    {
        if(!auth()->user()){
            return redirect('/');
        }

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
                $quantity=Quantity::where('item_id',$transaction->item_id)->first();
                $new_quantity=($quantity->item_quantity)-$item_quantity;
                $quantity->item_quantity=$new_quantity;
                $quantity->save();
                $this->adjustBatch($item_quantity,$transaction->item_id);
            }

            return back();

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
                $quantity=0;
                $batch->save();
            }
            else{
                $quantity=$quantity-($batch->quantity);
                $batch->quantity=0;
                $batch->save();
            }
        }
        return back();
    }
}
