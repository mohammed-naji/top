<?php

use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


// Route::get('url', 'action');
// Route::post('url', 'action');
// Route::puth('url', 'action');
// Route::patch('url', 'action');
// Route::delete('url', 'action');

// Route::get('/', [HomeController::class, 'index']);

// Route::get('/', function() {
//     return route('abc');
// });

// Route::get('/about', function() {
//     return 'Welcome to my about page';
// });

// Route::get('/contact-us', function() {
//     return 'Welcome to my contact page';
// })->name('abc');

// Route::get('user/profile', function() {
//     return 'User Profile';
// });

// Route::get('blog/{id?}', function($id = null) {
//     return 'Blog Number #'.$id;
// });

// Route::put('', function() {
//     return 'Welcome to my website';
// });

// Route::get('', function() {
//     return 'Welcome to my website';
// });

// Route::get('user/{name?}', [HomeController::class, 'user'])->name('home.user');








Route::get('/', [TestController::class, 'home'])->name('test.home');

Route::get('/about', [TestController::class, 'about'])->name('test.about');

Route::get('/contact-us', [TestController::class, 'contact'])->name('test.contact');


Route::prefix('site1')->controller(Site1Controller::class)->name('site1.')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contact_form')->name('contact_form');
    Route::get('/post/fff/{id}/eerjh/ffff/{name}/eee/tttt/qqqq', 'post')->name('post');
});

// Route::get('/home' , function() {});

