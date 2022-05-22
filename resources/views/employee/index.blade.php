@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />

@endpush

@section('content')

<div class="table-container">
    <form class="example" action="{{ route('employee.search') }}" method="post">
        @csrf
        @method('get')
        <input type="text" placeholder="Buscar empleado (por nombre, apellido, cédula o dirección)..." name="search">
        <button type="submit"><span class="inline-icon material-icons">search</span></button>
    </form>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Email</th>
                <th>Direccion</th>
                <th>Cargo</th>
                <th>Sucursal</th>
                @if (Auth::user()->role == 1)
                    <th>Acciones</th>
                @endif 
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td><strong>{{ $employee->id }}</strong></td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->surname }}</td>
                    <td>{{ $employee->identification }}</td>
                    <td>
                    @if (empty($employee->user_id))
                        No tiene acceso al sistema.
                    @else
                        {{ 
                            $users->find($employee->user_id)->email 
                        }}
                    @endif
                    </td>
                    <td>{{ $employee->direction }}</td>
                    <td>
                        {{ 
                            $jobs->find($employee->job_id)->name
                        }}
                    </td>
                    <td>
                        {{ 
                            $shops->find($employee->shop_id)->direction
                        }}
                    </td>
                    @if (Auth::user()->role == 1)
                    <td>
                        <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">
                                <span class="material-icons">
                                    delete
                                </span>
                            </button> 
                        </form>

                        <a class="btn btn-edit" href="{{ route('employee.edit', $employee->id) }}">
                            <span class="material-icons">
                                    edit
                            </span>
                        </a>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $employees->links() }}

@endsection