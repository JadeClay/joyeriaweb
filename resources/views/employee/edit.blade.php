@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />

@endpush

@section('content')
<div class="center">
<form method="POST" action="{{ route('employee.update', $employee->id) }}" class="form-structor employee">
        @method('PATCH')
        <div class="form-title">
            <p><span class="inline-icon material-icons">people</span><br> Empleados</p>
        </div>
                
        <div class="form-content">
            @csrf

            <input id="user_id" type="hidden" value="{{ $employee->user_id }}">        
            <div>
                <label for="name">{{ __('Nombre') }}</label>
                <br>
                <input id="name" type="text" name="name" value="{{ $employee->name }}" required autocomplete="name" autofocus>
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
                <input id="surname" type="text" name="surname" value="{{ $employee->surname }}" required autocomplete="surname" autofocus>
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
                <input id="identification" type="identification" name="identification" value="{{ $employee->identification }}" required autocomplete="identification">
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
                <input id="direction" type="text" name="direction" required autocomplete="direction" value="{{ $employee->direction }}">
                <br>
                @error('direction')
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
                        <option value="{{ $job->id }}" @if ($job->id == $employee->job_id) selected @endif>{{ $job->name }}</option>
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
                        <option value="{{ $shop->id }}" @if ($shop->id == $employee->shop_id) selected @endif>{{ $shop->direction }}</option>
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