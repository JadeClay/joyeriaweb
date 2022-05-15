<?php

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;

use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Shop;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/client/search', function (Request $request) {
    $results = Client::search($request->search)->simplePaginate(5);
    return view('client.index',["clients"=>$results]);
})->name('client.search');

Route::get('/employee/search', function (Request $request) {
    $results = Employee::search($request->search)->simplePaginate(5);
    return view('employee.index',["employees"=>$results,"jobs" => Job::all(),"shops" => Shop::all(),"users"=> User::all()]);
})->name('employee.search');

Route::get('/product/search', function (Request $request) {
    $results = Product::search($request->search)->simplePaginate(5);
    return view('product.index',["products"=>$results]);
})->name('product.search');

Route::get('/invoice/search', function (Request $request) {
    $results = Invoice::search($request->search)->simplePaginate(5);
    return view('sell.index',["invoices"=>$results, "clients"=>Client::all(), "products"=>Product::all(), "orders"=>Order::all(), "users" =>User::all()]);
})->name('invoice.search');

Route::resource('user', UserController::class);

Route::resource('employee', EmployeeController::class);

Route::resource('sell', SellController::class);

Route::resource('client', ClientController::class);

Route::resource('product', ProductController::class);

Auth::routes();
