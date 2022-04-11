<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/admin')->group(function() {
// Admin Login
Route::get('/login', [\App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogin'])->name('adminLogin');
Route::post('/login', [\App\Http\Controllers\Admin\AdminLoginController::class, 'loginAdmin'])->name('loginAdmin');
    Route::group(['middleware' => 'admin'], function() {
     // Admin Dashboard
      Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'adminDashboard'])->name('adminDashboard');
     // Admin Profile Update
        Route::get('/profile', [\App\Http\Controllers\Admin\AdminProfileController::class, 'profile'])->name('admin.profile');
        Route::post('/profile/update/{id}', [\App\Http\Controllers\Admin\AdminProfileController::class, 'updateProfile'])->name('updateProfile');
        // Admin Password
        Route::get('/profile/change_password', [\App\Http\Controllers\Admin\AdminProfileController::class, 'changePassword'])->name('changePassword');
        // Checking User Password
        Route::post('/profile/check-password', [\App\Http\Controllers\Admin\AdminProfileController::class, 'chkUserPassword'])->name('chkUserPassword');
        // Update Password
        Route::post('/profile/update_password/{id}', [\App\Http\Controllers\Admin\AdminProfileController::class, 'updatePassword'])->name('updatePassword');
     // Settings
        Route::get('/settings/general', [\App\Http\Controllers\Admin\SettingsController::class, 'generalSettings'])->name('generalSettings');
        Route::post('/settings/general/update/{id}', [\App\Http\Controllers\Admin\SettingsController::class, 'generalSettingsUpdate'])->name('generalSettingsUpdate');

     // Departments
        Route::get('/departments', [\App\Http\Controllers\Admin\DepartmentController::class, 'index'])->name('department.index');
        Route::post('/department/store', [\App\Http\Controllers\Admin\DepartmentController::class, 'store'])->name('department.store');
        Route::get('/table/department', [\App\Http\Controllers\Admin\DepartmentController::class, 'dataTable'])->name('table.department');
        Route::post('/department/update/{id}', [\App\Http\Controllers\Admin\DepartmentController::class, 'update'])->name('department.update');
        Route::get('/delete-department/{id}', [\App\Http\Controllers\Admin\DepartmentController::class, 'destroy'])->name('department.destroy');

    // Clients
        Route::get('/clients', [\App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('client.index');
        Route::get('/client/add', [\App\Http\Controllers\Admin\CustomerController::class, 'add'])->name('client.add');
        Route::post('/client/store', [\App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('client.store');
        Route::get('/table/client', [\App\Http\Controllers\Admin\CustomerController::class, 'dataTable'])->name('table.client');
        Route::get('/changeStatus', [\App\Http\Controllers\Admin\CustomerController::class, 'changeStatus'])->name('changeStatus');
        Route::get('/client/edit/{id}', [\App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('client.edit');
        Route::post('/client/update/{id}', [\App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('client.update');
        Route::get('/delete-client/{id}', [\App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('client.destroy');
        Route::get('/clients/{id}', [\App\Http\Controllers\Admin\CustomerController::class, 'clientsDetail'])->name('clientsDetail');
        Route::get('/clients/package/{id}', [\App\Http\Controllers\Admin\CustomerController::class, 'clientPackage'])->name('clientPackage');


        //Source

        Route::get('/sources', [\App\Http\Controllers\Admin\SourceController::class, 'index'])->name('source.index');
        Route::get('/source/add', [\App\Http\Controllers\Admin\SourceController::class, 'add'])->name('source.add');
        Route::post('/source/store', [\App\Http\Controllers\Admin\SourceController::class, 'store'])->name('source.store');
        Route::get('/table/source', [\App\Http\Controllers\Admin\SourceController::class, 'dataTable'])->name('table.source');
        Route::get('/source/edit/{id}', [\App\Http\Controllers\Admin\SourceController::class, 'edit'])->name('source.edit');
        Route::post('/source/update/{id}', [\App\Http\Controllers\Admin\SourceController::class, 'update'])->name('source.update');
        Route::get('/delete-source/{id}', [\App\Http\Controllers\Admin\SourceController::class, 'destroy'])->name('source.destroy');
        
        //Lead
     Route::get('/leads', [\App\Http\Controllers\Admin\LeadController::class, 'index'])->name('lead.index');
     Route::get('/lead/add', [\App\Http\Controllers\Admin\LeadController::class, 'add'])->name('lead.add');
     Route::post('/lead/store', [\App\Http\Controllers\Admin\LeadController::class, 'store'])->name('lead.store');
     Route::get('/table/lead', [\App\Http\Controllers\Admin\LeadController::class, 'dataTable'])->name('table.lead');
     Route::get('/lead/edit/{id}', [\App\Http\Controllers\Admin\LeadController::class, 'edit'])->name('lead.edit');
     Route::post('/lead/update/{id}', [\App\Http\Controllers\Admin\LeadController::class, 'update'])->name('lead.update');
     Route::get('/delete-lead/{id}', [\App\Http\Controllers\Admin\LeadController::class, 'destroy'])->name('lead.destroy');

       


    });
    // Admin Logout
    Route::get('/logout', [\App\Http\Controllers\Admin\AdminLoginController::class, 'logout'])->name('admin.logout');
});


