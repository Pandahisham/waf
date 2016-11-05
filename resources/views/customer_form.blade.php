@extends('layouts.home')

<link rel="stylesheet" type="text/css" href="{{ asset('css/customer_form.css')}}">


@section('order')


<div class="customer_form">

	<h2>Customer Form</h2>

	<div class="row">
        <div class="col-md-8">

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/updateCustomerInformation') }}">
				{{ csrf_field() }}


				<div class="form-group">

					<div class="col-sm-8">
						<input type="hidden" class="form-control" id="customer_id" name="customer_id" value="{{$customer->id}}">
					</div>
				</div>

				<div class="form-group">
				    <label for="name" class="col-sm-4 control-label">Name</label>

				    <div class="col-sm-8">
					   <input type="" class="form-control" id="name" name="name" value="{{$customer->name}}">
				    </div>
				</div>


  				<div class="form-group">
    				<label for="address" class="col-sm-4 control-label">Address</label>
    				<div class="col-sm-8">
   	 				<input type="" class="form-control" id="address" name="address" value="{{$customer->address}}">
   	 				</div>
  				</div>

  				<div class="form-group">
    				<label for="phone" class="col-sm-4 control-label">Phone Number</label>
    				<div class="col-sm-8">
   	 				<input type="" class="form-control" id="phone" name="phone" value="{{$customer->phone}}">
   	 				</div>
  				</div>

          <div class="form-group">
            <label for="email" class="col-sm-4 control-label">Email</label>
            <div class="col-sm-8">
            <input type="email" class="form-control" id="email" name="email" value="{{$customer->email}}">
            </div>
          </div>

				<div class="form-group">
					<label for="category" class="col-sm-4 control-label">Customer Type</label>
					<select name="category">
						@if($customer->category==="wholesale")
						<option value="wholesale" selected>WholeSale</option>
						<option value="retail">Retail</option>
							@else
							<option value="wholesale">WholeSale</option>
							<option value="retail" selected>Retail</option>
							@endif
					</select>

				</div>

            <div class="form-group">
            <label for="term" class="col-sm-4 control-label">Term</label>
            <div class="col-sm-4">
            <input type="" class="form-control" id="term" name="term" value="{{$customer->term}}">
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

@endsection