<?php

use Illuminate\Support\Facades\Route;

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


// Route::get('/', function(){
//     return view('welcome');
// });


// Index page
Route::get('/', 'PagesController@index');

// the 'PagesController@index' means that we are getting the function 
// called index located in the pagesController file to connect to the index.blade.php page

// About page
Route::get('/about', 'PagesController@about');

// Services page
Route::get('/services', 'PagesController@services');

// contact page
Route::get('/contact', 'PagesController@contact');

// login page
Route::get('/login', 'PagesController@login');

// register page
Route::get('/register', 'PagesController@register');

// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routs for the Post controller
Route::resource('posts','PostsController');

