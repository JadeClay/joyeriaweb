@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />

@endpush

@section('content')
<div class="center">
<form method="POST" action="{{ route('client.store') }}" class="form-structor client">
        <div class="form-title">
            <p><span class="inline-icon material-icons">people</span><br> Clientes</p>
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
                <label for="surname">{{ __('Apellidos') }}</label>
                <br>
                <input id="surname" type="text" name="surname" required autocomplete="surname" autofocus>
                <br>
                @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="identification">{{ __('Cedula') }}</label>
                <br>
                <input id="identification" type="text" name="identification"  required autocomplete="identification">
                <br>
                @error('identification')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="direction">{{ __('Direccion') }}</label>
                <br>
                <input id="direction" type="text" name="direction" required autocomplete="direction">
                <br>
                @error('direction')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="telephone">{{ __('Teléfono') }}</label>
                <br>
                <input id="telephone" type="number" name="telephone" required autocomplete="telephone">
                <br>
                @error('telephone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    {{ __('Crear cliente') }}
                </button>

                <a class="btn btn-index" href="{{ route('client.index') }}">
                    {{ __('Revisar clientes') }}
                </a>
            </div>
        </div>

    </form>

</div>
@endsection