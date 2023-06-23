<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NumberController;

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

Route::get('/cadastrar/{i}', [NumberController::class, 'cadastrar'])->middleware('auth');
Route::get('/cadastrar', [NumberController::class, 'create'])->middleware('auth');
Route::get('/', [NumberController::class, 'show'])->middleware('auth');
Route::post('/cadastrar', [NumberController::class, 'store'])->middleware('auth');

Route::get('/user/password', [NumberController::class, 'pass'])->middleware('auth');
Route::put('/user/password', [NumberController::class, 'alterpass'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    });
});
