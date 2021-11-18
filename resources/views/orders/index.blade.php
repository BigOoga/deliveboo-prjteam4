@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-between m-3">
            <div><a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary p-2  my-1">Torna alla dashboard</a>
            </div>
            <h1>I miei ordini</h1>
            <div><a href="{{ route('orders.statistic') }}" class="btn btn-primary p-2  my-1">Vedi statistiche</a></div>
        </div>
        <ul class="list-group list-unstyled">
            @foreach ($orders as $order)
                <div class="border p-5">
                    <li class="mb-2"><strong>ID Ordine: </strong>{{ $order->id }}</li>
                    <li class="mb-2"><strong>Nome: </strong>{{ $order->user_name }}</li>
                    <li class="mb-2"><strong>Cognome: </strong>{{ $order->user_surname }}</li>
                    <li class="mb-2"><strong>Indirizzo: </strong>{{ $order->address }}</li>
                    <li class="mb-2"><strong>Telefono: </strong>{{ $order->phone }}</li>
                    <li class="mb-2"><strong>Totale: </strong>€{{ $order->total }}</li>
                    <li class="mb-2"><strong>Data: </strong>{{ $order->created_at }}</li>
                    <div class="d-flex py-3">
                        {{-- tasto show dettaglio --}}
                        <li><a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">Dettaglio</a>
                        </li>
                    </div>
                </div>
                <br>
            @endforeach
        </ul>
    </div>
@endsection
