@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />

@endpush

@section('content')
<div class="center">
    <form method="POST" action="{{ route('login') }}" class="form-structor login">
        <div class="form-title">
            <p><span class="inline-icon material-icons">logout</span><br> Iniciar Sesión</p>
        </div>
                
        <div class="form-content">
            @csrf 
            <div>
                <label for="email">Correo Electrónico</label>
                <br>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <br>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="password">Contraseña</label>
                <br>
                <input id="password" type="password" name="password" value="{{ old('password') }}" required autocomplete="current-password">
                <br>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    {{ __('Iniciar sesión') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
