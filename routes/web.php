<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
})
->name('application');



//spa vue
Route::get('{any}', function () {
    return view('layouts.app');
})->where('any', '.*');