<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SubCatController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/product',[SubCatController::class,'index'])->name("subcat");
Route::post('/addproduct',[SubCatController::class,'add'])->name("addsubcat");
Route::get('/showproduct',[SubCatController::class,'show'])->name("showsubcat");
Route::get('/',[SubCatController::class,'fshow']);
Route::get('/showproduct/{id}',[SubCatController::class,'delete'])->name("deletesubcat");
Route::get('/editproduct/{id}',[SubCatController::class,'edit'])->name("editsubcat");
Route::post('/updateproduct/{id}',[SubCatController::class,'update'])->name("updatesubcat");
Route::get('/single/{id}',[SubCatController::class,'single'])->name("single");


Route::post('/addNewUser',[UserController::class,'store'])->middleware(['auth', 'verified'])->name("addNewUser");
Route::get('/home',[UserController::class,'index'])->middleware(['auth', 'verified'])->name("home");
Route::get('/edituser/{id}',[UserController::class,'edit'])->middleware(['auth', 'verified'])->name("edituser");
Route::get('/deleteuser/{id}',[UserController::class,'destroy'])->middleware(['auth', 'verified'])->name("deleteuser");
Route::post('/updateuser/{id}',[UserController::class,'update'])->middleware(['auth', 'verified'])->name("updateuser");

require __DIR__.'/auth.php';
