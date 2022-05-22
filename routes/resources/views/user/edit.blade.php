@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />

@endpush

@section('content')
<div class="center">
    <form method="POST" action="{{ route('user.update', $user->id) }}" class="form-structor">
        @method('PATCH')
        <div class="form-title">
            <p><span class="inline-icon material-icons">people</span><br> Usuarios</p>
        </div>
                
        <div class="form-content">
            @csrf         
            <div>
                <label for="email">{{ __('Correo Electrónico') }}</label>
                <br>
                <input id="email" type="email" name="email" value="{{ $user->email }}" required autocomplete="email">
                <br>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="password">{{ __('Contraseña') }}</label>
                <br>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                <br>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="password-confirm">{{ __('Confirmar contraseña') }}</label>
                <br>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                <br>
            </div>


            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    {{ __('Modificar usuario') }}
                </button>

                <a class="btn btn-index" href="{{ route('user.index') }}">
                    {{ __('Revisar usuarios') }}
                </a>
            </div>
        </div>

    </form>

</div>
@endsection