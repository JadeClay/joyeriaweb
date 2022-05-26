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
use App\Models\Payment;

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

Route::get('/payment/search', function () {
    return view('payment.index',["orders"=>Order::all(),"payments"=>Payment::all()]);
})->name('payment.search');

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

Route::get('/invoice/show/{id}', function ($id) {
    return view('sell.invoice',["invoice"=>Invoice::find($id),"products"=>Product::all(),"orders"=>Order::all(),"clients"=>Client::all()]);
})->name('invoice.show');

Route::get('/payment/create', function (){
    return view('payment.create',["orders"=>Order::all(), "clients"=>Client::all()]);
})->name('payment.create');

Route::get('/payment/index', function () {
    $payment = Payment::simplePaginate(5);
    return view('payment.index',["orders"=>Order::all(),"payments"=>$payment]);
})->name('payment.index');

Route::get('/payment/invoice/{id}', function ($id){
    return view('payment.invoice',["orders"=>Order::all(), "clients"=>Client::all(), "invoices"=>Invoice::all(), "payment"=>Payment::find($id)]);
})->name('payment.invoice');

Route::post('/payment/do', function (Request $request){
    $order = Order::find($request->order_id);
    $invoice = Invoice::where('product_id', '=', $order->id)->first();

    $date = date("Y-m-d");

    $order->paid += $request->amount;
    if($invoice->subtotal <= $order->paid){
        $order->is_paid = 1;
    }

    $order->save();

    $payment = new Payment;
    $payment->amount = $request->amount;
    $payment->order_id = $request->order_id;
    $payment->date = $date;
    $payment->save();

    return redirect(route('payment.invoice', $payment->id))->with('success', "El pago se ha generado con éxito.");
})->name('payment.do');

Route::resource('user', UserController::class);

Route::resource('employee', EmployeeController::class);

Route::resource('sell', SellController::class);

Route::resource('client', ClientController::class);

Route::resource('product', ProductController::class);

Auth::routes();
