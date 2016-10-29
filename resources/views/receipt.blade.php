@extends('layouts.home')
<link rel="stylesheet" type="text/css" href="{{ asset('css/receipt.css')}}">

@section('order')


<div class="Customer_info">

  <div class="w3-container">
    
  <div class="w3-card-4" style="width:50%;">
    <header class="w3-container w3-teal ">
      <h3>Customer Information</h3>
    </header>

    <div class="w3-container">
      <p>
        <b>Name: </b> <br> <br>
        <b>Customer Type: </b>
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

  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
     
    </tr>
 
  </tbody>
  </table>


</div>


@endsection