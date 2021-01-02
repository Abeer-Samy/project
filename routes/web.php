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
/*
/localhost/dashboard
/localhost/dashboard/productts
*/
Route::get('login', 'AuthController@login')->name('login');
Route::post('authenticate', 'AuthController@authenticate')->name('authenticate');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::get('register', 'AuthController@register')->name('register');
Route::post('register', 'AuthController@do_register')->name('do_register');


Route::namespace('Dashboard')->middleware('auth')->name('dashboard.')->prefix('admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::resource('reservations','ReservationController');
    Route::resource('Users','UserController');


});

//

Route::get('/' , 'FrontsaiteController@showHome')->name('frontsite.home');
Route::get('/about' , 'FrontsaiteController@showAbout')->name('frontsite.about');
Route::get('/blog' , 'FrontsaiteController@showBlog')->name('frontsite.blog');
Route::get('/blogdetails' , 'FrontsaiteController@showBlogDetails')->name('frontsite.blogdetails');
Route::get('/gallery' , 'FrontsaiteController@showGallery')->name('frontsite.gallery');
Route::get('/menufood' , 'FrontsaiteController@showMenuFood')->name('frontsite.menufood');
Route::get('/reservation' , 'FrontsaiteController@showReservation')->name('frontsite.reservation');
Route::get('/stuff' , 'FrontsaiteController@showStuff')->name('frontsite.stuff');
Route::get('/contact' , 'FrontsaiteController@showContact')->name('frontsite.contact');


