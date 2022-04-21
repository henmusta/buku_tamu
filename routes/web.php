<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend as Backend;
use App\Http\Controllers\Frontend as Frontend;

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



Route::get('/', [Frontend\HomeController::class,  'index'])->name('index');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::prefix('backend')->name('backend.')->group(function () {
  Route::get('/', [LoginController::class, 'showLoginForm']);
  Route::post('/', [LoginController::class, 'login'])->name('login');
  Route::post('resetpassword', [Backend\UserController::class, 'resetpassword'])->name('users.resetpassword');
});

Route::prefix('backend')->name('backend.')->middleware(['auth:erp'])->group(function () {
  Route::get('dashboard', [Backend\DashboardController::class, 'index'])->name('index');

  Route::resource('pengguna', Backend\PenggunaController::class);




  Route::resource('users', Backend\UserController::class);
  Route::get('roles/select2', [Backend\RoleController::class, 'select2'])->name('roles.select2');
  Route::resource('roles', Backend\RoleController::class);
  Route::resource('permissions', Backend\PermissionController::class);
  Route::get('menupermissions/select2', [Backend\MenuPermissionController::class, 'select2'])->name('menupermissions.select2');
  Route::resource('menupermissions', Backend\MenuPermissionController::class)->except('create', 'edit', 'show');
  Route::resource('menu', Backend\MenuManagerController::class)->except('create', 'show');
  Route::post('menu/changeHierarchy', [Backend\MenuManagerController::class, 'changeHierarchy'])->name('menu.changeHierarchy');});
 
