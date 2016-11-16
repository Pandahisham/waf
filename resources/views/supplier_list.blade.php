@extends('layouts.home')

<link rel="stylesheet" type="text/css" href="{{ asset('css/customer_list.css')}}">


@section('order')

    <div class="customer_form">

        <h2>Supplier Form</h2>

        <div class="row">
            <div class="col-md-8">


                <form class="form-horizontal" role="form" method="POST" action="{{ url('/addSupplier') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="identification" class="col-sm-4 control-label">Identification</label>

                        <div class="col-sm-8">
                            <input type="" class="form-control" id="identification" name="identification">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">Name</label>

                        <div class="col-sm-8">
                            <input type="" class="form-control" id="name" name="name">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="address" class="col-sm-4 control-label">Address</label>
                        <div class="col-sm-8">
                            <input type="" class="form-control" id="address" name="address" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-sm-4 control-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="" class="form-control" id="phone" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                            <label for="category" class="col-sm-4 control-label">Supplier Type</label>
                            <select name="category">
                                    <option value="wholesale">WholeSale</option>
                                    <option value="retail">Retail</option>
                            </select>

                    </div>

                    <div class="form-group">
                        <label for="term" class="col-sm-4 control-label">Term</label>
                        <div class="col-sm-4">
                            <input type="" class="form-control" id="term" name="term">
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


<div class="customer_table">


	<div class="row">

    <div class="col-md-12">

        <h2>Supplier Table</h2>

        <table class="table table-bordered table-nonfluid">

            <thead>
                <td width="10" >Identification</td>
                <td width="10" >Name</td>
                <td width="10">Address</td>
                <td width="10" >Phone Number</td>
                <td width="20" >Email Address</td>
                <td width="10" >Category</td>
                <td width="10" >Term</td>
                <td width="10" >Update</td>
                <td width="10" >Shipment</td>
                <td width="10">Delete</td>
              
            </thead>
           @foreach($suppliers as $supplier)
            <tr>
              <td>{{$supplier->identification}}</td>
              <td>{{$supplier->name}}</td>
              <td>{{$supplier->address}}</td>
              <td>{{$supplier->phone}}</td>
              <td>{{$supplier->email}}</td>
              <td>{{$supplier->category}}</td>
              <td>{{$supplier->term}}</td>
                <td><a href="{!! route('updateSupplier', ['supplier'=>$supplier]) !!}">Update Information</a></td>
                <td><a href="{!! route('orderFromSupplier', ['supplier'=>$supplier]) !!}">Shipment</a></td>
                <td><a href="{!! route('deleteSupplier', ['supplier'=>$supplier]) !!}">x</a></td>
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