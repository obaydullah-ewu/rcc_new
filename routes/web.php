<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LandAmountController;
use App\Http\Controllers\Admin\LandKhotiyanController;
use App\Http\Controllers\Admin\LandLeaseController;
use App\Http\Controllers\Admin\LandDagController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MouzaController;
use App\Http\Controllers\Admin\RenewLandLeaseApplicationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\LandLeaseController as UserLandLeaseController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Models\LandLease;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin']], function (){
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('profile-overview', [ProfileController::class, 'profileOverview'])->name('profile.overview');
        Route::get('profile-settings', [ProfileController::class, 'profileSettings'])->name('profile.settings');
        Route::post('profile-settings', [ProfileController::class, 'profileSettings'])->name('profile.settings.post');

        //Start:: Admin
        Route::resource('admin', AdminController::class);
        Route::get('admin-get-email',[AdminController::class, 'getEmail'])->name('admin.get-email');
        //End:: Admin

        //Start:: Land Information
        Route::group(['prefix' => 'land_information', 'as' => 'land_information.'], function () {
            Route::group(['prefix' => 'mouza', 'as' => 'mouza.'], function () {
                Route::get('/', [MouzaController::class, 'index'])->name('index');
                Route::post('mouza/store', [MouzaController::class, 'store'])->name('store');
                Route::put('mouza/update/{id}', [MouzaController::class, 'update'])->name('update');
                Route::delete('mouza/delete/{id}', [MouzaController::class, 'delete'])->name('delete');
            });

            Route::group(['prefix' => 'khotiyan', 'as' => 'khotiyan.'], function () {
                Route::get('/', [LandKhotiyanController::class, 'index'])->name('index');
                Route::post('khotiyan/store', [LandKhotiyanController::class, 'store'])->name('store');
                Route::put('khotiyan/update/{id}', [LandKhotiyanController::class, 'update'])->name('update');
                Route::delete('khotiyan/delete/{id}', [LandKhotiyanController::class, 'delete'])->name('delete');
            });

            Route::group(['prefix' => 'dag', 'as' => 'dag.'], function () {
                Route::get('/', [LandDagController::class, 'index'])->name('index');
                Route::post('store', [LandDagController::class, 'store'])->name('store');
                Route::put('update/{id}', [LandDagController::class, 'update'])->name('update');
                Route::delete('delete/{id}', [LandDagController::class, 'delete'])->name('delete');
            });

            Route::group(['prefix' => 'land_amount', 'as' => 'land_amount.'], function () {
                Route::get('/', [LandAmountController::class, 'index'])->name('index');
                Route::post('store', [LandAmountController::class, 'store'])->name('store');
                Route::put('update/{id}', [LandAmountController::class, 'update'])->name('update');
                Route::delete('delete/{id}', [LandAmountController::class, 'delete'])->name('delete');
            });
        });
        //End:: Land Information

        Route::get('roles/get-sub-module/{id}', [RoleController::class, 'getSubmodule'])->name('getsubmodule');
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class);
        Route::resource('land-lease', LandLeaseController::class);
        Route::get('cancelled-land-lease-list', [LandLeaseController::class, 'cancelledLandLeaseList'])->name('cancelledLandLeaseList');
        Route::get('user-info', [LandLeaseController::class, 'userInfo'])->name('user-info');

        Route::group(['prefix' => 'renew-lease-application', 'as' => 'renew-lease-application.'], function (){
            Route::get('/', [RenewLandLeaseApplicationController::class, 'renewLandLeaseApplication'])->name('index');

            Route::get('surveyor-investigation-report/{land_lease_uuid}', [RenewLandLeaseApplicationController::class, 'surveyorInvestigationReport'])->name('surveyorInvestigationReport');
            Route::post('surveyor-investigation-report/{land_lease_uuid}', [RenewLandLeaseApplicationController::class, 'surveyorInvestigationReportStore'])->name('surveyorInvestigationReport.store');
            Route::get('surveyor-investigation-report-show/{land_lease_uuid}', [RenewLandLeaseApplicationController::class, 'surveyorInvestigationReportShow'])->name('surveyorInvestigationReport.show');

            Route::post('approval-cycle-role-id/change', [RenewLandLeaseApplicationController::class, 'approvalCycleRoleIdChange'])->name('approvalCycleRoleIdChange');
            Route::get('cancelled-renew-land-lease-list', [RenewLandLeaseApplicationController::class, 'cancelledRenewLandLeaseList'])->name('cancelledRenewLandLeaseList');

            Route::get('assistant-computer-investigation-report/{land_lease_uuid}', [RenewLandLeaseApplicationController::class, 'assistantComputerInvestigationReport'])->name('assistantComputerInvestigationReport');
            Route::post('assistant-computer-investigation-report/{land_lease_uuid}', [RenewLandLeaseApplicationController::class, 'assistantComputerInvestigationReportStore'])->name('assistantComputerInvestigationReport.store');
            Route::get('assistant-computer-investigation-report-show/{land_lease_uuid}', [RenewLandLeaseApplicationController::class, 'assistantComputerInvestigationReportShow'])->name('assistantComputerInvestigationReport.show');
            Route::get('order-sheet-show/{land_lease_uuid}', [RenewLandLeaseApplicationController::class, 'orderSheetShow'])->name('orderSheet.show');
        });
    });
});

Route::get('land-lease/application-pdf/{id}', [LandLeaseController::class,'leaseApplication'])->name('leaseApplication');

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
        Route::resource('land-lease', UserLandLeaseController::class);
        Route::get('land-lease/application-pdf/{id}', [UserLandLeaseController::class,'leaseApplication'])->name('leaseApplication');
        Route::post('change-renewal-status', [UserLandLeaseController::class, 'changeRenewalStatus'])->name('land-lease.changeRenewalStatus');

    });
});

Route::get('order-sheet-show/{land_lease_uuid}', [RenewLandLeaseApplicationController::class, 'orderSheetShow'])->name('orderSheet.show');

//Start:: Location
Route::group(['prefix' => 'location', 'as' => 'location.'], function () {
    Route::get('divisions', [LocationController::class, 'divisions'])->name('divisions');
    Route::post('division/store', [LocationController::class, 'divisionStore'])->name('division.store');
    Route::put('division/update/{id}', [LocationController::class, 'divisionUpdate'])->name('division.update');
    Route::delete('division/delete/{id}', [LocationController::class, 'divisionDelete'])->name('division.delete');

    Route::get('districts', [LocationController::class, 'districts'])->name('districts');
    Route::post('district/store', [LocationController::class, 'districtStore'])->name('district.store');
    Route::put('district/update/{id}', [LocationController::class, 'districtUpdate'])->name('district.update');
    Route::delete('district/delete/{id}', [LocationController::class, 'districtDelete'])->name('district.delete');

    Route::get('upazilas', [LocationController::class, 'upazilas'])->name('upazilas');
    Route::post('upazila/store', [LocationController::class, 'upazilaStore'])->name('upazila.store');
    Route::put('upazila/update/{id}', [LocationController::class, 'upazilaUpdate'])->name('upazila.update');
    Route::delete('upazila/delete/{id}', [LocationController::class, 'upazilaDelete'])->name('upazila.delete');

    Route::get('post-offices', [LocationController::class, 'postOffices'])->name('post-offices');
    Route::post('post-office/store', [LocationController::class, 'postOfficeStore'])->name('postOffice.store');
    Route::put('post-office/update/{id}', [LocationController::class, 'postOfficeUpdate'])->name('postOffice.update');
    Route::delete('post-office/delete/{id}', [LocationController::class, 'postOfficeDelete'])->name('postOffice.delete');

    Route::get('villages', [LocationController::class, 'villages'])->name('villages');
    Route::post('village/store', [LocationController::class, 'villageStore'])->name('village.store');
    Route::put('village/update/{id}', [LocationController::class, 'villageUpdate'])->name('village.update');
    Route::delete('village/delete/{id}', [LocationController::class, 'villageDelete'])->name('village.delete');

    //Start:: Get Division to District, District to Upazila, Upazila to Post Office, Post Office to Village
    Route::get('get-districts', [LocationController::class, 'getDistricts'])->name('getDistrict');
    Route::get('get-upazilas', [LocationController::class, 'getUpazilas'])->name('getUpazila');
    Route::get('get-post-offices', [LocationController::class, 'getPostOffices'])->name('getPostOffice');
    Route::get('get-villages', [LocationController::class, 'getVillages'])->name('getVillages');
    //End:: Get Division to District, District to Upazila, Upazila to Post Office, Post Office to Village
});
//End:: Location

//Start:: Land Information
Route::group(['prefix' => 'land_information', 'as' => 'land_information.'], function () {
    Route::get('get-mouza', [LandKhotiyanController::class, 'getMouza'])->name('getMouza');
    Route::get('get-lang-dag', [LandAmountController::class, 'getLandDag'])->name('getLandDag');
    Route::get('get-lang-amount', [LandAmountController::class, 'getLandAmount'])->name('getLandAmount');
});

Route::get('land-lease-details/{id}', function ($id){
    $data['pageTitle'] = 'জমি লিজের বিবরণ';
    $data['landLease'] = LandLease::find($id);
    return view('pdf.land-lease-details')->with($data);
})->name('landLease.details');
