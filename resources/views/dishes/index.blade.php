@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center mb-5">I miei piatti</h1>
        {{-- PRINT DISHES --}}
        @forelse($dishes as $dish)
            <section class="container">
                <div class="card mb-2">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="img-fluid" src="{{ $dish->picture }}" alt="{{ $dish->name }}">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <p class="card-title"><strong>{{ $dish->name }}</strong></p>
                                <p class="card-text">{{ $dish->description }}</p>
                                <p class="card-text">{{ $dish->entry }}</p>
                                <p class="card-text">€ {{ $dish->price }}</p>
                                {{-- BOOLEANS --}}
                                <div class="card-text d-flex justify-content-between">
                                    <span>Disponibile: @if ($dish->available)
                                        Si @else No
                                        @endif
                                    </span>
                                    <span>Gluten-free: @if ($dish->gluten_free)
                                        Si @else No
                                        @endif
                                    </span><span>Surgelato: @if ($dish->frozen)
                                        Si @else No
                                        @endif
                                    </span><span>Vegetariano: @if ($dish->vegetarian)
                                        Si @else No
                                        @endif
                                    </span><span>Vegano: @if ($dish->vegan)
                                        Si @else No
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- LINK AND BUTTON --}}
                        <div class="col-md-1 d-flex align-items-center flex-column justify-content-center">
                            <a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-info p-2">Dettaglio</a>
                            <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-primary p-2  my-1">Modifica</a>
                            <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST"
                                class="d-inline delete-form  my-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-2">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        @empty
            <tr>
                <th colspan="3" class="text-center">Non ci sono piatti</th>
            </tr>
        @endforelse
    </div>
@endsection

