@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />

@endpush

@section('content')
<div class="center">
    <form method="POST" action="{{ route('sell.store') }}" class="form-structor order" style="height: 119vh">
        <div class="form-title">
            <p><span class="inline-icon material-icons">note_add</span><br> Pedido</p>
        </div>
                
        <div class="form-content">
            @csrf
            <div>
                <label for="client_id">Cliente</label>
                <br>
                <input id="client_id" type="text" name="client_id" value="{{ $clients->find($order->client_id)->name }} {{ $clients->find($order->client_id)->surname }}" disabled style="background-color: #ffff">
            </div>
            <div>
                <label for="name">Nombre del Pedido</label>
                <br>
                <input id="name" type="text" name="name" value="{{ $order->name }}" disabled style="background-color: #ffff">
            </div>
            <div>
                <label for="stock">Cantidad pedida</label>
                <br>
                <input id="stock" type="number" name="stock" value="{{ $order->stock }}" disabled style="background-color: #ffff">
            </div>
            <div>
                <label for="initial">Pago Inicial</label>
                <br>
                <input id="initial" type="number" name="initial" value="{{ $order->initial }}" disabled style="background-color: #ffff">
            </div>
            <div>
                <label for="size">Size del Pedido</label>
                <br>
                <input id="size" type="number" name="size" value="{{ $order->size }}" disabled style="background-color: #ffff">
            </div>
            <div>
                <label for="color">Color</label>
                <br>
                <input id="color" type="text" name="color" value="{{ $order->color }}" disabled style="background-color: #ffff">
            </div>
            <div>
                <label for="type">Tipo</label>
                <br>
                <input id="type" type="text" name="type" value="{{ $order->type }}" disabled style="background-color: #ffff">
            </div>
            <div>
                <label for="details">Detalles</label>
                <br>
                <input id="details" type="text" name="details" value="{{ $order->details }}" disabled style="background-color: #ffff">
            </div>
            <div>
                <label for="deliveryDate">Fecha de Entrega</label>
                <br>
                <input id="deliveryDate" type="date" name="deliveryDate" value="{{ $order->deliveryDate }}" disabled style="background-color: #ffff">
            </div>
        </div>

    </form>
</div>
    @endsection