@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />

@endpush

@section('content')
<div class="table-container">
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Creado</th>
                <th>Modificado</th>
                @if (Auth::user()->role == 1)
                    <th>Acciones</th>
                @endif 
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td><strong>{{ $user->id }}</strong></td>
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
                    @if (Auth::user()->role == 1)
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
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $users->links() }}

@endsection