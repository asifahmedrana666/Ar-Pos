<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Receipt page - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container bootdey">
<div class="row invoice row-printable">
    <div class="col-md-10">
        <!-- col-lg-12 start here -->
        <div class="panel panel-default plain" id="dash_0">
            <!-- Start .panel -->
            <div class="panel-body p30">
                <div class="row">
                    <!-- Start .row -->
                    <div class="col-lg-6">
                        <!-- col-lg-6 start here -->
                        <div class="invoice-logo"><img width="100" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Invoice logo"></div>
                    </div>
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-6">
                        <!-- col-lg-6 start here -->
                        <div class="invoice-from">
                            <ul class="list-unstyled text-right">
                                <li>Dash LLC</li>
                                <li>2500 Ridgepoint Dr, Suite 105-C</li>
                                <li>Austin TX 78754</li>
                                
                            </ul>
                        </div>
                    </div>
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="invoice-details mt25">
                            <div class="well">
                                <ul class="list-unstyled mb0">
                                    <li><strong>Invoice</strong> #TEMP</li>
                                    <li><strong>Invoice Date:</strong> {{$dt->toFormattedDateString()}}</li>
                                   
                                    
                                </ul>
                            </div>
                        </div>
                       
                        <div class="invoice-items">
                            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="per5 text-center">SN</th>
                                            <th class="per70 text-center">Product Name</th>
                                            <th class="per5 text-center">Quantity</th>
                                            <th class="per10 text-center">Unit Price</th>
                                            <th class="per10 text-center">Total Price</th>
                                        </tr>
                                    </thead>
                                    @foreach ($viewinvoice as $key=>$viewinvoice)
                                        
                                    
                                    <tbody>
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{App\Models\product::find($viewinvoice->product_id)->product_name}}</td>
                                            <td class="text-center">{{$viewinvoice->quantity}}</td>
                                            <td class="text-center">${{$viewinvoice->product_price}}</td>
                                            <td class="text-center">${{$viewinvoice->quantity*$viewinvoice->product_price}}</td>
                                        </tr>
                                       
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                        
                                        <tr>
                                            <th colspan="4" class="text-right">Total:</th>
                                            <th class="text-center">${{$total}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-footer mt25">
                            <p class="text-center">Generated on {{$dt->toFormattedDateString()}} </p>
                        </div>
                        {{-- <button class="btn btn-success" id="invoice-print"><i class="fa fa-print"></i> Print Invoice</button>
				<button class="btn btn-danger"><i class="fa fa-envelope-o"></i> Mail Invoice</button> --}}
                    </div>
                    <!-- col-lg-12 end here -->
                </div>
                <!-- End .row -->
            </div>
        </div>
        <!-- End .panel -->
    </div>
    <!-- col-lg-12 end here -->
</div>
</div>

<style type="text/css">
body{
    margin-top:10px;
    background:#eee;    
}
</style>

<script type="text/javascript">





</script>
</body>
</html>