@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard</h2>
        {{-- AT A GLANCE --}}
        <section>
            <div class="card">
                <h5 class="card-header d-flex justify-content-between">{{ $restaurant->name }}<a
                        href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-primary">Modifica
                        informazioni</a>
                </h5>
                <div class="card-body">
                    <img class="img-fluid" style="width: 200px; height: auto"
                        src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}">

                    <div class="py-2">
                        <h5>Descrizione:</h5>
                        <p>{{ $restaurant->description }}</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- DISHES --}}
        <section>
            <div class="card">
                <h5 class="card-header">I miei piatti</h5>
                <div class="card-body">
                    <p class="card-text">Visualizza e modifica i tuoi piatti, oppure <a
                            href="{{ route('dishes.create') }}">aggiungi un piatto.</a></p>
                    <a href="{{ route('dishes.index') }}" class="btn btn-primary">Vai</a>
                </div>
            </div>
        </section>
        {{-- ORDERS --}}
        <section>
            <div class="card">
                <h5 class="card-header">Ordini ricevuti</h5>
                <div class="card-body">
                    <p class="card-text">Visualizza i tuoi ordini</p>
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Vai</a>
                </div>
            </div>
        </section>
        {{-- STATS --}}
        <section>
            <div class="card">
                <h5 class="card-header">Statistiche ordini</h5>
                <div class="card-body">
                    <p class="card-text">Visualizza le statistiche relative ai tuoi ordini</p>
                    <a href="{{ route('orders.statistic') }}" class="btn btn-primary">Vai</a>
                </div>
            </div>
        </section>
    </div>

@endsection
