@extends('layouts.home')

<link rel="stylesheet" type="text/css" href="{{ asset('css/customer_list.css')}}">


@section('order')

    <div class="customer_form">

        <h2>Customer Form</h2>

        <div class="row">
            <div class="col-md-8">


                <form class="form-horizontal" role="form" method="POST" action="{{ url('/addCustomer') }}">
                    {{ csrf_field() }}


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
                            <label for="category" class="col-sm-4 control-label">Customer Type</label>
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

        <h2>Customer Table</h2>

        <table class="table table-bordered table-nonfluid">

            <thead>
                <td width="10" >Name</td>
                <td width="10">Address</td>
                <td width="10" >Phone Number</td>
                <td width="20" >Email Address</td>
                <td width="10" >Category</td>
                <td width="10" >Term</td>
                <td width="10" >Update</td>
                <td width="10" >Sale</td>
                <td width="10">Delete</td>
              
            </thead>
           @foreach($customers as $customer)
            <tr>

              <td>{{$customer->name}}</td>
              <td>{{$customer->address}}</td>
              <td>{{$customer->phone}}</td>
              <td>{{$customer->email}}</td>
              <td>{{$customer->category}}</td>
              <td>{{$customer->term}}</td>
                <td><a href="{!! route('updateCustomer', ['customer'=>$customer]) !!}">Update Information</a></td>
                <td><a href="{!! route('saleToCustomer', ['customer'=>$customer]) !!}">Sales</a></td>
                <td><a href="{!! route('deleteCustomer', ['customer'=>$customer]) !!}">x</a></td>
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