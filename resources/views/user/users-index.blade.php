@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />

@endpush

@section('content')

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td><strong>{{ $user->id }}</strong></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->role === 1)
                        Administrador
                    @else
                        Usuario
                    @endif
                </td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete">
                            <span class="material-icons">
                                delete
                            </span>
                        </button> 
                    </form>

                    <a class="btn btn-edit" href="{{ route('user.edit', $user->id) }}">
                        <span class="material-icons">
                                edit
                        </span>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}

@endsection