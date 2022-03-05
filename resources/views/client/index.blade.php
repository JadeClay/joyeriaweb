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
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td><strong>{{ $client->id }}</strong></td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->surname }}</td>
                    <td>{{ $client->identification }}</td>
                    <td>{{ $client->direction }}</td>
                    <td>
                        <form action="{{ route('client.destroy', $client->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">
                                <span class="material-icons">
                                    delete
                                </span>
                            </button> 
                        </form>

                        <a class="btn btn-edit" href="{{ route('client.edit', $client->id) }}">
                            <span class="material-icons">
                                    edit
                            </span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $clients->links() }}

@endsection