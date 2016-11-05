<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;

class BatchController extends Controller
{
    public function index(Item $item)
    {
        if(auth()->user())
        {

            return view('batch_tag')->with('item',$item);

        }
        else
            return view('welcome');
    }
    public function enterBatch(Request $request){
        $item_id=$request['item_id'];
        $cartons=intval($request['cartons']);
        $piece_per_carton=intval($request['piece_per_carton']);
        $quantity=$cartons*$piece_per_carton;
        $batch=new Batch();
        $batch->item_id=$item_id;
        $batch->quantity=$quantity;
        $batch->manufacture=$request['manufacture'];
        $batch->expiry=$request['expiry'];
       $batch->tag=$request['tag'];
        $batch->save();
        echo "<script>alert('batch saved');</script>";
        return back();
    }
    public function updateBatchInfo(Request $request){
        $batch_id=$request['batch_id'];
        $addition=intval($request['addition']);
        $batch=Batch::where('id',$batch_id)->first();
        $batch->quantity=$batch->quantity+$addition;
        $batch->manufacture=$request['manufacture'];
        $batch->expiry=$request['expiry'];
        $batch->tag=$request['tag'];
        $batch->shrinkage=$request['shrinkage'];
        $batch->save();
        echo "<script>alert('batch updated');</script>";
        return back();
    }
    public function deleteBatch(Batch $batch)
    {
        if(!auth()->user()){
            return redirect('/');
        }

        $batch->delete();
        echo "<script>alert('batch deleted');</script>";
        return back();
    }
    public function updateBatchPage(Batch $batch)
    {
        if(auth()->user()){
            return view('batch_update')->with('batch',$batch);
        }
        return back();
    }
}
