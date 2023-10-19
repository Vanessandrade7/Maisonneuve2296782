<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SharedFileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ArticleController;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/etudiants', [IndexController::class, 'index'])->middleware('auth')->name('etudiants.index');
Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit'])->middleware('auth')->name('etudiants.edit');
Route::get('/etudiants/create', [EtudiantController::class, 'create'])->middleware('auth')->name('etudiants.create');
Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update'])->middleware('auth')->name('etudiants.update');
Route::post('/etudiants', [EtudiantController::class, 'store'])->middleware('auth')->name('etudiants.store');
Route::delete('/etudiants/{etudiant}', [EtudiantController::class, 'destroy'])->middleware('auth')->name('etudiants.destroy');
Route::get('/etudiants/{etudiant}', [EtudiantController::class, 'show'])->middleware('auth')->name('etudiants.show');
Auth::routes(['register' => false]);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register',  [RegisterController::class, 'register']);
Route::resource('articles', ArticleController::class)->middleware('auth');
Route::resource('shared-files', SharedFileController::class)->middleware('auth');
Route::get('/shared-files/{id}/download', [SharedFileController::class,'download'])->name('shared-files.download');

