<?php

namespace App\Http\Controllers;

use App\Item;
use App\Quantity;
use Illuminate\Http\Request;

use App\Http\Requests;

class ItemController extends Controller
{
    public function index()
    {
        if(auth()->user())
        {
                $items=Item::all();


                return view('product')->with('items',$items);

        }
        else
            return view('welcome');
    }
    public function insertItem(Request $request)
    {
        if(!auth()->user()){
            return redirect('/');
        }
        $item=Item::create([
            'name' => $request['item_name'],
            'tag' => $request['item_tag'],
            'price' => $request['item_price'],
        ]);
//        $tag=$request['item_tag'];
//        $name=$request['item_name'];
        $quantity=new Quantity();
        $quantity->item_quantity=$request['quantity'];
        $item->quantity()->save($quantity);
        //$item->quantity()->save($quantity);
        return back();
    }
    public function updateQuantity($name,$item_quantity)
    {
        if(!auth()->user()){
            return redirect('/');
        }

        $item=Item::where('name',$name)->first();
        dd($item);
        $quantity=new Quantity();
        $quantity->item_quantity=$item_quantity;
        $item->quantity()->save($quantity);
        return back();
    }
    public function deleteItem(Item $item)
    {
        if(!auth()->user()){
            return redirect('/');
        }

        $item->delete();
        return back();
    }
}
