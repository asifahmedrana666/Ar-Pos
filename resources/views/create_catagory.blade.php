@extends('layouts.app')

@section('content')




<div id="layoutSidenav_content">
    
        <div class="container-fluid px-4">
            
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>

<form action="/storcatagory" method="post" enctype="multipart/form-data">
    @csrf
    <label for="exampleInputBorder">Catagory name</label>
        <input type="text" class="form-control form-control-lg" name="catagoryname" placeholder="Enter name" required>
        
    <button type="submit" class="btn btn-info btn-sm">Submit</button>
</form>

@endsection