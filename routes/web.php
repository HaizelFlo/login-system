<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/roles', [RolController::class, 'index'])
        ->middleware('permission:Ver roles')
        ->name('roles.index');

    Route::get('/roles/create', [RolController::class, 'create'])
        ->middleware('permission:Crear roles')
        ->name('roles.create');

    Route::post('/roles', [RolController::class, 'store'])
        ->middleware('permission:Crear roles')
        ->name('roles.store');

    Route::get('/roles/{role}/edit', [RolController::class, 'edit'])
        ->middleware('permission:Editar roles')
        ->name('roles.edit');

    Route::put('/roles/{role}', [RolController::class, 'update'])
        ->middleware('permission:Editar roles')
        ->name('roles.update');

    Route::delete('/roles/{role}', [RolController::class, 'destroy'])
        ->middleware('permission:Eliminar roles')
        ->name('roles.destroy');

    Route::get('/permissions', [PermissionController::class, 'index'])
        ->middleware('permission:Ver permisos')
        ->name('permissions.index');

    Route::get('/permissions/create', [PermissionController::class, 'create'])
        ->middleware('permission:Crear permisos')
        ->name('permissions.create');

    Route::post('/permissions', [PermissionController::class, 'store'])
        ->middleware('permission:Crear permisos')
        ->name('permissions.store');

    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])
        ->middleware('permission:Editar permisos')
        ->name('permissions.edit');

    Route::put('/permissions/{permission}', [PermissionController::class, 'update'])
        ->middleware('permission:Editar permisos')
        ->name('permissions.update');

    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])
        ->middleware('permission:Eliminar permisos')
        ->name('permissions.destroy');

    Route::get('/users', [UserController::class, 'index'])
        ->middleware('permission:Ver usuarios')
        ->name('users.index');

    Route::get('/users/create', [UserController::class, 'create'])
        ->middleware('permission:Crear usuarios')
        ->name('users.create');

    Route::post('/users', [UserController::class, 'store'])
        ->middleware('permission:Crear usuarios')
        ->name('users.store');

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])
        ->middleware('permission:Editar usuarios')
        ->name('users.edit');

    Route::put('/users/{user}', [UserController::class, 'update'])
        ->middleware('permission:Editar usuarios')
        ->name('users.update');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])
        ->middleware('permission:Eliminar usuarios')
        ->name('users.destroy');
});

require __DIR__.'/auth.php';
