@extends('layouts.home')
<link rel="stylesheet" type="text/css" href="{{ asset('css/sales_new.css')}}">

@section('order')

<div class="sales">
	<h2 id="sale_head">Sales</h2>

<table class="table table-bordered table-nonfluid">
  <thead>
  	<td width="20%">Serial</td>
  	<td width="20%">Date</td>
  	<td width="20%">Total Amount</td>
  	<td width="20%">Receipt</td>
  </thead>
<?php $i=0; ?>
  <tbody>
    @foreach($sales as $sale)
    <?php $i=$i+1?>
  	<tr>
  		<td>{{$i}}</td>
  		<td>{{$sale->created_at}}</td>
  		<td>{{$sale->total}}</td>
  		<td>
  		<a class="w3-btn w3-white w3-border w3-round-large" href="{!! route('receipt', ['sale'=>$sale]) !!}">receipt</a>
  		</td>
  	</tr>
    @endforeach 
  </tbody>
</table>

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