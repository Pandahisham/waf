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
           <h1>Enterprise Solutions <br> 
             <small>The Reliability To Power Businesss Enterprise Applications </small></h1>
        </div>
        
    </div> <!--col 1-->

    <div class="col-md-6">
        <img src="image/img1.jpg">
    </div>
  </div>
</div>


<div id="product">
    <div class="row">
        <div class="col-md-8">
        
            

            <div class="product_list">
            <h2>Product List</h2>

              <ul class="w3-ul w3-card-4">  <!--list-->
                    <li class="w3-padding-12">

                    <span onclick="this.parentElement.style.display='none'"  class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span> <!--delete-->

                    <img src="{{ asset('image/user.jpg')}}" class="w3-left w3-circle w3-margin-right" style="width:60px">  <!--product image-->

                    <a href="#"> <span class="w3-xsmall">P1 </span> </a> <!--Product link-->
                    </li>
                    
                    <li class="w3-padding-12">

                    <span onclick="this.parentElement.style.display='none'"  class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>

                    <img src="{{ asset('image/user.jpg')}}" class="w3-left w3-circle w3-margin-right" style="width:50px">
                    <a href="#"> <span class="w3-xsmall"> P2 </span> </a>

                    </li> 

                    <li class="w3-padding-12">

                    <span onclick="this.parentElement.style.display='none'"  class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>

                    <img src="{{ asset('image/user.jpg')}}" class="w3-left w3-circle w3-margin-right" style="width:50px">
                    <a href="#"> <span class="w3-xsmall"> P3 </span> </a>
                    </li>
                </ul>
        
        </div> <!--col 1-->
    </div>    
  
    </div>
</div>


<div id="customer">
    <div class="row">
    
        <div class="col-md-8">

                <div class="customer_list">
                    <h2>Customer List</h2>

                <ul class="w3-ul w3-card-4">
                    <li class="w3-padding-12">

                    <span onclick="this.parentElement.style.display='none'"  class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>

                    <img src="image/user.jpg" class="w3-left w3-circle w3-margin-right" style="width:60px">

                    <a href="#"> <span class="w3-xsmall"> Mike </span> </a>
                    </li>
                    
                    <li class="w3-padding-12">
                    <span onclick="this.parentElement.style.display='none'"  class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>
                    <img src="image/user.jpg" class="w3-left w3-circle w3-margin-right" style="width:60px">
                    <a href="#"> <span class="w3-xsmall"> Mike </span> </a>

                    </li> 

                    <li class="w3-padding-12">
                    <span onclick="this.parentElement.style.display='none'"  class="w3-closebtn w3-padding w3-margin-right w3-medium">x</span>
                    <img src="image/user.jpg" class="w3-left w3-circle w3-margin-right" style="width:60px">
                    <a href="#"> <span class="w3-xsmall"> Mike </span> </a>
                    </li>
                </ul>
            </div>    


         <!--  <div class="customer">
              <h2>Customer List</h2>

              <div class="list-group">
                <a href="#" class="list-group-item active">Customer One</a>
                <a href="#" class="list-group-item">Customer Two</a>
                <a href="#" class="list-group-item">Customer Three</a>
                <a href="#" class="list-group-item">Customer Four </a>
                <a href="#" class="list-group-item">Customer Five</a>
              </div>
            </div>  -->
        
        </div> 
  
    </div>
</div>


</div>
      
@endsection
