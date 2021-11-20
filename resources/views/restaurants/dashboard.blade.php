@extends('layouts.app')

@section('content')
    <div class="container">
        <h2><strong>Dashboard</strong></h2>
        {{-- AT A GLANCE --}}
        <section>
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-0">{{ $restaurant->name }}</h3>
                    <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-primary">Modifica informazioni</a>
                </div>
                <div class="card-body">
                    <img class="img-fluid" style="width: 200px; height: auto"
                        src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}">

                    <div class="mt-5">
                        <h5>Descrizione:</h5>
                        <p>{{ $restaurant->description }}</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- DISHES --}}
        <section>
            <div class="card mb-3">
                <div class="card-header">
                    <h4 class="m-0">I miei piatti</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Visualizza e modifica i tuoi piatti, oppure <a
                            href="{{ route('dishes.create') }}">aggiungi un piatto.</a></p>
                    <a href="{{ route('dishes.index') }}" class="btn btn-primary">Vai</a>
                </div>
            </div>
        </section>
        {{-- ORDERS --}}
        <section>
            <div class="card mb-3">
                <h4 class="card-header">Ordini ricevuti</h4>
                <div class="card-body">
                    <p class="card-text">Visualizza i tuoi ordini</p>
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Vai</a>
                </div>
            </div>
        </section>
        {{-- STATS --}}
        <section>
            <div class="card mb-3">
                <h4 class="card-header">Statistiche ordini</h4>
                <div class="card-body">
                    <p class="card-text">Visualizza le statistiche relative ai tuoi ordini</p>
                    <a href="{{ route('orders.statistic') }}" class="btn btn-primary">Vai</a>
                </div>
            </div>
        </section>
    </div>

@endsection
