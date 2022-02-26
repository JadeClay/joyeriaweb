@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />

@endpush

@section('content')
<div class="center">
<form method="POST" action="{{ route('product.update', $product->id) }}" class="form-structor" style="height: 50vh">
    @method('PATCH')
        <div class="form-title">
            <p><span class="inline-icon material-icons">percent</span><br> {{ $product->name }}</p>
        </div>
                
        <div class="form-content">
            @csrf
            <br>
            <div>
                <label for="stock">{{ __('Stock') }}</label>
                <br>
                <input id="stock" type="text" name="stock" required autocomplete="stock" autofocus>
                <br>
            </div>
            <br>
            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    {{ __('Modificar producto') }}
                </button>

                <a class="btn btn-index" href="{{ route('product.index') }}">
                    {{ __('Revisar productos') }}
                </a>
            </div>
        </div>

    </form>

</div>
@endsection