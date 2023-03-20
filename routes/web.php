<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;

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

Route::get('/entry', [EntryController::class, 'showAll']);

Route::post('/create', [EntryController::class, 'create']);

Route::get('/entries/{id}', [EntryController::class, 'details']);

Route::delete('/entry/{id}', [EntryController::class, 'delete']);
 
