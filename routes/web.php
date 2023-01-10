<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Provinces;
use App\Http\Livewire\Hospitals;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::get('/', function () {return view('dashboard');});
        Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
        Route::get('/provinces', Provinces::class)->name('provinceList');
        Route::get('/hospitals', Hospitals::class)->name('hospitalList');
        Route::get('/users', [UserController::class,'index'])->name('userList');
        Route::get('/users/create', [UserController::class,'create'])->name('userCreate');

});
