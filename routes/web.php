<?php

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
    Route::get('/section_a', function () {
        return view('dashboard');
    })->name('section_a');



    Route::get('/datatable', function () {
        return view('datatable');
    })->name('datatable');});
