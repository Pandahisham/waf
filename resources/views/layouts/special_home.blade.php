@extends('layouts.header')

<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css')}}">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

@section('content')
  
<div class="container-fluid">

<div id="head">
    <div class="row">
        <div class="col-md-6">

        <div class="page-header">
           <h1>Creative Associate Limited <br>
             <small>Private Company Limited </small></h1>
        </div>
        
    </div> <!--col 1-->

    <div class="col-md-6">
        <img src="{{ asset('image/img1.jpg')}}">
    </div>
  </div>
</div>

@yield('order')
</div>

@endsection