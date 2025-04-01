<?php

use App\Livewire\AddTrade;
use App\Livewire\Dashboard;
use App\Livewire\EditTrade;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class);
Route::get('/trade/add', AddTrade::class);
Route::get('/trade/edit/{id}', EditTrade::class);