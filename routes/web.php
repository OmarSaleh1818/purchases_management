<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Backend\InvoicesController;
use App\Http\Controllers\Backend\PurchasesController;
use App\Http\Controllers\Backend\PurchaseOrderController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\PaymentOrderController;
use App\Http\Controllers\Backend\CatchReceiptController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\SubCompanyController;
use App\Http\Controllers\Company\SubSubCompanyController;
use App\Http\Controllers\Company\AccountantController;
use App\Http\Controllers\Company\ManagerController;
use App\Http\Controllers\Company\ManagerPurchaseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// All Dashboard View Route
Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/view/{id}', [DashboardController::class, 'DashboardView'])->name('dashboard.view');

// End All Dashboard View Route
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('invoices', InvoicesController::class);

// All Material Order route
Route::resource('purchases', PurchasesController::class);
Route::get('/add/order', [PurchasesController::class, 'AddOrder'])->name('add.order');
Route::get('/purchases/delete/{id}', [PurchasesController::class, 'PurchaseDelete'])->name('purchase.delete');
Route::get('/print/purchase/{id}', [PurchasesController::class, 'PrintPurchase'])->name('print.purchase');
Route::get('/print/manager/purchase/{id}', [PurchasesController::class, 'PrintManagerPurchase'])->name('print.manager.purchase');

// End All Material Order route


// All Purchase Order Route
Route::resource('purchase/order', PurchaseOrderController::class);
Route::get('/add/purchase/{id}', [PurchaseOrderController::class, 'AddPurchase'])->name('add.purchase');
Route::get('/purchase/order/edit/{id}', [PurchaseOrderController::class, 'PurchaseOrderEdit'])->name('purchases.order.edit');
Route::post('/purchase/order/update/{id}', [PurchaseOrderController::class, 'PurchaseOrderUpdate'])->name('purchases.order.update');
Route::get('/order/delete/{id}', [PurchaseOrderController::class, 'OrderDelete'])->name('order.delete');
Route::get('/print/order/purchase/{id}', [PurchaseOrderController::class, 'PrintOrderPurchase'])
    ->name('print.orderpurchase');
Route::get('/print/manager/order/{id}', [PurchaseOrderController::class, 'PrintManagerOrder'])
    ->name('print.manager.orderpurchase');
// End All Purchases Order route


// All Payment Route
Route::resource('payment', PaymentController::class)->middleware(['auth', 'verified']);
Route::get('/add/payment/{id}', [PaymentController::class, 'AddPayment'])->name('add.payment');
Route::get('/payment/purchase/edit/{id}', [PaymentController::class, 'PaymentPurchaseEdit'])
    ->name('payment.purchase.edit');
Route::post('/payment/purchase/update/{id}', [PaymentController::class, 'PaymentPurchaseUpdate'])
    ->name('payment.purchase.update');
Route::get('/print/payment/{id}', [PaymentController::class, 'PrintPayment'])->name('print.payment');
Route::get('/print/manager/payment/{id}', [PaymentController::class, 'PrintManagerPayment'])->name('print.manager.payment');

Route::get('/add/partial/payment/{id}', [PaymentController::class, 'AddPartialPayment'])->name('add.partial.payment');
Route::post('/partial/payment/store', [PaymentController::class, 'PartialPaymentStore'])
    ->name('partial.payment.store');

Route::get('/batch/payment/{id}', [PaymentController::class, 'BatchPayment'])
    ->name('batch.payment');
// End All Payment Order Route


// All Payment Order Route
Route::resource('command/pay', PaymentOrderController::class);
Route::get('/add/command', [PaymentOrderController::class, 'PaymentOrder'])->name('add.command');
Route::post('/command/store', [PaymentOrderController::class, 'CommandStore'])->name('command.store');
// End All Payment Order Route

// All Receipt Order Route
Route::get('receipt/order', [CatchReceiptController::class, 'ReceiptOrder']);
Route::get('/add/receipt/{id}', [CatchReceiptController::class, 'ReceiptAdd'])->name('add.receipt');
Route::post('/receipt/store', [CatchReceiptController::class, 'ReceiptStore'])->name('receipt.store');


Route::get('receipt/command', [CatchReceiptController::class, 'ReceiptCommand']);
Route::get('/add/receipt/command/{id}', [CatchReceiptController::class, 'AddReceiptCommand'])->name('add.receipt.command');
Route::post('/receipt/command/store', [CatchReceiptController::class, 'ReceiptCommandStore'])->name('receipt.command.store');
// End All Receipt Order Route

// All Catch Receipt Route
Route::get('catch/receipt', [CatchReceiptController::class, 'CatchReceipt']);

// End Catch Receipt Route

// All Accountant route
Route::get('accountant', [AccountantController::class, 'AccountantView']);
Route::get('/payment/edit/{id}', [AccountantController::class, 'PaymentEdit'])->name('payment.edit');
Route::post('/account/update/{id}', [AccountantController::class, 'AccountUpdate'])->name('account.update');
Route::get('/account/sure/{id}', [AccountantController::class, 'AccountSure'])->name('account.sure');
Route::get('/account/eye/{id}', [AccountantController::class, 'AccountEye'])->name('account.eye');
Route::post('/account/eye/update/{id}', [AccountantController::class, 'AccountEyeUpdate'])->name('accounteye.update');

// end Accountant Route

// All Finance Route
Route::get('finance', [AccountantController::class, 'FinanceView']);
Route::get('/finance/sure/{id}', [AccountantController::class, 'FinanceSure'])->name('finance.sure');
Route::get('/finance/edit/{id}', [AccountantController::class, 'FinanceEdit'])->name('finance.edit');
Route::post('/finance/update/{id}', [AccountantController::class, 'FinanceUpdate'])->name('finance.update');
Route::get('/finance/eye/{id}', [AccountantController::class, 'FinanceEye'])->name('finance.eye');
Route::post('/finance/eye/update', [AccountantController::class, 'FinanceEyeUpdate'])->name('financeye.update');

Route::get('finance/command', [AccountantController::class, 'FinanceCommandView']);
Route::get('/command/sure/{id}', [AccountantController::class, 'FinanceCommandSure'])->name('command.sure');
Route::get('/command/edit/{id}', [AccountantController::class, 'FinanceCommandEdit'])->name('command.edit');
Route::post('/command/update/{id}', [AccountantController::class, 'FinanceCommandUpdate'])->name('command.update');

// End All Finance Route

// All manager Route
Route::get('manager', [ManagerController::class, 'ManagerView']);
Route::get('/manager/edit/{id}', [ManagerController::class, 'ManagerEdit'])->name('manager.edit');
Route::post('/manager/update/{id}', [ManagerController::class, 'ManagerUpdate'])->name('manager.update');
Route::get('/manager/sure/{id}', [ManagerController::class, 'ManagerSure'])->name('manager.sure');

Route::get('manager/command', [ManagerController::class, 'ManagerCommandView']);
Route::get('manager/command/edit/{id}', [ManagerController::class, 'ManagerCommandEdit'])->name('manager.command.edit');
Route::post('/manager/command/update/{id}', [ManagerController::class, 'ManagerCommandUpdate'])->name('manager.command.update');
Route::get('/manager/command/sure/{id}', [ManagerController::class, 'ManagerCommandSure'])->name('manager.command.sure');
Route::get('/manager/eye/{id}', [ManagerController::class, 'ManagerEye'])->name('manager.eye');
Route::post('/eye/update', [ManagerController::class, 'EyeUpdate'])->name('eye.update');
// End manager Route

// All Manager Material Route
Route::get('manager/material', [ManagerController::class, 'ManagerMaterialView']);
Route::get('/material/edit/{id}', [ManagerController::class, 'MaterialEdit'])->name('material.edit');
Route::post('/material/update/{id}', [ManagerController::class, 'MaterialUpdate'])->name('material.update');
Route::get('/material/sure/{id}', [ManagerController::class, 'MaterialSure'])->name('material.sure');
Route::get('/material/reject/{id}', [ManagerController::class, 'MaterialReject'])->name('material.reject');
// End manager Material Route

// All Manager Purchase Route
Route::get('manager/purchase', [ManagerPurchaseController::class, 'ManagerPurchaseView']);
Route::get('/manger/purchase/edit/{id}', [ManagerPurchaseController::class, 'ManagerPurchaseEdit'])->name('manager.purchase.edit');
Route::post('/manger/purchase/update/{id}', [ManagerPurchaseController::class, 'ManagerPurchaseUpdate'])->name('manager.purchase.update');
Route::get('/purchase/sure/{id}', [ManagerPurchaseController::class, 'PurchaseSure'])->name('purchase.sure');
Route::get('/purchase/reject/{id}', [ManagerPurchaseController::class, 'PurchaseReject'])->name('purchase.reject');
// End All Manager Purchase Route

// All Manager Payment Route
Route::get('manager/payment', [ManagerPurchaseController::class, 'ManagerPaymentView']);
Route::get('/manger/payment/edit/{id}', [ManagerPurchaseController::class, 'ManagerPaymentEdit'])
    ->name('manager.payment.edit');
Route::post('/manger/payment/update/{id}', [ManagerPurchaseController::class, 'ManagerPaymentUpdate'])
    ->name('manager.payment.update');
Route::get('/manager/payment/reject/{id}', [ManagerPurchaseController::class, 'ManagerPaymentReject'])->name('manager.payment.reject');
Route::get('/manager/payment/sure/{id}', [ManagerPurchaseController::class, 'ManagerPaymentSure'])->name('manager.payment.sure');

// End All Manager Payment Route

// All Company Route
Route::get('company', [CompanyController::class, 'CompanyView']);
Route::post('/company/add',[CompanyController::class, 'CompanyStore'])->name('company.add');
Route::get('/company/edit/{id}',[CompanyController::class, 'CompanyEdit'])->name('company.edit');
Route::post('/company/update/{id}',[CompanyController::class, 'CompanyUpdate'])->name('company.update');
Route::get('/company/delete/{id}',[CompanyController::class, 'CompanyDelete'])->name('company.delete');
// End Company Route

// All Sub Company Route
Route::get('subCompany', [SubCompanyController::class, 'SubCompanyView']);
Route::post('/subcompany/add',[SubCompanyController::class, 'SubCompanyStore'])->name('subcompany.add');
Route::get('/subcompany/edit/{id}',[SubCompanyController::class, 'SubCompanyEdit'])->name('subcompany.edit');
Route::post('/subcompany/update/{id}',[SubCompanyController::class, 'SubCompanyUpdate'])->name('subcompany.update');
Route::get('/subcompany/delete/{id}',[SubCompanyController::class, 'SubCompanyDelete'])->name('subcompany.delete');
// End All Sub Company Route

// All Sub Sub Company Route
Route::get('subSubCompany', [SubSubCompanyController::class, 'SubSubCompanyView']);
Route::post('/subsubcompany/add',[SubSubCompanyController::class, 'SubSubCompanyStore'])->name('subsubcompany.add');
Route::get('/subsubcompany/edit/{id}',[SubSubCompanyController::class, 'SubSubCompanyEdit'])->name('subsubcompany.edit');
Route::post('/subsubcompany/update/{id}',[SubSubCompanyController::class, 'SubSubCompanyUpdate'])->name('subsubcompany.update');
Route::get('/subsubcompany/delete/{id}',[SubSubCompanyController::class, 'SubSubCompanyDelete'])->name('subsubcompany.delete');

Route::get('/company/subcompany/ajax/{company_id}',[SubSubCompanyController::class, 'GetSubCompany']);
Route::get('/company/sub-subcompany/ajax/{subcompany_id}',[SubSubCompanyController::class, 'GetSubSubCompany']);
// End All Sub Sub Company Route

Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
