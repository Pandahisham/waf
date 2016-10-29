@extends('layouts.home')

<link rel="stylesheet" type="text/css" href="{{ asset('css/shipment.css')}}">


@section('order')
<?php $items=\App\Item::all();?>

<div class="order_form">
	<h2>Goods Receipt Form</h2>

	<div class="row">
        <div class="col-md-6">

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/addOrder') }}">
                {{ csrf_field() }}

  				<div class="dropdown">
  				<label for="cartons" class="col-sm-4 control-label">Item Code</label>
                    <select name="Item">
                        @foreach($items as $item)
                            <option value={{$item->tag}} >{{$item->tag}}</option>
                        @endforeach
                    </select>
				</div>

  				<div class="form-group">
				<label for="cartons" class="col-sm-4 control-label">Cartons</label>

				<div class="col-sm-4">
					<input type="number" class="form-control" id="cartons" name="cartons">
				</div>
				</div>


  				<div class="form-group">
    				<label for="piece_per_carton" class="col-sm-4 control-label">Pieces Per Carton</label>
    				<div class="col-sm-4">
   	 				<input type="number" class="form-control" id="piece_per_carton" name="piece_per_carton" >
   	 				</div>
  				</div>

  				<div class="form-group">
    				<label for="wasted_cartons" class="col-sm-4 control-label">Wasted Cartons</label>
    				<div class="col-sm-4">
   	 				<input type="number" class="form-control" id="wasted_cartons" name="wasted_cartons">
   	 				</div>
  				</div>

          <div class="form-group">
            <label for="price_per_carton" class="col-sm-4 control-label">Price Per Carton</label>
            <div class="col-sm-4">
            <input type="float" class="form-control" id="price_per_cartons" name="price_per_carton" >
            </div>
          </div>

  			<!--	<div class="form-group">
    				<label for="wastage_price" class="col-sm-2 control-label">Wastage Price</label>
    				<div class="col-sm-4">
   	 				<input type="" class="form-control" id="wastage_price">
   	 				</div>
  				</div> -->

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>

                    </div>
                </div>
	</form>
</div>

  

<div class="col-md-6">

   
  

    <table class="table table-bordered table-nonfluid">


            <thead>
                <td width="20%">Item</td>
                <td width="20%">Quantity</td>
                <td width="20%">Price</td>
                <td width="20%">Wastage Price</td>
                <td width="20%">Delete</td>
              
            </thead>
        <?php
            $final_price=0;
            $wastage_price=0;
        ?>
           @if(!empty($orders))
        @foreach($orders as $order)
               <?php

                    $item=\App\Item::where('id',$order->item_id)->first();
                    $item_name=$item->name;
                    $quantity=($order->cartons)*($order->pieces_per_carton);

                ?>
            <tr>
              <td>{{$item_name}}</td>
              <td>{{$quantity}}</td>
              <td>{{$order->total_price}}</td>
              <td>{{$order->wasted_price}}</td>
                <td> <a href="{!! route('deleteOrder', ['order'=>$order]) !!}">x</a></td>
            </tr>
               <?php

                       $final_price=$final_price+($order->total_price);
                       $wastage_price=$wastage_price+($order->wasted_price);
                   ?>
           @endforeach
               @endif
      
        </table>

            <?php $sum_price=$final_price-$wastage_price; ?>

          <div class="form-group" id="total_price">
            <label for="total_price" class="col-sm-2 control-label">Total Price</label>
            <div class="col-sm-4">
            <input type="number" class="form-control" id="total_price" value={{$final_price}} readonly>
            </div>
          </div>

            <div class="form-group" id="wastage_price">
                <label for="wastage_price" class="col-sm-2 control-label">Total Wastage Price</label>
                <div class="col-sm-4">
                <input type="number" class="form-control" id="wastage_price" value={{$wastage_price}} readonly>
                </div>
            </div>
        <div class="form-group" id="sum_price">
            <label for="sum_price" class="col-sm-2 control-label">Sum Price</label>
            <div class="col-sm-4">
            <input type="number" class="form-control" id="sum_price" value={{$sum_price}} readonly>
            </div>
        </div>
        <div class="form-group" id="sum_price">
            <a href="{!! route('addShipment', ['total_price'=>$final_price,'wastage_price'=>$wastage_price]) !!}">Confirm Shipment</a>
        </div>
</div>


</div>	
</div>

@endsection