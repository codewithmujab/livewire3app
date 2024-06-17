<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// counter
Route::get('/counter', App\Livewire\Counter::class)->name('counter.index');
//post
Route::get('/posts', App\Livewire\Posts\CreatePost::class)->name('posts.index');

//multi step form
Route::view('/registration-success', 'registration-success')->name('registration.success');

//dropdown
Route::get('/select/actors-and-best-films', \App\Livewire\SelectActors::class)->name('select.actors');
