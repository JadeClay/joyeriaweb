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
                <th>Nombre</th>
                <th>Stock</th>
                <th>Size</th>
                <th>Color</th>
                <th>Material</th>
                <th>Acciones</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $products->links() }}

@endsection