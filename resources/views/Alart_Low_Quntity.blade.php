@extends('layouts.app')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@section('content')




<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Alart Low Quntity </h1>
            
            
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Alart Low Quntity
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
                            @foreach ($low as $key=>$low)
                            <tr>
                                <td>{{ $key+1}}</td>
                                
                                <td>
                                    <img width="100" src="{{asset('pic/'.$low->product_photo)}}">
                                    {{ Str::limit($low->product_name, 10) }}
                                </td>
                                <td>{{ $low->catagory}}</td>
                                <td>{{ $low->product_quantity}}</td>
                                <td>${{ $low->product_price}}</td>
                                @if(auth()->user()->user_role=='Admin')
                                <td>
                                    <a href="/edit_order/{{ $low->id }}" class="btn btn-success" role="button" aria-pressed="true">Edit</a>
                                    <a href="/delete_order/{{ $low->id }}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>
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