<?php

use App\Livewire\AddTrade;
use App\Livewire\Dashboard;
use App\Livewire\EditTrade;
use App\Livewire\LogInUser;
use App\Livewire\RegisterUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class);
Route::get('/trade/add', AddTrade::class);
Route::get('/trade/edit/{id}', EditTrade::class);
Route::get('/user/register', RegisterUser::class);
Route::get('/user/login', LogInUser::class);
