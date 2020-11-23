<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ImporterController;
use App\Http\Controllers\MerchantController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProsubcategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\DeliveryMethodController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\WithdrawController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;


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

		//Category Controller
		Route::resource('category', CategoryController::class);
		Route::resource('subcategory', SubcategoryController::class);
		Route::resource('prosubcategory', ProsubcategoryController::class);

		//Brand Controller
		Route::resource('brand', BrandController::class);

		//Color Controller
		Route::resource('color', ColorController::class);

		//Size Controller
		Route::resource('size', SizeController::class);

		//Product Controller
		Route::resource('product', ProductController::class);

		//Page Controller
		Route::resource('page', PageController::class);

		//Delivery Method Controller
		Route::resource('deliverymethod', DeliveryMethodController::class);	

		//Payment Method Controller
		Route::resource('paymentmethod', PaymentMethodController::class);	

		//Social Link Controller
		Route::resource('social', SocialLinkController::class);	

		//Social Link Controller
		Route::resource('order', OrderController::class);	
		Route::get('admin/invoice-print/{id}', [OrderController::class, 'invoice_print'])->name('admin/invoice-print');		
		Route::post('admin/update-shipping-address/{id}', [OrderController::class, 'update_shipping_address'])->name('admin/update-shipping-address');
		Route::post('admin/update-order-summery/{id}', [OrderController::class, 'update_order_summery'])->name('admin/update-order-summery');

		Route::get('admin/filter-order', [OrderController::class, 'filter_order'])->name('admin/filter-order');


		//Vendor Controller
		Route::resource('vendor', App\Http\Controllers\Admin\VendorController::class);	
		Route::get('admin/inactive-vendor/{id}', [App\Http\Controllers\Admin\VendorController::class, 'inactive_vendor'])->name('admin/inactive-vendor');
		Route::get('admin/active-vendor/{id}', [App\Http\Controllers\Admin\VendorController::class, 'active_vendor'])->name('admin/active-vendor');

		//Importer Controller
		Route::resource('importer', App\Http\Controllers\Admin\ImporterController::class);
		Route::get('admin/inactive-importer/{id}', [App\Http\Controllers\Admin\ImporterController::class, 'inactive_importer'])->name('admin/inactive-importer');
		Route::get('admin/active-importer/{id}', [App\Http\Controllers\Admin\ImporterController::class, 'active_importer'])->name('admin/active-importer');

		//Merchant Controller
		Route::resource('merchant', App\Http\Controllers\Admin\MerchantController::class);
		Route::get('admin/inactive-merchant/{id}', [App\Http\Controllers\Admin\MerchantController::class, 'inactive_merchant'])->name('admin/inactive-merchant');
		Route::get('admin/active-merchant/{id}', [App\Http\Controllers\Admin\MerchantController::class, 'active_merchant'])->name('admin/active-merchant');

		//Customer Controller
		Route::resource('customer', CustomerController::class);
		Route::get('admin/inactive-customer/{id}', [CustomerController::class, 'inactive_customer'])->name('admin/inactive-customer');
		Route::get('admin/active-customer/{id}', [CustomerController::class, 'active_customer'])->name('admin/active-customer');

		//Withdraw Controller
		Route::resource('withdraw', WithdrawController::class);	
		Route::get('admin/inactive-withdraw/{id}', [WithdrawController::class, 'inactive_withdraw'])->name('admin/inactive-withdraw');
		Route::get('admin/active-withdraw/{id}', [WithdrawController::class, 'active_withdraw'])->name('admin/active-withdraw');




		//Ajax Request
		Route::post('admin/get-subcategory', [ProsubcategoryController::class, 'get_subcategory'])->name('admin/get-subcategory');
		Route::post('admin/get-prosubcategory', [ProductController::class, 'get_prosubcategory'])->name('admin/get-prosubcategory');

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
