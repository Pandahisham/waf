@extends('layouts.home')

<link rel="stylesheet" type="text/css" href="{{ asset('css/product.css')}}">


@section('order')


<div class="product_form">

	<h2>New Product Entry</h2>

	 <div class="row">

      <div class="col-md-8">

          <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/insertItem') }}">
              {{ csrf_field() }}

  			  <div class="form-group">
				    <label for="item_tag" class="col-sm-4 control-label">Item Tag</label>
				    <div class="col-sm-4">
				    <input type="text" class="form-control" id="item_tag" name="item_tag">
				    </div>
				  </div>


  			  <div class="form-group">
    				<label for="item_name" class="col-sm-4 control-label">Product Name</label>
    				<div class="col-sm-4">
   	 				<input type="text" class="form-control" id="item_name" name="item_name" >
   	 				</div>
  			  </div>

          <div class="form-group">
            <label for="quantity" class="col-sm-4 control-label">Quantity</label>
            <div class="col-sm-4">
            <input type="number" class="form-control" id="quantity" name="quantity">
            </div>
          </div>

  				<div class="form-group">
    				<label for="item_price" class="col-sm-4 control-label">Product Price</label>
    				<div class="col-sm-4">
   	 				<input type="float" class="form-control" id="item_price" name="item_price">
   	 				</div>
  				</div>
          <div class="form-group">
            <label for="image" class="col-sm-4 control-label">Image</label>
            <div class="col-sm-4">
            <input type="file" class="form-control" id="image" name="image">
            </div>
          </div>
              <div class="form-group">
                  <div class="col-md-8 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">
                          Update
                      </button>

                  </div>
              </div>





      </form>
      </div>  
	    
</div>
</div>

<div id="product_table">

  <h2>Product Inventory</h2>

  <div class="row">

    <div class="col-md-10">

      <table class="table table-bordered table-nonfluid">

        <?php $count=1; ?>
        <thead>
          <td>Item ID</td>
          <td>Item Code</td>
          <td>Product Name</td>
          <td>Image</td>
          <td>Quantity</td>
          <td>Price</td>
          <td>Batch Status</td>
          <td>Delete</td>
        </thead>

       @foreach($items as $item)
        <tr>
          <?php
                $batch_quantity=0;
            $quantity=\App\Quantity::where('item_id',$item->id)->first();
                $batches=\App\Batch::where('item_id',$item->id)->get();
                foreach($batches as $batch)
                {
                    $batch_quantity=$batch_quantity+$batch->quantity;
                }
                $img = \Intervention\Image\Facades\Image::make('images/panda.jpg');
                $img->resize(100, 100);
                $img->save();
            ?>
          <td>{{$count}}</td>
          <td>{{$item->tag}}</td>
          <td><a href="{!! route('batch', ['item'=>$item]) !!}">{{$item->name}}</a></td>
          <td><img src="images/{{$item->image}}" height="400" width="2">></td>
          <td>{{$quantity->item_quantity}}</td>
          <td>{{$item->price}}</td>
              @if(($quantity->item_quantity)!=$batch_quantity)
                  <td>Batch Is Not Updated</td>
              @else
                  <td>Batch Is Updated</td>
              @endif
          <td> <a href="{!! route('deleteItem', ['item'=>$item]) !!}">x</a></td>
        </tr>
           <?php $count++; ?>
            @endforeach
      </table>

    </div>

  </div>	

</div>


@endsection