<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ImporterController;
use App\Http\Controllers\MerchantController;

use App\Http\Controllers\Admin\CategoryController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin Route
Route::group(['prefix' => 'admin'], function(){
	Route::group(['middleware'=>'admin.guest'], function(){
		Route::get('login', [AdminController::class, 'loginForm'])->name('admin.login');
		Route::post('login', [AdminController::class, 'login'])->name('admin.auth');
	});

	Route::group(['middleware'=>'admin.auth'], function(){
		Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.home');		
		Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

		Route::get('add-category', [CategoryController::class, 'index'])->name('admin.add-category');
		Route::post('save-category', [CategoryController::class, 'store'])->name('admin.save-category');

	});

});


//Vendor Route
Route::group(['prefix' => 'vendor'], function(){
	Route::group(['middleware'=>'vendor.guest'], function(){
		Route::get('login', [VendorController::class, 'loginForm'])->name('vendor.login');
		Route::post('login', [VendorController::class, 'login'])->name('vendor.auth');
	});

	Route::group(['middleware'=>'vendor.auth'], function(){
		Route::get('dashboard', [VendorController::class, 'dashboard'])->name('vendor.home');		
		Route::post('logout', [VendorController::class, 'logout'])->name('vendor.logout');
	});

});


//Importer Route
Route::group(['prefix' => 'importer'], function(){
	Route::group(['middleware'=>'importer.guest'], function(){
		Route::get('login', [ImporterController::class, 'loginForm'])->name('importer.login');
		Route::post('login', [ImporterController::class, 'login'])->name('importer.auth');
	});

	Route::group(['middleware'=>'importer.auth'], function(){
		Route::get('dashboard', [ImporterController::class, 'dashboard'])->name('importer.home');		
		Route::post('logout', [ImporterController::class, 'logout'])->name('importer.logout');
	});

});


//Merchant Route
Route::group(['prefix' => 'merchant'], function(){
	Route::group(['middleware'=>'merchant.guest'], function(){
		Route::get('login', [MerchantController::class, 'loginForm'])->name('merchant.login');
		Route::post('login', [MerchantController::class, 'login'])->name('merchant.auth');
	});

	Route::group(['middleware'=>'merchant.auth'], function(){
		Route::get('dashboard', [MerchantController::class, 'dashboard'])->name('merchant.home');		
		Route::post('logout', [MerchantController::class, 'logout'])->name('merchant.logout');
	});

});
