<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;


//route untuk halama home
Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
//route untuk halaman admin
Route::resource('/admin/mahasiswa', MahasiswaController::class);
