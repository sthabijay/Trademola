<?php

use App\Livewire\AddTrade;
use App\Livewire\Dashboard;
use App\Livewire\EditTrade;
use App\Livewire\Home;
use App\Livewire\LogInUser;
use App\Livewire\Portfolios;
use App\Livewire\RegisterUser;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);

Route::get('user/register', RegisterUser::class);
Route::get('user/login', LogInUser::class)->name('login');

Route::middleware('auth')->group(function (){
    Route::get('/dashboard', Portfolios::class);
    Route::get('/dashboard/{id}', Dashboard::class);
    Route::get('/portfolios', Portfolios::class)->name('portfolios');
    Route::get('/trade/add', AddTrade::class);
    Route::get('/trade/edit/{id}', EditTrade::class); 
});
