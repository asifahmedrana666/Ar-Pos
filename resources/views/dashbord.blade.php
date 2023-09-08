@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">



@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1> 


            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>


            <div class="row">



                <div class="col-xl-3 col-md-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                          <h3>{{$Total_Product}}</h3>
                          <p>Total Product</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="/order" class="small-box-footer">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                          <h3>{{$Total_Category}}</h3>
                          <p>Total Category</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user-plus"></i>
                        </div>
                        @if(auth()->user()->user_role=='Admin')
                          <a href="/catagory" class="small-box-footer">
                          @else
                          <a href="" class="small-box-footer">
                          @endif
                       
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>{{$Total_Sale}}</h3>
                          <p>Total Sale</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-shopping-cart"></i>
                        </div>
                        
                          @if(auth()->user()->user_role=='Admin')
                          <a href="/report" class="small-box-footer">
                          @else
                          <a href="" class="small-box-footer">
                          @endif
                          
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>{{$Alart_Low_Quntity}}</h3>
                          <p>Alart Low Quntity</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="/low" class="small-box-footer">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Sale Report
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                       
                    </div>
                    
                </div>
            
           
             
                    <table id="">
                        
                
            
    </main>

    
@endsection