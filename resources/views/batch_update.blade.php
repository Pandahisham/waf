
<link rel="stylesheet" type="text/css" href="{{ asset('css/batch_tag.css')}}">

<h1> {{$batch->tag}} </h1>
@section('order')

  <div class="product_form">

    <h2>Batch Update Page</h2>

    <div class="row">

      <div class="col-md-8">

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/updateBatchInfo') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <div class="col-sm-4">
              <input type="hidden" class="form-control" id="batch_id" name="batch_id" value="{{$batch->id}}">
            </div>
          </div>
          <div class="form-group">
            <label for="tag" class="col-sm-4 control-label">BIN</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="tag" name="tag" value="{{$batch->tag}}">
            </div>
          </div>


          <div class="form-group">
            <label for="addition" class="col-sm-4 control-label">Additional Products</label>

            <div class="col-sm-4">
              <input type="number" class="form-control" id="addition" name="addition" value="0">
            </div>
          </div>

          <div class="form-group">
            <label for="shrinkage" class="col-sm-4 control-label">Shrinkage</label>

            <div class="col-sm-4">
              <input type="number" class="form-control" id="shrinkage" name="shrinkage" value="0">
            </div>
          </div>


          <div class="form-group">
            <label for="manufacture" class="col-sm-4 control-label">Manufacture Date</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="manufacture" name="manufacture" value="{{$batch->manufacture}}">
            </div>
          </div>

          <div class="form-group">
            <label for="expiry" class="col-sm-4 control-label">Expiry Date</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="expiry" name="expiry" value="{{$batch->expiry}}">
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