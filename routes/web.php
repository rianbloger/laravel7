<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
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
//     return view('welcome');
// });

// tanpa Controller
// Route::view('/', 'welcome');
// Route::view('/contact', 'contact');

// untuk ke direktori lanjutan bisa pake slash ataupun titik
// Route::view('/series/create', 'series/create');
// Route::view('/series/create', 'series.create');

// Route::get('/', function () {
//     return 'Homepage';
// });

// Route::get('/contact', function () {
//     return 'Contact us.';
// });

// Route::get('/', function () {
//     $name = "<h1>Irsyad A Panjaitan</h1>";
//     return view('welcome', ['name' => $name]);
// });

// Route::get('/', function () {
//     $name =  request('name');
//     // return "My name is" . $name;
//     return view('home', ['name' => $name]);
// });

// Route::get('/contact',function(Request $request){
//     return $request->path() == 'contact' ? true : false;

// })

// Route::get('/contact', function () {
//     // request()->fullUrl()
//     // return request()->path() == 'contact' ? true : false;
//     return request()->is('contact') ? true : false;
// });

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::view('/contact', 'contact');
Route::view('/about', 'about');
