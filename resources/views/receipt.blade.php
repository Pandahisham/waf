@extends('layouts.home')
<link rel="stylesheet" type="text/css" href="{{ asset('css/receipt.css')}}">

@section('order')
<?php 
  $customer=\App\Customer::where('id',$sale->customer_id)->first();
?>


<div class="Customer_info">

  <div class="w3-container">
    
  <div class="w3-card-4" style="width:50%;">
    <header class="w3-container w3-teal ">
      <h3>Customer Information</h3>
    </header>

    <div class="w3-container">
      <p>
        <b>Name: {{$customer->name}}</b> <br> <br>
        <b>Customer Type: {{$customer->category}}</b> <br> <br>
        <b>Customer Term: {{$customer->term}}</b> <br> <br>
        <b>Customer Email: {{$customer->email}}</b>
      </p>
    </div>

  </div>
	</div>
</div>  

<div id="receipt_list">
    
  <table class="table table-striped">
  <thead>
    <td>Serial</td>
    <td>Item Name</td>
    <td>Rate</td>
    <td>Quantity</td>
    <td>Price</td>
  </thead>

  <?php 
    $transactions=\App\Transaction::where('sale_id',$sale->id)->get();
    $i=0;
  ?>

  <tbody>
    @foreach($transactions as $transaction)
                <?php

                $item=\App\Item::where('id',$transaction->item_id)->first();
                $item_name=$item->name;
                $quantity=$transaction->item_quantity;
                $i=$i+1;
                ?>
    <tr>
      <td>{{$i}}</td>
      <td>{{$item_name}}</td>
      <td>{{$item->price}}</td>
      <td>{{$quantity}}</td>
      <td>{{$item->price*$quantity}}</td>
     
    </tr>
    @endforeach
  </tbody>
  </table>


</div>

<div class="w3-container">
      <p>
        <b>Total Price:{{$sale->total}} </b> <br> <br>
        <b>Discount:{{$sale->discount}} </b> <br> <br>
        <b>Vat: {{$sale->vat}}</b> <br> <br>
        <b>Net Price: {{$sale->total-$sale->discount+$sale->vat}}</b>
      </p>
    </div>


@endsection