<?php

use Illuminate\Support\Facades\Route;

use App\Mail\WelcomeMail;
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

Route::get('/', function () {
    
    return view('welcome');
});


Route::get('/about', "HelloController@about");
Route::get('/service', "ServiceController@index");
Route::post('/service', "ServiceController@store");

Route::get('/sub/hello', function () {
     return view('sub.hello');
});


Route::get("/customers", "CustomerController@index");
Route::get("/customers/create", "CustomerController@create");
Route::post("/customers/store", "CustomerController@store");
Route::get("/customers/{customer_id}", "CustomerController@show");
Route::get("/customers/{customer_id}/edit", "CustomerController@edit");
Route::put("/customers/{customer_id}", "CustomerController@update");
Route::delete("/customers/{customer_id}", "CustomerController@destroy");


Route::get("/email", function ()
{
    Mail::to("somewhere@jemtx.com")->send(new WelcomeMail());
    return new WelcomeMail();
});