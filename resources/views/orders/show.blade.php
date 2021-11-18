@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="mb-3">
            <div class="d-flex justify-content-between m-3">
                <div><a href="{{ route('orders.index') }}" class="btn btn-primary p-2  my-1">Indietro</a>
                </div>
                <h1>Dettagli dell'ordine</h1>
                <div><a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary">Torna alla dashboard</a></div>
            </div>
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
                </div>
            </div>
        </ul>
    </div>
@endsection
