<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Models\order;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Auth::routes();

Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashbord'])->name('dashbord');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::get('/create_user',[HomeController::class,'create_user'])->name('create_user');
Route::post('/user_stor',[HomeController::class,'user_stor'])->name('user_stor');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::get('redirects', 'App\Http\Controllers\HomeController@index2');
Route::get('/setting',[HomeController::class,'setting'])->name('setting');
Route::post('/setting_update',[HomeController::class,'setting_update'])->name('setting_update');



Route::get('/order', [App\Http\Controllers\OrderController::class, 'order'])->name('order');
Route::get('/create_order', [App\Http\Controllers\OrderController::class, 'create_order'])->name('create_order');
Route::post('/stororder', [App\Http\Controllers\OrderController::class, 'stororder'])->name('ordercreatepost');
Route::get('/edit_order/{id}', [App\Http\Controllers\OrderController::class, 'edit_order'])->name('create_order');
Route::post('/updateorder/{id}', [App\Http\Controllers\OrderController::class, 'updateorder'])->name('create_order');
Route::get('/delete_order/{id}', [App\Http\Controllers\OrderController::class, 'delete_order'])->name('create_order');
Route::get('/catagory', [App\Http\Controllers\OrderController::class, 'catagory'])->name('catagory');
Route::post('/storcatagory', [App\Http\Controllers\OrderController::class, 'storcatagory'])->name('storcatagory');
Route::get('/create_catagory', [App\Http\Controllers\OrderController::class, 'create_catagory'])->name('create_catagory');
Route::get('/delete_catagory/{id}', [App\Http\Controllers\OrderController::class, 'delete_catagory'])->name('delete_catagory');
Route::get('/pos', [App\Http\Controllers\OrderController::class, 'pos'])->name('pos');
Route::get('/addcart', [App\Http\Controllers\OrderController::class, 'addcart'])->name('addcart');
Route::post('/storaddcart/{id}', [App\Http\Controllers\OrderController::class, 'storaddcart'])->name('storaddcart');
Route::get('/addcartplus/{id}', [App\Http\Controllers\OrderController::class, 'addcartplus'])->name('addcartplus');
Route::get('/addcartdelete/{id}', [App\Http\Controllers\OrderController::class, 'addcartdelete'])->name('addcartdelete');
Route::get('/addcartminus/{id}', [App\Http\Controllers\OrderController::class, 'addcartminus'])->name('addcartminus');
Route::get('/viewinvoice', [App\Http\Controllers\OrderController::class, 'viewinvoice'])->name('viewinvoice');
Route::get('/buy', [App\Http\Controllers\OrderController::class, 'buy'])->name('buy');
Route::post('/carttoorder', [App\Http\Controllers\OrderController::class, 'carttoorder'])->name('carttoorder');
Route::get('/report', [App\Http\Controllers\OrderController::class, 'report'])->name('report');
Route::get('/delete_report/{id}', [App\Http\Controllers\OrderController::class, 'delete_report'])->name('delete_report');
Route::get('/reportdate', [App\Http\Controllers\OrderController::class, 'reportdate'])->name('reportdate');
Route::post('/testsc', [App\Http\Controllers\OrderController::class, 'testsc'])->name('testsc');
Route::get('/rd', [App\Http\Controllers\OrderController::class, 'rd'])->name('rd');
Route::get('/scarch', [App\Http\Controllers\OrderController::class, 'scarch'])->name('scarch');
Route::get('/scarch_action', [App\Http\Controllers\OrderController::class, 'scarch_action'])->name('scarch_action');
Route::get('/user_edit/{id}', [App\Http\Controllers\HomeController::class, 'user_edit'])->name('user_edit');
Route::post('/user_edit_post/{id}', [App\Http\Controllers\HomeController::class, 'user_edit_post'])->name('user_edit_post');
Route::get('/delete_user/{id}', [App\Http\Controllers\HomeController::class, 'delete_user'])->name('delete_user');
Route::get('/low', [App\Http\Controllers\OrderController::class, 'Alart_Low_Quntity'])->name('Alart_Low_Quntity');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});


Route::get('/clear', function() {

Artisan::call('cache:clear');
Artisan::call('config:cache');
Artisan::call('view:clear');
return "Cleared!";
});


Route::get('reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});