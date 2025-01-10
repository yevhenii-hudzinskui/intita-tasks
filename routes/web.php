<?php

use App\Http\Controllers\AllTasks;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(\App\Http\Middleware\Localization::class)
    ->prefix('{lang}')
    ->group(function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('all-tasks', AllTasks::class)
            ->name('all-tasks');

        Route::middleware([
            'auth:sanctum',
            config('jetstream.auth_session'),
            'verified',
        ])->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })
                ->can('view-dashboard')
                ->name('dashboard');

            Route::resource('tasks', TaskController::class);
        });
    });
