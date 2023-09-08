@extends('layouts.app')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@section('content')




<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Total Product</h1>
            
            @if(auth()->user()->user_role=='Admin')
            <a href="create_order" class="btn btn-success" role="button" aria-pressed="true">Create Product</a>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Product
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Product Name</th>
                                <th>Catagory</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                
                                
                                @if(auth()->user()->user_role=='Admin')
                                <th>Action</th>
                                @endif
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>Product Name</th>
                                <th>Catagory</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                
                                @if(auth()->user()->user_role=='Admin')
                                <th>Action</th>
                                @endif
                            </tr>
                        </tfoot>
                        
                        <tbody>
                            @foreach ($order as $key=>$order)
                            <tr>
                                <td>{{ $key+1}}</td>
                                
                                <td>
                                    <img width="100" src="{{asset('pic/'.$order->product_photo)}}">
                                    {{ Str::limit($order->product_name, 10) }}
                                </td>
                                <td>{{ $order->catagory}}</td>
                                <td>{{ $order->product_quantity}}</td>
                                <td>${{ $order->product_price}}</td>
                                @if(auth()->user()->user_role=='Admin')
                                <td>
                                    <a href="/edit_order/{{ $order->id }}" class="btn btn-success" role="button" aria-pressed="true">Edit</a>
                                    <a href="/delete_order/{{ $order->id }}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                         
                          
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection