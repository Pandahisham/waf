@extends('layouts.home')

<link rel="stylesheet" type="text/css" href="{{ asset('css/offer.css')}}">


@section('order')
<?php $items=\App\Item::all();?>

<div class="offer_form">
	<h2>Product Offers</h2>

<div class="row">
        <div class="col-md-8">

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/addOffer') }}">
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
				<label for="quantity" class="col-sm-4 control-label">Minimum Quantity</label>

				<div class="col-sm-4">
					<input type="number" class="form-control" id="quantity" name="quantity">
				</div>
				</div>


  				<div class="form-group">
    				<label for="price" class="col-sm-4 control-label">Discount Price</label>
    				<div class="col-sm-4">
   	 				<input type="float" class="form-control" id="price" name="price">
   	 				</div>
  				</div>

          <div class="form-group">
            <label for="validity" class="col-sm-4 control-label">Offer Expiry Date</label>
            <div class="col-sm-4">
            <input type="date" class="form-control" id="validity" name="validity">
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
    </div>
  </div>      

<div id="product_invt">
  <h2 >Product Inventory</h2>

  <div class="row">


    <div class="col-md-10">

      <table class="table table-bordered table-nonfluid">

        <?php $count=1; ?>
        <thead>
          <td>Serial</td>
          <td>Item Code</td>
          <td>Product Name</td>
          <td>Minimum Quantity</td>
          <td>Discount Price</td>
          <td>Offer Expiry</td>
          <td>Delete</td>
        </thead>

       @foreach($offers as $offer)
        <tr>
          <?php
                $item=\App\Item::where('id',$offer->item_id)->first();
            ?>
          <td>{{$count}}</td>
          <td>{{$item->tag}}</td>
          <td>{{$item->name}}</td>
          <td>{{$offer->quantity}}</td>
          <td>{{$offer->price}}</td>
          <td>{{$offer->validity}}</td>
          <td> <a href="{!! route('deleteOffer', ['offer'=>$offer]) !!}">x</a></td>
        </tr>
           <?php $count++; ?>
            @endforeach
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