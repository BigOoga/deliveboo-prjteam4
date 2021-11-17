@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="mb-3">
            <a href="{{ route('orders.index') }}" class="btn btn-outline-primary">Torna all'indice</a>
            <a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary">Torna alla dashboard</a>
        </div>
        <ul class="list-group list-unstyled">
            <div class="border p-5">
                <li class="mb-2"><strong>ID: </strong>{{ $order->id }}</li>
                <li class="mb-2"><strong>Nome: </strong>{{ $order->user_name }}</li>
                <li class="mb-2"><strong>Cognome: </strong>{{ $order->user_surname }}</li>
                <li class="mb-2"><strong>Indirizzo: </strong>{{ $order->address }}</li>
                <li class="mb-2"><strong>Telefono: </strong>{{ $order->phone }}</li>
                <li class="mb-2"><strong>E-mail: </strong>{{ $order->email }}</li>
                <li class="mb-2"><strong>Totale: </strong>{{ $order->total }}</li>
                <li class="mb-2"><strong>Data: </strong>{{ $order->created_at }}</li>
                <div class="d-flex py-3">
                {{-- tasto edit --}}
                <li class="me-2"><a href="{{ route('orders.edit', $order->id) }}"
                        class="btn btn-outline-warning">Modifica</a></li>
                {{-- tasto delete --}}
                <form action="{{ route('orders.destroy', $order) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Elimina</button>
                </form>
            </div>
            </div>
        </ul>
    </div>
@endsection