@extends('layouts.app')

@section('content')




<div id="layoutSidenav_content">
    
        <div class="container-fluid px-4">
            
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Create User
                </div>

<form action="/user_stor" method="post" enctype="multipart/form-data">
    @csrf
    <select class="form-control form-control-lg" aria-label=".form-select-sm example" name="user_role">
        <option selected>Select Catagory</option>
        <option value="Admin">Admin</option>
        <option value="employees">Employees </option>
      </select>
    <label for="exampleInputBorder"> Name </label>
        <input type="text" class="form-control form-control-lg" name="name" placeholder="Enter name" required>
        <label for="exampleInputBorder">Email</label>
        <input type="email" class="form-control form-control-lg" name="email" placeholder="Enter name" required>
        <label for="exampleInputBorder">Phone</label>
        <input type="number" class="form-control form-control-lg" name="Phone">
        <label for="exampleInputBorder">Password</label>
        <input type="password" class="form-control form-control-lg" name="password">
        
        
    <button type="submit" class="btn btn-info btn-lg">Submit</button>
</form>

@endsection