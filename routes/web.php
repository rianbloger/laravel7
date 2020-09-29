<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Foundation\Testing\WithoutMiddleware;

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



// Route::get('/', [HomeController::class, 'index']);
// Route::get('/', [HomeController::class, '']);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


Route::prefix('posts')->middleware('auth')->group(function () {
    Route::get('create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');
    Route::post('store', [PostController::class, 'store']);

    Route::get('{post:slug}/edit', [PostController::class, 'edit']);
    Route::patch('{post:slug}/edit', [PostController::class, 'update']);

    Route::delete('{post:slug}/delete', [PostController::class, 'destroy']);
});

Route::get('categories/{category:slug}', [CategoryController::class, 'show']);


Route::get('tags/{tag:slug}', [TagController::class, 'show']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);


Route::view('/contact', 'contact');
Route::view('/about', 'about');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
