@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />

@endpush

@section('content')
<div class="center">
<form method="POST" action="{{ route('product.store') }}" class="form-structor product">
        <div class="form-title">
            <p><span class="inline-icon material-icons">percent</span><br> Productos</p>
        </div>
                
        <div class="form-content">
            @csrf
                    
            <div>
                <label for="name">{{ __('Nombre') }}</label>
                <br>
                <input id="name" type="text" name="name" required autocomplete="name" autofocus>
                <br>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="stock">{{ __('Stock Inicial') }}</label>
                <br>
                <input id="stock" type="text" name="stock" required autocomplete="stock" autofocus>
                <br>
                @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="size">{{ __('Size') }}</label>
                <br>
                <input id="size" type="text" name="size"  required autocomplete="size">
                <br>
                @error('size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="color">{{ __('Color') }}</label>
                <br>
                <input id="color" type="text" name="color" required autocomplete="color">
                <br>
                @error('color')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="material">{{ __('Material') }}</label>
                <br>
                <input id="material" type="text" name="material" required autocomplete="material">
                <br>
                @error('material')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    {{ __('Crear producto') }}
                </button>

                <a class="btn btn-index" href="{{ route('product.index') }}">
                    {{ __('Revisar productos') }}
                </a>
            </div>
        </div>

    </form>

</div>
@endsection