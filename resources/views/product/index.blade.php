@extends('layouts.layout')

@push('styles')

    <link rel="stylesheet" href="{{ URL::asset('css/users.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />

@endpush

@section('content')

<div class="table-container">
    <form class="example" action="{{ route('product.search') }}" method="post">
        @csrf
        @method('get')
        <input type="text" placeholder="Buscar producto (por nombre, stock, size, color o material)..." name="search">
        <button type="submit"><span class="inline-icon material-icons">search</span></button>
    </form>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Size</th>
                <th>Color</th>
                <th>Material</th>
                <th>Precio</th>
                @if (Auth::user()->role == 1)
                    <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td><strong>{{ $product->id }}</strong></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->material }}</td>
                    <td>{{ $product->price }}</td>
                    @if (Auth::user()->role == 1)
                        <td>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete">
                                    <span class="material-icons">
                                        delete
                                    </span>
                                </button> 
                            </form>

                            <a class="btn btn-edit" href="{{ route('product.edit', $product->id) }}">
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

{{ $products->links() }}

@endsection