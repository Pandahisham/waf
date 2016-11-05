@extends('layouts.home')

<link rel="stylesheet" type="text/css" href="{{ asset('css/batch_tag.css')}}">

@section('order')

  <div class="product_form">

    <h2>New Batch Entry</h2>

    <div class="row">

      <div class="col-md-8">

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/enterBatch') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <div class="col-sm-4">
              <input type="hidden" class="form-control" id="item_id" name="item_id" value="{{$item->id}}">
            </div>
          </div>
          <div class="form-group">
            <label for="tag" class="col-sm-4 control-label">BIN</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="tag" name="tag">
            </div>
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
            <label for="manufacture" class="col-sm-4 control-label">Manufacture Date</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="manufacture" name="manufacture">
            </div>
          </div>

          <div class="form-group">
            <label for="expiry" class="col-sm-4 control-label">Expiry Date</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="expiry" name="expiry">
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

  <h2>Batch Details</h2>

  <div class="row">

    <div class="col-md-10">

      <table class="table table-bordered table-nonfluid">


        <thead>
          <td>BIN</td>
          <td>Quantity</td>
          <td>Manufacture Date</td>
          <td>Expire Date</td>
          <td>Shrinkage</td>
          <td>Sell</td>
          <td>Update</td>
          <td>Delete</td>
        </thead>
           <?php $batches=\App\Batch::where('item_id',$item->id)->get();?>
        @foreach($batches as $batch)
        <tr>
          <td>{{$batch->tag}}</td>
          <td>{{$batch->quantity}}</td>
          <td>{{$batch->manufacture}}</td>
          <td>{{$batch->expiry}}</td>
          <td>{{$batch->shrinkage}}</td>
          <td>{{$batch->sell}}</td>
          <td><a href="{!! route('updateBatch', ['batch'=>$batch]) !!}">Update</a></td>
          <td> <a href="{!! route('deleteBatch', ['batch'=>$batch]) !!}">x</a></td>
        </tr>
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