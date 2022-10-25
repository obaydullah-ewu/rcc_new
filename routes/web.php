<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\Trade\BusinessManagementController;
use App\Http\Controllers\Admin\Trade\BusinessNatureController;
use App\Http\Controllers\Admin\Trade\BusinessTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\CitizenshipController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\User\CitizenshipController as UserCitizenshipController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\LoginController as UserLoginController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::redirect('/', url('/user/login'));
Route::redirect('/user', url('/user/login'));
Route::redirect('/admin', url('/admin/login'));

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('profile-overview', [ProfileController::class, 'profileOverview'])->name('profile.overview');
        Route::get('profile-settings', [ProfileController::class, 'profileSettings'])->name('profile.settings');
        Route::post('profile-settings', [ProfileController::class, 'profileSettings'])->name('profile.settings.post');

        //Start:: Admin
        Route::resource('admin', AdminController::class);
        Route::get('admin-get-email', [AdminController::class, 'getEmail'])->name('admin.get-email');
        //End:: Admin

        Route::get('roles/get-sub-module/{id}', [RoleController::class, 'getSubmodule'])->name('getsubmodule');
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class);

        Route::group(['prefix' => 'citizenship', 'as' => 'citizenship.'], function () {
            Route::get('/', [CitizenshipController::class, 'list'])->name('list');
            Route::post('changeStatus', [CitizenshipController::class, 'changeStatus'])->name('changeStatus');
        });

        Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
            Route::get('general-setting', [SettingController::class, 'generalSetting'])->name('generalSetting');
            Route::post('generalSettingUpdate', [SettingController::class, 'generalSettingUpdate'])->name('generalSettingUpdate');
            Route::get('citizenship', [SettingController::class, 'citizenshipSetting'])->name('citizenship');
        });

        Route::group(['prefix' => 'trade', 'as' => 'trade.'], function () {
            Route::group(['prefix' => 'business-management', 'as' => 'business-management.'], function () {
                Route::get('/', [BusinessManagementController::class, 'index'])->name('index');
                Route::post('store', [BusinessManagementController::class, 'store'])->name('store');
                Route::put('update/{id}', [BusinessManagementController::class, 'update'])->name('update');
                Route::delete('delete/{id}', [BusinessManagementController::class, 'delete'])->name('delete');
            });

            Route::group(['prefix' => 'business-nature', 'as' => 'business-nature.'], function () {
                Route::get('/', [BusinessNatureController::class, 'index'])->name('index');
                Route::post('store', [BusinessNatureController::class, 'store'])->name('store');
                Route::put('update/{id}', [BusinessNatureController::class, 'update'])->name('update');
                Route::delete('delete/{id}', [BusinessNatureController::class, 'delete'])->name('delete');
            });

            Route::group(['prefix' => 'business-type', 'as' => 'business-type.'], function () {
                Route::get('/', [BusinessTypeController::class, 'index'])->name('index');
                Route::post('store', [BusinessTypeController::class, 'store'])->name('store');
                Route::put('update/{id}', [BusinessTypeController::class, 'update'])->name('update');
                Route::delete('delete/{id}', [BusinessTypeController::class, 'delete'])->name('delete');
            });
        });
    });
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('registration', [UserLoginController::class, 'showRegistrationForm'])->name('registration');
    Route::post('registration', [UserLoginController::class, 'registration'])->name('registration.post');
    Route::get('login', [UserLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [UserLoginController::class, 'login'])->name('login.post');


    Route::group(['middleware' => ['auth']], function () {
        Route::get('logout', [UserLoginController::class, 'logout'])->name('logout');

        Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('my-profile', [UserLoginController::class, 'myProfile'])->name('my-profile');
        Route::post('my-profile', [UserLoginController::class, 'myProfileUpdate'])->name('my-profile.update');

        Route::group(['prefix' => 'citizenship', 'as' => 'citizenship.'], function () {
            Route::get('/', [UserCitizenshipController::class, 'list'])->name('list');
            Route::get('application', [UserCitizenshipController::class, 'addCitizenshipApplication'])->name('add');
            Route::post('application/store', [UserCitizenshipController::class, 'citizenshipApplicationStore'])->name('apply');
        });
    });
});

Route::get('citizenship-payment-details/{id}', [PDFController::class, 'citizenshipPaymentDetailsPDF'])->name('citizenship.paymentDetails.pdf');
Route::get('citizenship-application/{id}', [PDFController::class, 'citizenshipApplicationPDF'])->name('citizenship.application.pdf');
Route::get('citizenship-certificate/{id}', [PDFController::class, 'citizenshipCertificatePDF'])->name('citizenship.certificate.pdf');
