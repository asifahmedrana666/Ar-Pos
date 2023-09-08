

@extends('layouts.app')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@section('content')




<div id="layoutSidenav_content">


    <main>
        <div class="container-fluid px-4">
            
            <h1 class="mt-4">Generate report</h1>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" />
            <script>
                function populateEndDate() {
                    var date2 = $('#dateStart').datepicker('getDate');
                    date2.setDate(date2.getDate() + 1);
                    $('#dateEnd').datepicker('setDate', date2);
                    $("#dateEnd").datepicker("option", "minDate", date2);
                  }
                  
                  $(document).ready(function() {
                  
                    $("#dateStart").datepicker({
                      dateFormat: "yy-mm-dd",
                      minDate: '',
                      onSelect: function(date) {
                        populateEndDate();
                      }
                    }).datepicker("setDate", new Date());
                    $('#dateEnd').datepicker({
                      dateFormat: "yy-mm-dd",
                      minDate: 1,
                      onClose: function() {
                        var dt1 = $('#dateStart').datepicker('getDate');
                        var dt2 = $('#dateEnd').datepicker('getDate');
                        if (dt2 <= dt1) {
                          var minDate = $('#dateEnd').datepicker('option', 'minDate');
                          $('#dateEnd').datepicker('setDate', minDate);
                        }
                      }
                    }).datepicker("setDate", new Date());
                  });
    </script>
    
   
    <form action="/reportdate" method="get">
        @csrf
    <div class="">
                
                <input type="text" class="" id="dateStart" name="start">
                To
                <input type="text" class="" id="dateEnd" name="end">
                <button type="submit" class="btn btn-primary mb-2">Generate report</button>
            </div>
        </form>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All report
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
                                
                                
                                <th>Action</th>
                                
                            </tr>
                        </thead>
 
                        
                            
                       
                        <tbody>
                            @foreach ($data as $key=>$data)
                            <tr>
                                <td>{{ $key+1}}</td>
                                
                                <td>
                                    
                                        {{-- $my = Str::limit(App\Models\Product::find($data->product_id), 100); --}}
                                        
                                        {{ $data->name}}
                                   
                                </td>
                                <td>{{ $data->catagory}}</td>
                                <td>{{ $data->quantity}}</td>
                                <td>${{ $data->product_price * $data->quantity}}</td>
                                <td>
                                    
                                    <a href="/delete_report/{{ $data->id }}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>
                                </td>
                            </tr>
                            
                            @endforeach
                          
                        </tbody>
                       
                    </table>

                </div>
            </div>
        </div>
@endsection