@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />

@endpush

@section('content')
<div class="center">
    <form method="POST" action="{{ route('sell.store') }}" class="form-structor order">
        <div class="form-title">
            <p><span class="inline-icon material-icons">note_add</span><br> Pedidos</p>
        </div>
                
        <div class="form-content">
            @csrf
            <input type="hidden" name="invoiceType" value="1">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">   
            <div>
                <label for="name">Nombre del Pedido</label>
                <br>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                <br>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="client_id">Cliente</label>
                <br>
                <select name="client_id" id="client_id">
                    <option value="0">Selecciona:</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}, {{ $client->surname }}</option>
                    @endforeach
                </select>
                <br>
                @error('client_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="stock">Cantidad pedida</label>
                <br>
                <input id="stock" type="number" name="stock" required>
                <br>
                @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="initial">Pago Inicial</label>
                <br>
                <input id="initial" type="number" name="initial" required>
                <br>
                @error('initial')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="amount">Total a Pagar</label>
                <br>
                <input id="amount" type="number" name="amount" required>
                <br>
                @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="size">Size del Pedido</label>
                <br>
                <input id="size" type="number" name="size" required>
                <br>
                @error('size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="color">Color</label>
                <br>
                <input id="color" type="text" name="color" required>
                <br>
                @error('color')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="type">Tipo</label>
                <br>
                <input id="type" type="text" name="type" required>
                <br>
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="details">Detalles</label>
                <br>
                <input id="details" type="text" name="details" required>
                <br>
                @error('details')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="deliveryDate">Fecha de Entrega</label>
                <br>
                <input id="deliveryDate" type="date" name="deliveryDate" required>
                <br>
                @error('deliveryDate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    {{ __('Crear pedido') }}
                </button>

                <a class="btn btn-index" href="{{ route('user.index') }}">
                    {{ __('Revisar pedidos') }}
                </a>
            </div>
        </div>

    </form>

    <form method="POST" action="{{ route('sell.store') }}" class="form-structor existent-product">
        <div class="form-title">
            <p><span class="inline-icon material-icons">shopping_basket</span><br> Producto Existente</p>
        </div>
                
        <div class="form-content">
            @csrf
            <input type="hidden" name="invoiceType" value="2">  

            <div>
                <label for="product_id">Producto</label>
                <br>
                <select name="product_id" id="product_id">
                    <option value="0">Selecciona:</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <br>
                @error('product_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="amount">Total a Pagar</label>
                <br>
                <input id="amount" type="number" name="amount" required>
                <br>
                @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    {{ __('Crear empleado') }}
                </button>

                <a class="btn btn-index" href="{{ route('employee.index') }}">
                    {{ __('Revisar empleados') }}
                </a>
            </div>
        </div>

    </form>
</div>
@endsection