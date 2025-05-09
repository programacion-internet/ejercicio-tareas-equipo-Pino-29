<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ArchivoController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::resource('tareas', \App\Http\Controllers\TareaController::class);

Route::POST('/tareas/{tarea}/invite', [TareaController::class, 'invite'])
     ->name('tareas.invite')
     ->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::post   ('tareas/{tarea}/archivos',     [ArchivoController::class,'store'])
            ->name('tareas.archivos.store');
    Route::get    ('tareas/{tarea}/archivos',     [ArchivoController::class,'index'])
            ->name('tareas.archivos.index');
    Route::delete ('tareas/{tarea}/archivos/{file}', [ArchivoController::class,'destroy'])
            ->name('tareas.archivos.destroy');
});

require __DIR__.'/auth.php';
