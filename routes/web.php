<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\ContactsController;

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
    return view('welcome');
});

Route::resource('Deals', DealsController::class);
Route::resource('organisation', OrganisationController::class);
Route::resource('Contacts', ContactsController::class);
Route::resource('Posts', PostsController::class);
Route::resource('Leads', LeadController::class);



