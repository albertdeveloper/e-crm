<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');


Route::group([
    'prefix' => 'admin',
    'as'    => 'admin.',
    'middleware' => ['auth:sanctum','verified']
],function(){


    Route::resource('permissions',PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


    Route::get('/leads/convert/{id}',[LeadController::class,'convert_leads'])->name('leads.convert');
    Route::resource('leads', LeadController::class);


});
