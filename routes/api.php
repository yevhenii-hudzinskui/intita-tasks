<?php

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', function (Request $request) {
    $users = User::with('roles')->withCount('tasks')
        ->withSum('tasks', 'id')
        ->withMin('tasks', 'id')
//        ->withMax('tasks', 'id')
        ->get();
    return new UserCollection($users);
});

Route::get('/user/{user}', function (Request $request, User $user) {
    $user->load('roles')->loadCount('tasks');
    return new UserResource($user);
});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
