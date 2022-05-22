<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Employee;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = Invoice::simplePaginate(5); // Retrieve all users, using pagination method.
        return view('sell.index',["invoices"=>$invoice, "clients"=>Client::all(), "products"=>Product::all(), "orders"=>Order::all(), "users" =>User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sell.create',["clients" => Client::all(), "products" => Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->invoiceType == 1) { // If the invoice is for an order
            $order = Order::create($request->except('_token','amount','user_id','invoiceType'));

            $amount = $request->amount;
            $itbis = round(($amount*18)/100, 0, PHP_ROUND_HALF_UP);
            $subtotal = $amount + $itbis;
            $date = date("Y-m-d");

            $invoice = new Invoice;
            $invoice->amount = $amount;
            $invoice->itbis = $itbis;
            $invoice->subtotal = $subtotal;
            $invoice->date = $date;
            $invoice->client_id = $request->client_id;
            $invoice->product_id = $order->id;
            $invoice->user_id = $request->user_id;
            $invoice->hasOrder = 1;
            $invoice->save();

            return redirect(route('sell.index'))->with('success', "La venta se ha generado con exito.");
        } else {
            $product = Product::find($request->product_id);
            $actualStock = $product->stock;
            $product->stock = $actualStock - $request->stock;
            $product->save();
            
            $amount = $request->amount;
            $itbis = round(($amount*18)/100, 0, PHP_ROUND_HALF_UP);
            $subtotal = $amount + $itbis;
            $date = date("Y-m-d");

            $invoice = new Invoice;
            $invoice->amount = $amount;
            $invoice->itbis = $itbis;
            $invoice->subtotal = $subtotal;
            $invoice->date = $date;
            $invoice->client_id = $request->client_id;
            $invoice->product_id = $product->id;
            $invoice->user_id = $request->user_id;
            $invoice->hasOrder = 0;
            $invoice->save();

            return redirect(route('sell.index'))->with('success', "La venta se ha generado con exito.");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sell.show', ['order' => Order::find($id), 'clients' => Client::all(), 'invoices' => Invoice::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
