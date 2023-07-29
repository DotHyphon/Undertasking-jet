<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use app\http\controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if(auth()->user()){
        return redirect('/dashboard');
    }
    return view('auth/login');
});

Route::get('/tasks', function () {
    if(auth()->user()){
        return view('/tasks/create');
    }
    return view('auth/login');
});

Route::post('/tasks/create', [TaskController::class, 'create'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
