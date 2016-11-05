@extends('layouts.home')

<link rel="stylesheet" type="text/css" href="{{ asset('css/sale.css')}}">


@section('order')
<?php
    $items=\App\Item::all();
?>
<div class="sale_form">
	<h2>Sale Form</h2>

	<div class="row">
        <div class="col-md-4">

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/addTransaction') }}">
                {{ csrf_field() }}

                <div class="dropdown">
                    <label for="Items" class="col-sm-4 control-label">Item Code</label>
                    <select name="item_tag">
                        @foreach($items as $item)
                            <option value={{$item->tag}} >{{$item->tag}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="item_quantity" class="col-sm-4 control-label">Quantity</label>

                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="item_quantity" name="item_quantity">
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="{{$saleinfo['customer']->id}}">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>

                    </div>
                </div>
            </form>
</div>

  

<div class="col-md-8">

    <table class="table table-striped table-nonfluid">


            <thead>
                <td width="15%">Customer Name</td>
                <td width="12.5%">Customer Type</td>
                <td width="12.5%">Item Name</td>
                <td width="12.5%">Quantity</td>
                <td width="12.5%">Price</td>
                <td width="10%">Discount</td>
                <td width="12.5%">Price After Discount</td>
                <td width="10%">Delete</td>
              
            </thead>

        <?php
        $total_price=0;
        $total_discount=0;
        $vat=0;
        ?>
        @if(!empty($saleinfo['transactions']))
            @foreach($saleinfo['transactions'] as $transaction)
                <?php

                $item=\App\Item::where('id',$transaction->item_id)->first();
                $item_name=$item->name;
                $quantity=$transaction->item_quantity;

                ?>
                <tr>
                    <td>{{$saleinfo['customer']->name}}</td>
                    <td>{{$saleinfo['customer']->category}}</td>
                    <td>{{$item_name}}</td>
                    <td>{{$quantity}}</td>
                    <td>{{$transaction->item_price}}</td>
                    <td>{{$transaction->item_discount}}</td>
                    <td>{{$transaction->item_price-$transaction->item_discount}}</td>
                    <td> <a href="{!! route('deleteTransaction', ['transaction'=>$transaction]) !!}">x</a></td>
                </tr>
                <?php

                $total_price=$total_price+($transaction->item_price);
                $total_discount=$total_discount+($transaction->item_discount);
                ?>
            @endforeach
            <?php 
                $vat=$total_price*0.15;
                $net_price=$total_price-$total_discount+$vat; 
                ?>
                @if(!$total_price==0)
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>------</td>
                <td></td>
                <td></td>
                <td></td>
                </tr>

            <tr>
            <td>Total Price</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$total_price}}</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>

             <tr>
            <td>Total Discount</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$total_discount}}</td>
            <td></td>
            <td></td>
            <td></td>
            
           
            <tr>
            <td>Vat</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$vat}}</td>
            <td></td>
            <td></td>
            <td></td>
            
            </tr>

            <tr>
            <td>Net Price</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$net_price}}</td>
            <td></td>
            <td></td>
            <td></td>
            
            </tr>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="{!! route('addSale', ['total_price'=>$total_price,'total_discount'=>$total_discount,'customer_id'=>$saleinfo['customer']->id,'vat'=>$vat]) !!}">Confirm Sale</a></td>
            <td></td>
            <td></td>
            <td></td>
            
            </tr>
            @endif
        @endif

    </table>
</div> 


</div>	
</div>

<footer>
  <address>
    Company name: Creative Associate Limited <br>
    468 Katherine Road, <br>
    London, E7 8DP.
  
  </address>

  <p id="copyright">&copy; 2016 Creative Associate Limited<p>
  
</footer>

@endsection