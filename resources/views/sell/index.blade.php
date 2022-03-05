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
                <th>Monto</th>
                <th>ITBIS (18%)</th>
                <th>Subtotal</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Producto/Pedido</th>
                <th>Empleado</th>
                @if (Auth::user()->role == 1)
                    <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td><strong>{{ $invoice->id }}</strong></td>
                    <td>RD${{ $invoice->amount }}</td>
                    <td>RD${{ $invoice->itbis }}</td>
                    <td>RD${{ $invoice->subtotal }}</td>
                    <td>{{ $invoice->date }}</td>
                    <td>
                        <?php 
                            $id = $invoice->client_id;
                            $name = $clients->find($id)->name . ", " . $clients->find($id)->surname;
                            echo $name;
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($invoice->hasOrder){
                                $id = $invoice->product_id;
                                $name = $orders->find($id)->name;
                                $link = "<a href=" . route('sell.show', $invoice->id) . ">[PEDIDO] </a>";
                                echo $link . $name;
                            } else {
                                $id = $invoice->product_id;
                                $name = $products->find($id)->name;
                                echo $name;
                            }
                        ?>
                    </td>
                    <td>
                        {{ $users->find($invoice->user_id)->email }}
                    </td>
                    @if (Auth::user()->role == 1)
                        <td>
                            <form action="{{ route('sell.destroy', $invoice->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete">
                                    <span class="material-icons">
                                        delete
                                    </span>
                                </button> 
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $invoices->links() }}

@endsection