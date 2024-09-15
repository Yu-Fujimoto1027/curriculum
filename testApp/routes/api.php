<?php

use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\BillingAddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('todo/create', [TodoController::class, 'store'])->name('api.todo.create');
Route::patch('todo/{id}', [TodoController::class, 'update'])->name('api.todo.update');
Route::get('todo/{id}', [TodoController::class, 'show'])->name('api.todo.show');
Route::delete('todo/{id}', [TodoController::class, 'destroy'])->name('api.todo.destroy');

Route::post('company/create', [CompanyController::class, 'store'])->name('api.company.create');
Route::patch('company/{company}', [CompanyController::class, 'update'])->name('api.company.update');
Route::get('company/{company}', [CompanyController::class, 'show'])->name('api.company.show');
Route::delete('company/{company}', [CompanyController::class, 'destroy'])->name('api.company.destroy');
Route::post('company/{id}-with-billing_addresses', [CompanyController::class, 'showWithBilling_addresses'])->name('api.company.create.with_billing_addresses');

Route::post('/company/{companyId}/billing_addresses', [BillingAddressController::class, 'store'])
    ->name('api.billing_address.create');
Route::patch('billing_address/{billing_address}', [BillingAddressController::class, 'update'])->name('api.billing_address.update');
Route::get('billing_address/{billing_address}', [BillingAddressController::class, 'show'])->name('api.billing_address.show');
Route::delete('billing_address/{billing_address}', [BillingAddressController::class, 'destroy'])->name('api.billing_address.destroy');
