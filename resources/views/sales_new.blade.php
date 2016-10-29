@extends('layouts.home')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sales_new.css')}}">

@section('order')

<div class="sales">
	<h2 id="sale_head">Sales</h2>

<table class="table table-bordered table-striped">
  <thead>
  	<td>Serial</td>
  	<td>Date</td>
  	<td>Customer Name</td>
  	<td>Customer Type</td>
  	<td>Sell Amount</td>
  	<td>View Receipt</td>
  </thead>

  <tbody>
  	<tr>
  		<td></td>
  		<td></td>
  		<td></td>
  		<td></td>
  		<td></td>
  		<td width="15%">
  		<a class="w3-btn w3-white w3-border w3-round-large" href="#">receipt</a>
  		</td>
  	</tr>
 
  </tbody>
</table>

</div>

@endsection