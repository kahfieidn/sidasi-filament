<?php

use App\Http\Controllers\Homepage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/statistik-data-perizinan', [Homepage::class, 'statistik_data_perizinan'])->name('statistik_data_perizinan');
Route::get('/statistik-data-investasi', [Homepage::class, 'statistik_data_investasi'])->name('statistik_data_investasi');
