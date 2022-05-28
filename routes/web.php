<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;
use App\Http\Controllers\MeasermentController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;


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

Route::get('/login', function () {
    return view('login');
});







Route::get('/adminchangepassword', function () {
    return view('adminchangepassword');
});

Route::get('/userhomepage','App\Http\Controllers\ProductController@userhomepage');
Route::get('/productdetail','App\Http\Controllers\ProductController@productdetail');
Route::get('/userprofile','App\Http\Controllers\RegistrationController@viewuserprofile');
Route::post('/updateprofile','App\Http\Controllers\RegistrationController@updateprofile');
Route::post('/updateuserpassword','App\Http\Controllers\RegistrationController@updateuserpassword');

Route::get('/userchangepassword','App\Http\Controllers\RegistrationController@userchangepassword');


Route::get('/registration','App\Http\Controllers\RegistrationController@viewregistration');
Route::get('/login','App\Http\Controllers\RegistrationController@viewlogin');
Route::get('/userwelcome','App\Http\Controllers\RegistrationController@viewuserwelcome');

Route::post('/AddRegistration','App\Http\Controllers\RegistrationController@AddRegistration');
Route::post('/userchecklogin','App\Http\Controllers\RegistrationController@userchecklogin');

Route::post('/CheckAdminLogin','App\Http\Controllers\AdminController@CheckAdminLogin');

Route::get('/adminwelcome','App\Http\Controllers\AdminController@adminwelcome');
Route::get('/adminlogin','App\Http\Controllers\AdminController@adminlogin');

Route::post('/adminupdatepassword','App\Http\Controllers\AdminController@adminupdatepassword');


Route::get('/product','App\Http\Controllers\ProductController@viewproduct');
Route::post('/addproduct','App\Http\Controllers\ProductController@insertproduct');
Route::get('/deleteproduct/{id}','App\Http\Controllers\ProductController@deleteproduct');
Route::get('/editproduct/{id}','App\Http\Controllers\ProductController@editproduct');
Route::post('/updateproduct','App\Http\Controllers\ProductController@updateproduct');



Route::get('/category','App\Http\Controllers\CategoryController@viewcategory');
Route::post('/addcategory','App\Http\Controllers\CategoryController@insertcategory');
Route::get('/deletecategory/{id}','App\Http\Controllers\CategoryController@deletecategory');
Route::get('/editcategory/{id}','App\Http\Controllers\CategoryController@editcategory');
Route::post('/updatecategory','App\Http\Controllers\CategoryController@updatecategory');



Route::get('/city','App\Http\Controllers\CityController@viewcity');
Route::post('/addcity','App\Http\Controllers\CityController@insertcity');
Route::get('/deletecity/{id}','App\Http\Controllers\CityController@deletecity');
Route::get('/editcity/{id}','App\Http\Controllers\CityController@editcity');
Route::post('/updatecity','App\Http\Controllers\CityController@updatecity');



Route::get('/state','App\Http\Controllers\StateController@viewstate');
Route::post('/addstate','App\Http\Controllers\StateController@insertstate');
Route::get('/deletestate/{id}','App\Http\Controllers\StateController@deletestate');
Route::get('/editstate/{id}','App\Http\Controllers\StateController@editstate');
Route::post('/updatestate','App\Http\Controllers\StateController@updatestate');


Route::get('/measurement','App\Http\Controllers\MeasurementController@viewmeaserment');
Route::post('/addunit','App\Http\Controllers\MeasurementController@insertunit');
Route::get('/deleteunit/{id}','App\Http\Controllers\MeasurementController@deleteunit');
Route::get('/editunit/{id}','App\Http\Controllers\MeasurementController@editunit');
Route::post('/updateunit','App\Http\Controllers\MeasurementController@updateunit');
