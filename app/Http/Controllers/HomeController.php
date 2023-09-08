<?php

namespace App\Http\Controllers;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\order;
use App\Models\Catagory;
use App\Models\addcart;
use App\Models\Setting;
use App\Models\Product;

use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashbord()
    { 
        $users = User::all();
        $total_order = order::count();
        $setting = Setting::latest()->paginate(1);
        $header = $setting[0]->header_name;
        $footer = $setting[0]->footer_name;
        
        $Total_Product = product::count();
        $Total_Category = Catagory::count();
        $Total_Sale = order::count();
        $Alart_Low_Quntity = product::where('product_quantity','<',100)->count();

       return view('dashbord', compact('users','total_order','header','footer','Total_Product','Total_Category','Total_Sale','Alart_Low_Quntity'));
    }

    public function test()
    { 
       return view('test');
    }
    public function index()
    { 
        // $order = order::all();

       return redirect('dashboard');
    }

    public function index2()
    {
        $role = Auth::user()->user_type;
        $checkrole = explode(',', $role);
        if (in_array('1', $checkrole)) {
            return redirect('dog/indexadmin');
        } else {
            return redirect('pet/index');
        }

    }
    public function users() {
        $users = User::all();
        $setting = Setting::latest()->paginate(1);
        $header = $setting[0]->header_name;
        $footer = $setting[0]->footer_name;
        return view('users', compact('users','header','footer'));
    }
    public function user_edit($id){
        $user_edit = User::find($id);
        // dd($user_edit);
        $setting = Setting::latest()->paginate(1);
        $header = $setting[0]->header_name;
        
        $footer = $setting[0]->footer_name;
        return view('user_edit',compact('user_edit','header','footer'));
    }

    public function user_edit_post(Request $request,$id){
        $user = User::find($id);
        $user->name  = $request->name;
        $user->email     = $request->email;
        $user->user_role   = $request->Phone;
        $user->Phone = $request->Phone;
        $user->save();
        return redirect('/users')->with('success','edit Successfully');
    }

    public function delete_user($id) {

        $User = User::find($id);
        $User->delete();

        return redirect('users');

         }

    public function logout() {
        Auth::logout();
        return back()->with('danger','User Deleted Successfully');
    }

    public function setting() {

        // $te = order::whereDate('created_at', Carbon::today())->get(['created_at','created_at']);
        // // $to = $count2 = DB::table('products')->where('product_quantity', '>=' '1000');
        $startDate = '1';
        $endDate = '100';
        $my = addcart::where('product_id',2)->exists();
        $today = Carbon::now()->isoFormat('YYYY-MM-DD');
        $yesterday = Carbon::yesterday()->isoFormat('YYYY-MM-DD');

        $low = order::where('created_at',$yesterday)->selectRaw('sum(product_price * quantity) as total')->get();
        // dd($low[0]->total);
        
        $setting = Setting::latest()->paginate(1);
        
        $header = $setting[0]->header_name;
        $footer = $setting[0]->footer_name;
        // dd($header);
        return view('setting', compact('setting','header','footer'));
    }

    public function setting_update(Request $request){
    //    dd($request);
        $setting  = new setting;
        $setting->header_name = $request->header_name;
        $setting->footer_name = $request->footer_name;
        $setting->save();
        return redirect('order');
     
        }

        public function create_user(){
            $setting = Setting::latest()->paginate(1);
            $header = $setting[0]->header_name;
            $footer = $setting[0]->footer_name;
            return view('create_user', compact('header','footer'));
            
        }

        public function user_stor(Request $request){
            $user          = new User;
            $user->name    = $request->name;
            $user->email   = $request->email;
            $user->phone   = $request->phone;
            $user->user_role   = $request->user_role;
            
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('users')->with('success','Your User Created Successfully');
        }

}
