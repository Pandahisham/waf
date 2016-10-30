@extends('layouts.home')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sales_new.css')}}">

@section('order')

<div class="sales">
	<h2 id="sale_head">Sales</h2>

<table class="table table-bordered table-striped">
  <thead>
  	<td>Serial</td>
  	<td>Date</td>
  	<td>Total Amount</td>
  	<td>Receipt</td>
  </thead>
<?php $i=0; ?>
  <tbody>
    @foreach($sales as $sale)
    <?php $i=$i+1?>
  	<tr>
  		<td>{{$i}}</td>
  		<td>{{$sale->created_at}}</td>
  		<td>{{$sale->total}}</td>
  		<td width="15%">
  		<a class="w3-btn w3-white w3-border w3-round-large" href="{!! route('receipt', ['sale'=>$sale]) !!}">receipt</a>
  		</td>
  	</tr>
    @endforeach 
  </tbody>
</table>

</div>

@endsection