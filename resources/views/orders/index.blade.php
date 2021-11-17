@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="mb-3">
            <button type="button" class="btn btn-outline-success"><a href="{{route('orders.create')}}" class="link-dark text-decoration-none">Crea nuovo ordine</a></button>
            <a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary">Torna alla dashboard</a>
        </div>
        <ul class="list-group list-unstyled">
            @foreach ($orders as $order)
                <div class="border p-5">
                    <li class="mb-2"><strong>ID: </strong>{{$order->id}}</li>
                    <li class="mb-2"><strong>Nome: </strong>{{$order->user_name}}</li>
                    <li class="mb-2"><strong>Cognome: </strong>{{$order->user_surname}}</li>
                    <li class="mb-2"><strong>Indirizzo: </strong>{{$order->address}}</li>
                    <li class="mb-2"><strong>Totale: </strong>{{$order->total}}</li>
                    <li class="mb-2"><strong>Creato il: </strong>{{$order->created_at}}</li>
                    <div class="d-flex py-3">
                        {{-- tasto show dettaglio --}}
                        <li><a href="{{route('orders.show', $order->id)}}" class="btn btn-outline-primary">Dettaglio</a></li>
                        {{-- tasto edit --}}
                        <li class="mb-2 mx-2"><a href="{{route('orders.edit', $order->id)}}" class="btn btn-outline-warning">Modifica</a></li>
                        {{-- tasto delete --}}
                        <form action="{{ route('orders.destroy', $order->id)}}"
                        method="post">
                            @csrf
                            @method('DELETE')
                            {{-- <input type="submit" value="elimina"> --}}
                            <button type="submit" class="btn btn-outline-danger">Elimina</button>
                        </form>
                    </div>
                </div>
                <br>
            @endforeach
        </ul>
    </div>
@endsection