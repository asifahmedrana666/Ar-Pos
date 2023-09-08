@extends('layouts.app')

@section('content')




<div id="layoutSidenav_content">
    
        <div class="container-fluid px-4">
            <h1 class="mt-4">Setting</h1>
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    setting
                </div>


<form action="/setting_update" method="post">
    @csrf
    <label for="exampleInputBorder"> Header Name </label>
    <input type="text" class="form-control form-control-lg" name="header_name" placeholder="Enter name" required value="{{$header}}">
    <label for="exampleInputBorder">Footer Name</label>
    <input type="text" class="form-control form-control-lg" name="footer_name" placeholder="Enter name" required value="{{$footer}}">
    
<button type="submit" class="btn btn-info btn-lg">Submit</button>
</form>

@endsection