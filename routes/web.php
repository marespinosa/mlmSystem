<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\MlmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDisplayMlm;

use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('index');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/stockies', 'stockies')->name('stockies.index');
    Route::get('/stockies', 'stockies')->name('stockies.index');
    
});




Route::controller(MlmController::class)->group(function() {
    Route::post('/profile', 'showProfile')->name('tree');
    Route::get('/profile', 'showProfile')->name('tree');
    Route::post('/tree', 'displayAdmin')->name('tree');
    Route::get('/tree', 'displayAdmin')->name('tree');


});




Route::group(['middleware' => 'admin'], function () {
    Route::controller(MlmController::class)->group(function() {
        Route::post('/superadmin', 'activateAccount')->name('superadmin.index');
        Route::get('/superadmin', 'activateAccount')->name('superadmin.index');


        Route::post('/superadmin/{id}/update', 'update')->name('superadmin.update');
        Route::get('/superadmin/{id}/update', 'update')->name('superadmin.update');

        Route::post('/superadmin', 'SearchMember')->name('superadmin.index');
        Route::get('/superadmin', 'SearchMember')->name('superadmin.index');


        Route::post('/superadmin/edit-data/{id}', 'viewform')->name('superadmin.viewform');
        Route::get('/superadmin/edit-data/{id}', 'viewform')->name('superadmin.viewform');

      
    });
});



Route::controller(UserController::class)->group(function() {
    Route::post('/settings/{id}', 'UpdateProfilesPic')->name('update.profiles');
    Route::get('/settings/{id}', 'UpdateProfilesPic')->name('update.profiles');
   
});


Route::post('settings', [UserController::class, 'index']);
Route::put('settings/{id}', [UserController::class, 'update']);



Route::controller(UserController::class)->group(function() {
    Route::get('settings', 'showChangePasswordForm')->name('showChangePasswordForm');
    Route::post('settings', 'changePassword')->name('changePassword');
});


Route::controller(UserDisplayMlm::class)->group(function() {
    Route::post('/tree', 'CurrentSponsor')->name('tree');
    Route::get('/tree', 'CurrentSponsor')->name('tree');
    
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(ProductController::class)->group(function() {
    Route::get('products/addnew', 'create')->name('products.create');
    Route::post('products/addnew', 'store')->name('products.store');
    Route::post('products/addnew', 'store')->name('products.addnew');

    Route::get('products', 'index')->name('products.index');
    Route::get('products/beautypro', 'beautyProducts')->name('products.beautypro');
    Route::get('products/cosmetics', 'Cosmetics')->name('products.cosmetics');
    Route::get('products/foodcup', 'FoodSuple')->name('products.foodcup');
    Route::get('products/homecare', 'homeCare')->name('products.homecare');
    Route::get('products/all', 'viewAll')->name('products.all');
    Route::get('products/addnew', 'addnewPage')->name('products.addnewPage');


});

