@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />

@endpush

@section('content')
<div class="center">
    
        <form method="POST" action="{{ route('user.store') }}" class="form-structor user">
            <div class="form-title">
                <p><span class="inline-icon material-icons">people</span><br> Usuarios</p>
            </div>
                    
            <div class="form-content">
                @csrf
                        
                <div>
                    <label for="email">{{ __('Correo Electrónico') }}</label>
                    <br>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                <div>
                    <input class="form-check-input" type="checkbox" value="1" id="role" name="role" @if (Auth::user()->role == 0)
                        disabled
                    @endif>
                    <label class="form-check-label" for="flexCheckDefault">
                        Admin
                    </label>

                    <input class="form-check-input" type="checkbox" value="0" id="role" name="role">
                    <label class="form-check-label" for="flexCheckDefault">
                        Usuario
                    </label>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">
                        {{ __('Crear usuario') }}
                    </button>

                    <a class="btn btn-index" href="{{ route('user.index') }}">
                        {{ __('Revisar usuarios') }}
                    </a>
                </div>
            </div>

        </form>  

    <form method="POST" action="{{ route('employee.store') }}" class="form-structor employee">
        <div class="form-title">
            <p><span class="inline-icon material-icons">people</span><br> Empleados</p>
        </div>
                
        <div class="form-content">
            @csrf
                    
            <div>
                <label for="name">{{ __('Nombre') }}</label>
                <br>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                <input id="surname" type="text" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
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
                <input id="identification" type="number" name="identification" value="{{ old('identification') }}" required autocomplete="identification">
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
                <input id="direction" type="text" name="direction" value="{{ old('direction') }}" required autocomplete="direction">
                <br>
                @error('direction')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="user_id">{{ __('Usuario') }}</label>
                <br>
                <select name="user_id" id="user_id">
                    <option value="0">Selecciona:</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
                <br>
                @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="job_id">{{ __('Cargo') }}</label>
                <br>
                <select name="job_id" id="job_id">
                    <option value="0">Selecciona:</option>
                    @foreach ($jobs as $job)
                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                    @endforeach
                </select>
                <br>
                @error('job_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="shop_id">{{ __('Sucursal') }}</label>
                <br>
                <select name="shop_id" id="shop_id">
                    <option value="0">Selecciona:</option>
                    @foreach ($shops as $shop)
                        <option value="{{ $shop->id }}">{{ $shop->direction }}</option>
                    @endforeach
                </select>
                <br>
                @error('shop_id')
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