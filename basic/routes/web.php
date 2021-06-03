<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;

use App\Http\Middleware\CheckAge;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo  "This is Home Page";
});

Route::get('/about', function () {
    return view('about');
})->middleware('check');

// Route::get('/contact', 'ContactController@index');
Route::get('/contact', [ContactController::class, 'index'])->name('con');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $users = User::all();
    return view('dashboard', compact('users'));
})->name('dashboard');
