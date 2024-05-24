<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});


//route for dashboards
Route::get('/dashboard', function () {

    if(Auth::user()->roles[0]->name == 'admin')
    {
        return view('Admin.dashboard');
    }
    else if(Auth::user()->roles[0]->name == 'employee'){
        return view('Employee.dashboard');
    }


    return view('dashboard');


})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
