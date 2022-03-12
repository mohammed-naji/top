<?php

use Illuminate\Support\Facades\Route;

// Route::get('admin' , function() { return 'Admin Page'; });
// Route::get('admin/dashboard' , function() { return 'Admin Page'; });
// Route::get('admin/users' , function() { return 'Admin Page'; });
// Route::get('admin/statistics' , function() { return 'Admin Page'; });
// Route::get('admin/courses' , function() { return 'Admin Page'; });
// Route::get('admin/registerations' , function() { return 'Admin Page'; });

Route::prefix('adminpanel')->group(function() {
    Route::get('/' , function() { return 'Admin Page'; });
    Route::get('/dashboard' , function() { return 'Admin dashboard'; });
    Route::get('/users' , function() { return 'Admin users'; });
    Route::get('/statistics' , function() { return 'Admin statistics'; });
    Route::get('/courses' , function() { return 'Admin courses'; });
    Route::get('/registerations' , function() { return 'Admin registerations'; });
});
