<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use App\Models\Order;
use App\Models\Invoice;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $invoice->save();

            return redirect(route('employee.index'));
        } else {
            # code...
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
        //
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
