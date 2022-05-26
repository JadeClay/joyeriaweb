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
                <label for="client_id">Cliente</label>
                <br>
                <select name="client_id" id="client_id">
                    <option value="0">Selecciona:</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }} {{ $client->surname }}</option>
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
                <label for="name">Nombre del Pedido</label>
                <br>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required placeholder="Inserte nombre del o los productos pedidos...">
                <br>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="stock">Cantidad pedida</label>
                <br>
                <input id="stock" type="number" name="stock" required placeholder="Inserte cantidad de los productos a encargar...">
                <br>
                @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="paid">Pago Inicial</label>
                <br>
                <input id="paid" type="number" name="paid" required placeholder="Inserte monto pagado como inicial...">
                <br>
                @error('paid')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="amount">Total a Pagar</label>
                <br>
                <input id="amount" type="number" name="amount" required placeholder="Inserte monto total acordado a pagar...">
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
                <input id="size" type="text" name="size" required placeholder="Inserte size de los productos pedidos...">
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
                <input id="color" type="text" name="color" required placeholder="Inserte color o colores del pedido...">
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
                <input id="type" type="text" name="type" required placeholder="Ej: Boda, Universitario, Compromiso, etc...">
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
                <input id="details" type="text" name="details" required placeholder="Inserte detalles a tomar en cuenta con el pedido...">
                <br>
                @error('details')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="deliveryDate">Fecha de Entrega Estimada</label>
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
                    {{ __('Facturar pedido') }}
                </button>

                <a class="btn btn-index" href="{{ route('sell.index') }}">
                    {{ __('Revisar facturas') }}
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
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">   

            <div>
                <label for="product_id">Producto</label>
                <br>
                <select name="product_id" id="product_id">
                    <option value="0">Selecciona:</option>
                    @foreach ($products as $product)
                        @if ($product->stock > 0)
                            <option value="{{ $product->id }}">{{ $product->name }}, S:{{ $product->size }}, {{ $product->color }}</option>
                        @endif
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
                <label for="client_id">Cliente</label>
                <br>
                <select name="client_id" id="client_id">
                    <option value="0">Selecciona:</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }} {{ $client->surname }}</option>
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
                <label for="stock">Cantidad</label>
                <br>
                <input id="stock" type="number" name="stock" required>
                <br>
                @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    {{ __('Facturar productos') }}
                </button>

                <a class="btn btn-index" href="{{ route('sell.index') }}">
                    {{ __('Revisar facturas') }}
                </a>
            </div>
        </div>

    </form>
</div>
@endsection