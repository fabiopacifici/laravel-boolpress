<?php

use Illuminate\Support\Facades\Route;
use App\Post;
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

/* Pagine non connesse ad un modello */
Route::get('/', 'PageController@index')->name('home');
Route::get('about', 'PageController@about')->name('about');

/* OPZIONE[1] senza modello Routes contact form */

#Route::get('contacts', 'PageController@contacts')->name('contacts');
#Route::post('contacts', 'PageController@sendContactForm')->name('contacts.send');

/* OPZIONE2 Routes model Contact */
Route::get('contacts', 'ContactController@form')->name('contacts');
Route::post('contacts', 'ContactController@storeAndSend')->name('contacts.send');


/* Pagine dei Posts */
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');

/* Categorie */
Route::get('categories/{category:slug}', 'CategoryController@show')->name('categories.show');


//Auth::routes(['register' => false]); # Chiude la registrazione al sito
Auth::routes();


Route::prefix('admin')->middleware('auth')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard'); // admin.dashboard
    Route::resource('posts', PostController::class);
});


/* VUE-POSTS */

Route::get('blog', function () {
    return view('blog');
});
Route::get('blog/{post}', function (Post $post) {
    return view('show', compact($post));
});
