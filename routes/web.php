<?php

use App\Livewire\Dashboard;
use App\Livewire\Datatable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard/{name}', Dashboard::class)->name('section');
    Route::get('/datatable', function () {
        return view('datatable');
    })->name('datatable');});
