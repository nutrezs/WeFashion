<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

//routes lié à l'administration
Route::group(['middleware'=>'auth'], function(){
    Route::match(['get', 'post'],'/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::match(['get', 'post'], '/store', [AdminController::class, 'store'])->name('admin.store');
    Route::match(['get', 'post'], '/create', [AdminController::class, 'create'])->name('admin.create');
    Route::match(['get', 'post'], '/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::match(['get', 'post'], '/publish/{id}', [AdminController::class, 'publish'])->name('admin.publish');
    Route::match(['get', 'post'], '/produit/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::match(['get', 'post'], '/produit/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});


//routes qui gérent les listing des produits, filtrage par hommes et par femme puis par solde
Route::get('/', [HomeController::class,'index'])->name('boutique');
Route::get('/Produit/{id}',[HomeController::class, 'productDescribe'])->name('admins.ProductDescription');
Route::get('/homme',[HomeController::class, 'produitsHomme'])->name('homme');
Route::get('/femme',[HomeController::class, 'produitsFemme'])->name('femme');
Route::get('/solde',[HomeController::class, 'ShowProductSolde'])->name('solde');



require __DIR__.'/auth.php';
