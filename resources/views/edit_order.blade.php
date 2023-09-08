@extends('layouts.app')

@section('content')




<div id="layoutSidenav_content">
    
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Order</h1>
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Order
                </div>


<form action="/updateorder/{{ $product->id }}" method="post">
    @csrf
    <label for="exampleInputBorder">Select Catagory</label>
      <select class="form-control form-control-lg" name="catagory">
        @foreach ($catagory as $catagory)
                                      <option value="{{$catagory->catagoryname}}" {{$catagory->catagoryname == $catagory->catagoryname ? 'selected' : ''}}>{{$catagory->catagoryname}}</option>
                                      @endforeach
                                  </select>
    <label for="exampleInputBorder"> Product Name </label>
    <input type="text" class="form-control form-control-lg" name="product_name" placeholder="Enter name" required value="{{$product->product_name}}">
    <label for="exampleInputBorder">Product Description</label>
    <input type="text" class="form-control form-control-lg" name="product_description" placeholder="Enter name" required value="{{$product->product_description}}">
    <label for="exampleInputBorder">Product Price</label>
    <input type="number" class="form-control form-control-lg" name="product_price" value="{{$product->product_price}}">
    <label for="exampleInputBorder">Product Quantity</label>
    <input type="number" class="form-control form-control-lg" name="product_quantity" value="{{$product->product_quantity}}">
    
<button type="submit" class="btn btn-info btn-lg">Submit</button>
</form>

@endsection