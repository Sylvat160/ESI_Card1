<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/admin', [HomeController::class, 'admin'])->name('admin.dashboard');
Route::get('/secretaire',[HomeController::class, 'secret'])->name('secretaire');
// Route::get('/admin',[RegisterController::class, 'view'])->name('admin');
Route::get('/etudiant/create', [EtudiantController::class, 'create'])->name('etudiant.create');


Route::get('/liste/etudiant', [EtudiantController::class, 'listeEtudiant'])->name('etudiant.liste');
Route::post('/etudiant/create', [EtudiantController::class, 'store'])->name('etudiant.store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
