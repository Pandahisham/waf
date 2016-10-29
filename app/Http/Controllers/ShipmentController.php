<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\Quantity;
use App\Shipment;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShipmentController extends Controller
{
    public function index()
    {
        if(auth()->user())
        {
            $orders=Order::where('status',0)->get();


            return view('shipment')->with('orders',$orders);

        }
        else
            return view('welcome');
    }
    public function addOrder(Request $request){
        $item_tag=$request['Item'];
        $cartons=intval($request['cartons']);
        $piece_per_carton=intval($request['piece_per_carton']);
        $price_per_carton=floatval($request['price_per_carton']);
        $wasted_cartons=intval($request['wasted_cartons']);
        $order=new Order();
        $item=Item::where('tag',$item_tag)->first();
        $item_id=$item->id;
        $order->item_id=$item_id;
        $order->status=0;
        $order->cartons=$cartons;
        $order->pieces_per_carton=$piece_per_carton;
        $order->wasted_cartons=$wasted_cartons;
        $order->total_price=$price_per_carton*$cartons;
        $order->wasted_price=$price_per_carton*$wasted_cartons;
        $order->save();
        return redirect('/shipment');
    }
    public function deleteOrder(Order $order)
    {
        if(!auth()->user()){
            return redirect('/');
        }

        $order->delete();
        return back();
    }
    public function addShipment($total_price,$wastage_price){
        if(auth()->user())
        {
            $orders=Order::where('status',0)->get();
            $shipment=Shipment::create([
                'total_price' => $total_price,
                'wastage_price' => $wastage_price,
            ]);

            foreach($orders as $order){
                $shipment->order()->save($order);
                $order->status=1;
                $order->save();
                $item_quantity=(($order->cartons)-($order->wasted_cartons))*($order->pieces_per_carton);
                $quantity=Quantity::where('item_id',$order->item_id)->first();
                $new_quantity=$item_quantity+($quantity->item_quantity);
                $quantity->item_quantity=$new_quantity;
                $quantity->save();

            }
            return redirect('/shipment');

        }

        return redirect('/welcome');
    }
}
