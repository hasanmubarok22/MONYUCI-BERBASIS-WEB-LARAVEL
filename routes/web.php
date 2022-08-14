<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\ServiceController;

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

Route::get('register', [RegisterController::class, 'index'])->name('register');

Route::get('register/laundry', [RegisterController::class, 'laundryIndex'])->name('register.laundry')->middleware('guest:laundry');
Route::post('register/laundry', [RegisterController::class, 'laundryRegister'])->middleware('guest:laundry');

Route::get('register/customer', [RegisterController::class, 'customerIndex'])->name('register.customer')->middleware('guest:web');
Route::post('register/customer', [RegisterController::class, 'customerRegister'])->middleware('guest:web');

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest:web');
Route::post('login', [LoginController::class, 'login'])->middleware('guest:web');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('admin/login', [LoginController::class, 'adminIndex'])->name('admin.login')->middleware('guest:admin');
Route::post('admin/login', [LoginController::class, 'adminLogin'])->middleware('guest:admin');

Route::get('laundry/login', [LoginController::class, 'laundryIndex'])->name('laundry.login')->middleware('guest:laundry');
Route::post('laundry/login', [LoginController::class, 'laundryLogin'])->middleware('guest:laundry');

Route::get('courier/login', [LoginController::class, 'courierIndex'])->name('courier.login')->middleware('guest:courier');
Route::post('courier/login', [LoginController::class, 'courierLogin'])->middleware('guest:courier');


Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/search', [LaundryController::class, 'index'])->name('laundry.search');
Route::get('/laundries/{laundry:username}', [LaundryController::class, 'show'])->name('laundry.show');
Route::put('/laundries/{laundry:username}/comment', [LaundryController::class, 'updateComment'])->name('laundry.comment.update');

Route::put('orders/{order}', [OrderController::class, 'updateStatus'])->name('order.update');
Route::put('orders/{order}/confirmation', [OrderController::class, 'updateConfirmation'])->name('order.confirmation.update');

Route::middleware('role:laundry')->prefix('laundry')->group(function () {
  Route::get('/dashboard', [LaundryController::class, 'dashboard'])->name('laundry.index');
  Route::get('/notifications', [LaundryController::class, 'notification'])->name('laundry.notifications');
  Route::get('/orders', [OrderController::class, 'indexLaundry'])->name('laundry.order');
  Route::get('/finance', [LaundryController::class, 'finance'])->name('laundry.finance');
  Route::get('/banks', [LaundryController::class, 'bankaccount'])->name('laundry.bank');
  Route::get('/banks/create', [LaundryController::class, 'bankaccountCreate'])->name('laundry.bank.create');
  Route::post('/banks', [LaundryController::class, 'bankaccountStore'])->name('laundry.bank.store');
  Route::get('/banks/{bankaccount}/edit', [LaundryController::class, 'bankaccountEdit'])->name('laundry.bank.edit');
  Route::put('/banks/{bankaccount}/edit', [LaundryController::class, 'bankaccountUpdate']);
  Route::get('/services', [ServiceController::class, 'index'])->name('laundry.services');
  Route::get('/services/create', [ServiceController::class, 'create'])->name('laundry.services.create');
  Route::post('/services', [ServiceController::class, 'store'])->name('laundry.services.store');
  Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('laundry.services.edit');
  Route::put('/services/{service}', [ServiceController::class, 'update'])->name('laundry.services.update');
  Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('laundry.services.delete');
  Route::get('/account', [LaundryController::class, 'account'])->name('laundry.account');
  Route::get('/account/profile', [LaundryController::class, 'profile'])->name('laundry.profile');
  Route::put('/account/profile', [LaundryController::class, 'profileUpdate'])->name('laundry.profile.edit');
  Route::get('/account/address', [LaundryController::class, 'address'])->name('laundry.address');
  Route::put('/account/address', [LaundryController::class, 'addressUpdate'])->name('laundry.address.edit');
});

Route::middleware('role:web')->group(function () {
  Route::prefix('account')->group(function () {
    Route::get('/', function () {
      return redirect()->route('account.setting');
    })->name('.setting');
    Route::get('/setting', [UserController::class, 'setting'])->name('account.setting');
    Route::get('/setting/profile', [UserController::class, 'profile'])->name('account.profile');
    Route::put('/setting/profile/edit', [UserController::class, 'profileUpdate'])->name('account.profile.edit');
    Route::get('/setting/address', [UserController::class, 'address'])->name('account.address');
    Route::put('/setting/address/edit', [UserController::class, 'addressUpdate'])->name('account.address.edit');
    Route::post('/favorites/{laundry:username}', [UserController::class, 'favoriteStore'])->name('account.favorite.store');
    Route::get('/favorites', [UserController::class, 'favorite'])->name('account.favorite');
  });
  Route::get('/notifications', [UserController::class, 'notification'])->name('notifications');
  Route::get('orders/create', [OrderController::class, 'create'])->name('order.create');
  Route::post('orders', [OrderController::class, 'store'])->name('order.store');
  Route::get('account/orders', [OrderController::class, 'indexCustomer'])->name('order');
  Route::put('carts', [CartController::class, 'update'])->name('cart.update');
});

Route::middleware('role:courier')->prefix('courier')->group(function () {
  Route::get('/', [CourierController::class, 'index'])->name('courier.index');
  Route::get('/setting', [CourierController::class, 'setting'])->name('courier.setting');
  Route::get('/notifications', function () {
    return redirect()->route('courier.index', ['type' => 'notification']);
  })->name('courier.notifications');
  Route::get('/setting/profile', [CourierController::class, 'profile'])->name('courier.profile');
  Route::put('/setting/profile', [CourierController::class, 'profileUpdate'])->name('courier.profile.edit');
});

Route::middleware('role:admin')->prefix('admin')->group(function () {
  Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.index');
  Route::get('/notifications', [AdminController::class, 'notification'])->name('admin.notifications');
  Route::get('/users', [AdminController::class, 'user'])->name('admin.user');
  Route::get('/users/edit', [AdminController::class, 'userEdit'])->name('admin.user.edit');
  Route::put('/users/edit', [AdminController::class, 'userUpdate'])->name('admin.user.update');
  Route::delete('/users/{user}/delete', [AdminController::class, 'userDelete'])->name('admin.user.delete');
  Route::get('/orders', [AdminController::class, 'order'])->name('admin.orders');
  Route::get('/setting', [AdminController::class, 'setting'])->name('admin.setting');
  Route::get('/setting/profile', [AdminController::class, 'profile'])->name('admin.profile');
  Route::put('/setting/profile/edit', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
});
