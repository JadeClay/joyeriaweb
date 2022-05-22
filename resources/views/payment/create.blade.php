@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />

@endpush

@section('content')
<div class="center">
    <form method="POST" action="{{ route('payment.do') }}" class="form-structor payment" style="height: 52vh;">
        <div class="form-title">
            <p><span class="inline-icon material-icons">payments</span><br> Pagos</p>
        </div>
                
        <div class="form-content">
            @csrf  
            <div>
                <label for="id">Seleccionar pedido</label>
                <br>
                <select name="id" id="id">
                    <option value="0">Selecciona:</option>
                    @foreach ($orders as $order)
                        @if ($order->is_paid == 0)
                            <option value="{{ $order->id }}">{{ $order->name }} {{ $clients->find($order->client_id)->name }} {{ $clients->find($order->client_id)->surname }}</option>
                        @endif
                    @endforeach
                </select>
                <br>
                @error('id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="paid">Monto a pagar</label>
                <br>
                <input id="paid" type="number" name="paid" required placeholder="Inserte monto abonado">
                <br>
                @error('paid')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    {{ __('Facturar pedido') }}
                </button>
            </div>
        </div>

    </form>

</div>
@endsection