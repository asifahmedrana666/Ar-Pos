<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\Product;
use App\Models\User;
use App\Models\Catagory;
use App\Models\addcart;
use App\Models\Setting;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Auth;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\HomeController;
class OrderController extends Controller
{
    public function order() {
        $order = product::all();
        $setting = Setting::latest()->paginate(1);
        $header = $setting[0]->header_name;
        $footer = $setting[0]->footer_name;
        return view('order', compact('order','header','footer'));
    }

    public function stororder(Request $request){
        $products  = new product;
        $products->product_name = $request->product_name;
        $products->product_description = $request->product_description;
        $products->catagory = $request->catagory;
        
        if($request->product_photo){
            $imageName = time().'.'.$request->product_photo->extension();
            $move = $request->product_photo->move(public_path('pic'), $imageName);
            // dd($imageName );
        }
        $products->product_photo = $imageName;
        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
        $products->created_at = Carbon::now()->toDateString();
        $products->save();
       return redirect('order');
     
        }

    public function create_order() {
        
        $catagory = Catagory::all();
        $setting = Setting::latest()->paginate(1);
        $header = $setting[0]->header_name;
        $footer = $setting[0]->footer_name;
        return view('create_order', compact('catagory','header','footer'));
    }
    
    public function edit_order($id) {
        $product = product::find($id);
        $setting = Setting::latest()->paginate(1);
        $header = $setting[0]->header_name;
        $footer = $setting[0]->footer_name;
        $catagory = Catagory::all();
        return view('edit_order', compact('product','header','footer','catagory'));
    }

    public function updateorder(Request $request,$id){
        $products = product::find($id);
        $products->product_name = $request->product_name;
        $products->product_description = $request->product_description;
        $products->catagory = $request->catagory;

        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
        $products->created_at = Carbon::now()->toDateString();
        $products->save();
        return redirect('order');
     
        }
        public function delete_order($id){
            $order = product::find($id);
            $order->delete();
            return redirect('order');
         
            }

            public function delete_report($id){
                $order = order::find($id);
                $order->delete();
                return redirect('report');
             
                }
     public function catagory() {
        $catagory = Catagory::all();
        $setting = Setting::latest()->paginate(1);
        $header = $setting[0]->header_name;
        $footer = $setting[0]->footer_name;
         return view('catagory', compact('catagory','header','footer'));
         }
      public function storcatagory (Request $request){
           $catagory = new catagory;
           $catagory->catagoryname =  $request->catagoryname;
           $catagory->subcatagory =  $request->subcatagory;
           $catagory->save();
           return redirect('catagory');
      }

      public function create_catagory() {
        $setting = Setting::latest()->paginate(1);
        $header = $setting[0]->header_name;
        $footer = $setting[0]->footer_name;
         return view('create_catagory', compact('header','footer'));

         }

         public function delete_catagory($id) {

            $catagory = catagory::find($id);
            $catagory->delete();

            return redirect('catagory');
    
             }

         public function pos() {
           
            $order = product::latest()->paginate(8);
            $addcart = addcart::all();
            $count2 = DB::table('addcarts')->where('id', 1)->exists();
            $setting = Setting::latest()->paginate(1);
            $header = $setting[0]->header_name;
            $footer = $setting[0]->footer_name;
            
            $sub =0;
            $amount = addcart::selectRaw('sum(product_price * quantity) as total')->get();
            $total = $sub + $amount[0]->total;
            $transaction = addcart::select(\DB::raw('SUM(product_price) as product_price, SUM(quantity) as quantity'))
->first();
            $amount2 = $transaction->product_price + $transaction->quantity;
            $a = addcart::selectRaw('sum(product_price * quantity) as total')->get();
            $b = $a[0]->total;

            $catagory = Catagory::paginate(4);
            
            $pos = product::get();
            return view('pos', compact('order','addcart','total','count2','sub','header','footer','catagory','pos'));
            }
     public function storaddcart (Request $request , $id){
        
        $addcart = product::find($id);
        $order = order::find($id);

        $my = addcart::where('product_id',$id)->exists();
        // dd($addcart->catagory);
                if (addcart::where('product_id',$id)->exists()) {
                    addcart::where('product_id',$id)->increment('quantity','1');
                    } else {
                        $ac = product::find($id);
                        $addcart = new addcart;
                        $addcart->product_id =  $id;
                        $addcart->product_price = $request->product_price;
                        $addcart->created_at = Carbon::parse()->format('Y-m-d');
                        $addcart->name = $request->product_name;
                        $addcart->catagory = $ac->catagory;
                        
                        $addcart->save();   
                }
                $order2 = product::find($addcart->product_id)->id;
                
                $order = product::where('id',$order2)->where('product_quantity','>',0)->decrement('product_quantity','1');
        

        
       
        
     
        
        return redirect('pos');
           }

     public function addcartplus(Request $request,$id) {
        $addcart = addcart::find($id);
        addcart::where('id',$id)->increment('quantity','1');

        // $addcart->quantity = $request->quantity;
        // $addcart->save();

        // $order = order::find($id);
        

        $order2 = product::find($addcart->product_id)->id;
                
        $order = product::where('id',$order2)->where('product_quantity','>',0)->decrement('product_quantity','1');
        
        

        
        return redirect('pos');
   
            }

            public function addcartminus(Request $request,$id) {
                $addcart = addcart::find($id);
                addcart::where('id',$id)->decrement('quantity','1');

                $order2 = product::find($addcart->product_id)->id;
                
                   $order = product::where('id',$order2)->where('product_quantity','>',0)->increment('product_quantity','1');

                
        
                
                return redirect('pos');
           
                    }


    public function addcartdelete($id) {
       $addcart = addcart::find($id);
    //    dd($addcart);
       $addcart->delete();
        //  $qut = $addcart->quantity;
        
    //    $addcart->delete();
    //    $ord = $addcart->id;
    
    
      
    //    $order2 = product::find($addcart->product_id)->id;
    
    //    $order = product::where('id',$order2)->where('product_quantity','>',0)->increment('product_quantity',$qut);
       return redirect('pos');
           
                    }

public function carttoorder(Request $request) {
                       

                    }
public function buy() {

                        DB::table('addcarts')->orderBy('id')->chunk('1000', function($rows) {
                            foreach($rows as $row) {
                           //convert object to array
                              \DB::table('orders')->insert(json_decode(json_encode($row), true));
                            }
                           });

                           
                           DB::table('addcarts')->delete();


                        $viewinvoice = order::all();
                        $amount = addcart::selectRaw('sum(product_price * quantity) as total')->get();
                        $total = $amount[0]->total;
                        
                        
                        return back()->with('success','Your Product Buy Successfully');
                    }

                    public function viewinvoice(){
                        $viewinvoice = addcart::all();
                        $amount = addcart::selectRaw('sum(product_price * quantity) as total')->get();
                        $total = $amount[0]->total;
                        $dt = Carbon::now();
                        return view('viewinvoice',compact('viewinvoice','amount','total','dt'));
                    }

                    public function report() {

                        $data = order::all();
                       
                        // $start = $request->start;
                        // $end = $request->end;

                        

                        // $today = "2022-12-19";
                        // $yesterday = "2022-12-20";
                        // $dataff = DB::table('orders')
                        // ->whereBetween('created_at', ["$today", " $yesterday"])
                        // ->get();
                        
                        $setting = Setting::latest()->paginate(1);
                        $header = $setting[0]->header_name;
                        $footer = $setting[0]->footer_name;

                        return view('report', compact('data','header','footer'));
                    }

                    public function reportdate(Request $request) {
                     
                        
                    
                        $start = $request->start;
                        $end = $request->end;
                        $dataff = DB::table('orders')
                        ->whereBetween('created_at', ["$start", " $end"])
                        ->get();
                        $setting = Setting::latest()->paginate(1);
                        $header = $setting[0]->header_name;
                        $footer = $setting[0]->footer_name;
                        
                        return view('reportdate', compact('dataff','header','footer'));
                    }

                    
                    
                    public function scarch_action(Request $request){
                        $search = $request->search;
                  
                        $search2 = product::where('product_name', 'like', '%' . $search . '%')->get();
                        // dd($search2);
                        $setting = Setting::latest()->paginate(1);
                        $header = $setting[0]->header_name;
                        $footer = $setting[0]->footer_name;
                        $addcart = addcart::all();
                        $sub =0;
            $amount = addcart::selectRaw('sum(product_price * quantity) as total')->get();
            $total = $sub + $amount[0]->total;
            $transaction = addcart::select(\DB::raw('SUM(product_price) as product_price, SUM(quantity) as quantity'))
->first();
            $amount2 = $transaction->product_price + $transaction->quantity;
            $a = addcart::selectRaw('sum(product_price * quantity) as total')->get();
            $b = $a[0]->total;
                    return view('scarch', compact('search2','header','footer','addcart','total'));
                  
                        
                    }

    public function scarch()
    { 
       return view('scarch');
    }
    public function Alart_Low_Quntity()
    { 
        $setting = Setting::latest()->paginate(1);
        $header = $setting[0]->header_name;
        $footer = $setting[0]->footer_name;
        $low = product::where('product_quantity','<',100)->get();

       return view('Alart_Low_Quntity',compact('low','header','footer'));
    }

}
