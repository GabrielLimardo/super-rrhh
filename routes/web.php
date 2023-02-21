<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\VisualController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\PaymentTypesController;
use App\Http\Controllers\PaymentHistoryController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('payment-history/export',[PaymentHistoryController::class,'export']);
Route::get('payment-history/update',[PaymentHistoryController::class,'updatePaymentHistory']);

Route::middleware([
    'auth:sanctum',

])->group(function () {
    Route::resource('users',UserController::class);
    Route::resource('companies',CompanyController::class);
    Route::resource('branches',BranchController::class);
    Route::resource('managements',ManagementController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('organization',OrganizationController::class);
    Route::resource('visual',VisualController::class);
    Route::resource('document-types',DocumentTypeController::class);
    Route::resource('payment-history',PaymentHistoryController::class);
    Route::resource('payment-types',PaymentTypesController::class);

    Route::get('certificado',[CertificadoController::class,'newCertificado']);
});


