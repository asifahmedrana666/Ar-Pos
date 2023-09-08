@extends('layouts.app')

@section('content')




<div id="layoutSidenav_content">
    
        <div class="container-fluid px-4">
            
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Create Product
                </div>

<form action="/stororder" method="post" enctype="multipart/form-data">
    @csrf
    <select class="form-control form-control-lg" aria-label=".form-select-sm example" name="catagory">
        <option selected>Select Catagory</option>
        @foreach ($catagory as $catagory)
        <option value="{{$catagory->catagoryname}}">{{$catagory->catagoryname}}</option>
        @endforeach
        

        

      </select>
    <label for="exampleInputBorder"> Product Name </label>
        <input type="text" class="form-control form-control-lg" name="product_name" placeholder="Enter name" required>
        <label for="exampleInputBorder">Product Description</label>
        <input type="text" class="form-control form-control-lg" name="product_description" placeholder="Enter name" required>
        <label for="exampleInputBorder">Product Price</label>
        <input type="number" class="form-control form-control-lg" name="product_price">
        <label for="exampleInputBorder">Product Quantity</label>
        <input type="number" class="form-control form-control-lg" name="product_quantity">
        
        
        <label for="exampleInputBorder">Course Photo</label>
        <input type="file" class="form-control form-control-lg" name="product_photo">
    <button type="submit" class="btn btn-info btn-lg">Submit</button>
</form>

@endsection