<?php

use App\Http\Controllers\FormsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\Site2Controller;


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


Route::prefix('site2')->name('site2.')->controller(Site2Controller::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contact_submit')->name('contact_submit');
});


Route::get('form1', [FormsController::class, 'form1'])->name('form1');
Route::post('form1', [FormsController::class, 'form1_submit'])->name('form1_submit');

Route::get('form2', [FormsController::class, 'form2'])->name('form2');
Route::post('form2', [FormsController::class, 'form2_submit'])->name('form2_submit');

Route::get('form3', [FormsController::class, 'form3'])->name('form3');
Route::post('form3', [FormsController::class, 'form3_submit'])->name('form3_submit');

Route::get('form4', [FormsController::class, 'form4'])->name('form4');
Route::post('form4', [FormsController::class, 'form4_submit'])->name('form4_submit');
