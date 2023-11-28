<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\Superadmin\SuperadminIndexController;
use App\Http\Controllers\Superadmin\SuperCashController;
use App\Http\Controllers\Superadmin\SuperSellController;
use App\Http\Controllers\Superadmin\SuperWarehouseController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Manager\ManagerIndexController;
use App\Http\Controllers\Accountant\AccountantIndexController;
use App\Http\Controllers\Debtdepartment\DebtdepartmentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\PercentageController;
use App\Http\Controllers\productImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\WorkerHistoryController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\AclatsController;
use App\Http\Controllers\ExchangerateController;
use App\Http\Controllers\WorkerSalaryController;


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


//Login-Logout routes
Route::group(['middleware' => 'guest'], function() {
    Route::view('/', 'auth.login')->name('login');
    Route::post('/login/post', [AuthController::class, 'login'])->name('sign.in');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//--------------------------------------------------------------------------------------//



//All routes for superadmin
Route::group(['prefix' => 'superadmin', 'middleware' => 'superadmin'], function(){
    Route::get('/index', [SuperadminIndexController::class, 'index'])->name('superadmin.index');
    Route::resource('users', UserController::class);
    Route::resource('supercash', SuperCashController::class);
    Route::get('supercash/{supercash}/user/{user_id}', [SuperCashController::class, 'show'])->name('supercash.show');
    Route::get('supercash/cash/{store_id}', [SuperCashController::class, 'cash'])->name('supercash.cash');
    Route::post('supercash/cash/payment', [SuperCashController::class, 'PaymentStore'])->name('PaymentStore');
    Route::resource('supersell', SuperSellController::class);
    Route::resource('superwarehouse', SuperWarehouseController::class);
    Route::resource('deposits', DepositController::class);
    Route::resource('exchangerate', ExchangerateController::class);
    Route::resource('percentages', PercentageController::class);
    Route::resource('history', HistoryController::class);
    Route::resource('platforms', PlatformController::class);
    Route::resource('aclats', AclatsController::class);
    Route::get('reports/cash', [ReportsController::class, 'cash'])->name('reports.cash');
    Route::get('reports/crstatus', [ReportsController::class, 'crStatus'])->name('reports.crStatus');
    Route::get('reports/allcredit', [ReportsController::class, 'allcredit'])->name('reports.allcredit');

});

//All routes for admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/index', [AdminIndexController::class, 'index'])->name('admin.index');
    Route::resource('customer', CustomerController::class);
    Route::resource('workers', WorkerController::class);
    Route::resource('application', ApplicationController::class);
    Route::get('/application/getdocs/{id}', [AdminIndexController::class, 'application_docs'])->name('application.docs');
    Route::post('/application/applicationend', [AdminIndexController::class, 'applicationend'])->name('applicationend');
    Route::post('optionalsumma', [AdminIndexController::class,'optionalsumma'])->name('optionalsumma');
    Route::post('endapplication', [AdminIndexController::class,'endapplication'])->name('endapplication');
    Route::get('noactiveapplication', [AdminIndexController::class,'noactiveapplication'])->name('noactiveapplication');
    Route::get('noactiveapplicationshow/{id}', [AdminIndexController::class,'noactiveapplicationshow'])->name('noactiveapplicationshow');
});

//All routes for manager
Route::group(['prefix' => 'manager', 'middleware' => 'manager'], function(){
    Route::get('/index', [ManagerIndexController::class, 'index'])->name('manager.index');
});

//All routes for accountant
Route::group(['prefix' => 'accountant', 'middleware' => 'accountant'], function(){
    Route::get('/index', [AccountantIndexController::class, 'index'])->name('accountant.index');
    Route::get('/debts', [AccountantIndexController::class, 'debts'])->name('accountant.debts');
    Route::get('/reports', [AccountantIndexController::class, 'reports'])->name('accountant.reports');
    Route::get('/checkapplication', [AccountantIndexController::class, 'checkapplication'])->name('accountant.checkapplication');
    Route::post('/checkapplication/confirm', [AccountantIndexController::class, 'checkapplicationConfirm'])->name('accountant.checkapplicationConfirm');
    Route::post('/checkapplication/NoConfirm', [AccountantIndexController::class, 'checkapplicationNoConfirm'])->name('accountant.checkapplicationNoConfirm');
    Route::get('/checkapplication/show/{application}', [AccountantIndexController::class, 'checkapplicationid'])->name('accountant.checkapplicationid');

});


Route::group(['prefix' => 'debtdepartment', 'middleware' => 'debtdepartment'], function(){
    Route::get('/index', [DebtdepartmentController::class, 'index'])->name('debtdepartment.index');
});

Route::resource('activeapplication', DebtController::class);
Route::resource('cashes', CashController::class);

Route::resource('stores', StoreController::class);
Route::resource('sell',SellController::class);
Route::get('infosell/{id}', [SellController::class, 'info'])->name('infosell');
Route::resource('payment', PaymentController::class);
Route::get('info/{id}', [PaymentController::class, 'info'])->name('info.store');
Route::resource('warehouse', WarehouseController::class);
Route::resource('products', ProductController::class);
Route::resource('calculator', CalculatorController::class);
Route::get('productImage/{id}', [productImageController::class, 'index'])->name('productImage');

Route::post('message/{worker_id}', [MessageController::class, 'sendWorkerSalaryInfo'])->name('message.workersalary');


Route::post('message/{worker_id}', [MessageController::class, 'sendWorkerSalaryInfo'])->name('message.workersalary');
Route::post('send/customer/otp', [CustomerController::class, 'sendOtp'])->name('send.otp');
Route::post('check/customer/otp', [CustomerController::class, 'checkOtp'])->name('check.otp');
Route::get('reset/customer/otp', [CustomerController::class, 'resetOtp'])->name('reset.otp');
Route::get('delete/customer/otp', [CustomerController::class, 'deleteOtp'])->name('deleteOtp.otp');

// worker
Route::post('workerbonus', [WorkerHistoryController::class, 'bonus'])->name('workerbonus');
Route::post('workerfine', [WorkerHistoryController::class, 'fine'])->name('workerfine');
Route::post('worker/salary', [WorkerSalaryController::class, 'store'])->name('WorkerSalary');
