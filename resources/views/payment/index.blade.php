@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />

@endpush

@section('content')

<div class="table-container">
    <form class="example" action="{{ route('payment.search') }}" method="post">
        @csrf
        @method('get')
        <input type="text" placeholder="Buscar pago (por la fecha, id)..." name="search">
        <button type="submit"><span class="inline-icon material-icons">search</span></button>
    </form>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Comprobante</th>
                <th>Monto</th>
                <th>Pedido</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td><strong>{{ $payment->id }}</strong></td>
                    <td><a href="{{ route('payment.invoice', $payment->id) }}">Imprimir</a></td>
                    <td>RD${{ $payment->amount }}</td>
                    <td>{{ $orders->find($payment->order_id)->name }}</td>
                    <td>{{ $payment->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $payments->links() }}

@endsection