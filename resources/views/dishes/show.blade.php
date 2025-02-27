@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <a href="{{ route('dishes.index') }}" class="btn btn-primary p-2  my-1">
                Torna indietro</a>
            <h1 class="text-center m-0 align-middle">
                Dettagli del piatto</h1>
            <a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary p-2  my-1">
                Torna alla dashboard</a>
        </div>
        <div class="card mb-2 px-3">
            <div class="row">
                <div class="col-md-3 d-flex align-items-center">
                    <img class="img-fluid" src="{{ asset('storage/' . $dish->picture) }}" alt="{{ $dish->name }}">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        {{-- PRINT DISHES --}}
                        <div class="card-title d-flex align-items-center justify-content-between">
                            <h5>Nome piatto: <strong>{{ $dish->name }}</strong></h5>
                            <div>
                                <a href="{{ route('dishes.edit', $dish->id) }}" class="btn">
                                    <i class="fas fa-pen fs-4"></i>
                                </a>
                                <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST"
                                    class="delete-form d-inline" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    @include('dishes.includes.modal')
                                </form>
                            </div>
                        </div>
                        <p class="card-text">
                            Descrizione: <strong>{{ $dish->description }}</strong>
                        </p>
                        <p class="card-text">
                            Portata: <strong>{{ $dish->entry }}</strong>
                        </p>
                        <p class="card-text">
                            Prezzo: <strong>€ {{ $dish->price }}</strong>
                        </p>
                        {{-- BOOLEANS --}}
                        <div class="card-text d-flex justify-content-between">
                            <span>Disponibile: @if ($dish->available)
                                Si @else No
                                @endif
                            </span>
                            <span>Gluten-free: @if ($dish->gluten_free)
                                Si @else No
                                @endif
                            </span>
                            <span>Surgelato: @if ($dish->frozen)
                                Si @else No
                                @endif
                            </span>
                            <span>Vegetariano: @if ($dish->vegetarian)
                                Si @else No
                                @endif
                            </span>
                            <span>Vegano: @if ($dish->vegan)
                                Si @else No
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
