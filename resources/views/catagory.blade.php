@extends('layouts.app')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@section('content')




<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Category</h1>
            
            
            <a href="create_catagory" class="btn btn-success" role="button" aria-pressed="true">Create Category</a>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Category
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Category Name</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                            @foreach ($catagory as $key=>$catagory)
                            <tr>
                                <td>{{ $key+1}}</td>
                                 <td> {{ $catagory->catagoryname}} </td>
                                <td>
                                    
                                    <a href="/delete_catagory/{{$catagory->id}}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                         
                          
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection