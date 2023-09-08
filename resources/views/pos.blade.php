@extends('layouts.app')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Catagory</h1>


<!DOCTYPE HTML>
<html lang="en">
<head>

<!-- jQuery -->
<!-- Bootstrap4 files-->
<link href="{{ asset('pospage/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/> 
<link href="{{ asset('pospage/assets/css/ui.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('pospage/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('pospage/assets/css/OverlayScrollbars.css') }}" type="text/css" rel="stylesheet"/>
<!-- Font awesome 5 -->

</section>
<!-- ========================= SECTION CONTENT ========================= -->
                                   @if(session()->has('danger'))
                                        <div class="btn btn-danger">
                                            {{ session()->get('danger') }}
                                        </div>
                                    @endif
                                    @if(session()->has('status'))
                                        <div class="btn btn-info">
                                            {{ session()->get('status') }}
                                        </div>
                                    @endif

<section class="section-content padding-y-sm bg-default ">
<div class="container-fluid">
<div class="row">
	<div class="col-md-8 card padding-y-sm card ">
		<ul class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist">
	<li class="nav-item">
		<a class="nav-link active show" data-toggle="pill" href="#nav-tab-card">
		<i class="fa fa-tags"></i> All</a></li>
	<li class="nav-item">
		@foreach ($catagory as $catagory)
	    <li class="nav-item">
		<a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
		<i class="fa fa-tags "></i>  {{$catagory->catagoryname}}</a></li>
		@endforeach
</ul>






<form action="/scarch_action" method="get">
	@csrf
	<label for="exampleInputBorder">Search item</label>
		<input type="text" class="col-md-8 " name="search" placeholder="Enter Search item name" required>
	<button type="submit" class="btn btn-info btn-sm">Search</button>
</form>
<span   id="items">
	
<div class="row">
	

@foreach ($order as $orders)
    

<div class="col-md-3">
	<figure class="card card-product">
		<span class="badge-new"> NEW </span>
		<div class="img-wrap"> 
			<img src="{{asset('pic/'.$orders->product_photo)}}">
			<a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
		</div>
		<figcaption class="info-wrap">
			<a href="#" class="title">{{Str::limit($orders->product_name, 10)}}</a>
            
			<div class="action-wrap">
                <form action="/storaddcart/{{$orders->id}}" method="post">
                    @csrf
					
					<input type="hidden" class="form-control" name="product_name" value={{$orders->product_name}}>
					<input type="hidden" class="form-control" name="product_quantity" value={{$orders->product_price}}>
					<input type="hidden" class="form-control" name="product_price" value={{$orders->product_price}}>
				<button type="submit" name="product_id" class="btn btn-primary btn-sm float-right"> <i class="fa fa-cart-plus"></i> Add </button>
                
            </form>
               
				<div class="price-wrap h5">
					<span class="price-new">${{$orders->product_price}}</span>
				</div> <!-- price-wrap.// -->
			</div> <!-- action-wrap -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
@endforeach
</div> <!-- row.// -->

</span>
	</div>
	<div class="col-md-4">
<div class="card">
	<span id="cart">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Item</th>
  <th scope="col" width="120">Qty</th>
  <th scope="col" width="120">Unit Price</th>
  <th scope="col" class="text-right" width="200">Delete</th>
</tr>
</thead>
<tbody>

	<form action="/stororder" method="post">
		@csrf
@foreach ($addcart as $addcart)
	

  
      
    
<tr>
	<td>

	<figcaption class="media-body">
		<h6 class="title text-truncate"> 
			
			{{Str::limit($addcart->name, 10)}}
		 </h6>
	</figcaption>
</figure> 
	</td>
	<td class="text-center"> 
		<div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
			                                                            

																		<a href="/addcartminus/{{$addcart->id}}" class="m-btn btn btn-default"><i class="fa fa-minus"></i></a>
																		<button type="button" class="m-btn btn btn-default" disabled>{{$addcart->quantity}}</button>
																		{{-- <form action="/addcartplus/{{$addcart->id}}" method="post">
																			@csrf
																	
																		<input type="hidden" name="quantity" value ={{$addcart->quantity+1}}>
																		<input type="hidden" name="quantity" value ={{$addcart->quantity+1}}> --}}
																		{{-- <button type="save" id="rana" class="m-btn btn btn-default"><i class="fa fa-plus"></i></button> --}}
																		<a href="/addcartplus/{{$addcart->id}}" class="m-btn btn btn-default"><i class="fa fa-plus"></i></a>
																		</form>
																	</div>
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price"> ${{$addcart->product_price}}</var> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<a href="/addcartdelete/{{$addcart->id}}" class="btn btn-outline-danger"> <i class="fa fa-trash"></i></a>
	</td>
</tr>
@endforeach
</tbody>
</table>
</span>
</div> <!-- card.// -->




<div class="box">

<dl class="dlist-align">
  <dt>Discount:</dt>
  <dd class="text-right"><a href="#">0%</a></dd>
</dl>
<dl class="dlist-align">
	
	


	
  <dt>Sub Total:</dt>
  <dd class="text-right">$</dd>
</dl>

<dl class="dlist-align">
  <dt>Total: </dt>
  <dd class="text-right h4 b"> $ 

	{{$total}}
	

	
	
</dd>
</dl>
<div class="row">
	<div class="col-md-6">
		<a href="" class="btn  btn-default btn-error btn-lg btn-block"><i class="fa fa-times-circle "></i> Cancel </a>
	</div>
	<div class="col-md-6">

		
				
				

		<a href="/buy" class="btn  btn-primary btn-lg btn-block"><i class="fa fa-shopping-bag"></i> Charge </a>
	     </form>
	</div>
	<br>
	<br>
	<br>
	<br>
	<center>  
		
        
		<a href="/viewinvoice" target="_blank"> <i class="fas fa-print"></i> Print invoice</a>

      <center>
</div>
</div> <!-- box.// -->


	</div>
</div>
</div><!-- container //  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<script src="assets/js/jquery-2.0.0.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/OverlayScrollbars.js" type="text/javascript"></script>

</body>
</html>
@endsection