<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('url', 'action');
// Route::post('url', 'action');
// Route::puth('url', 'action');
// Route::patch('url', 'action');
// Route::delete('url', 'action');

// Route::get('/', function() {
//     return route('abc');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function() {
    return 'Welcome to my about page';
});

Route::get('/contact-us', function() {
    return 'Welcome to my contact page';
})->name('abc');

Route::get('user/profile', function() {
    return 'User Profile';
});

Route::get('blog/{id?}', function($id = null) {
    return 'Blog Number #'.$id;
});

// Route::put('', function() {
//     return 'Welcome to my website';
// });

// Route::get('', function() {
//     return 'Welcome to my website';
// });
