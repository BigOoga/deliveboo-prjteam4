@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="card mb-2">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-fluid" src="{{ asset('storage/' . $dish->picture) }}" alt="{{ $dish->name }}">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        {{-- PRINT DISHES --}}
                        <h5 class="card-title">
                            Nome piatto: <strong>{{ $dish->name }}</strong>
                        </h5>
                        <p class="card-text">
                            Descrizione: <strong>{{ $dish->description }}</strong>
                        </p>
                        <p class="card-text">
                            Portata: <strong>{{ $dish->entry }}</strong>
                        </p>
                        <p class="card-text">
                            Prezzo: <strong>€ {{ $dish->price }}</strong>
                        </p>
                        <p class="card-text">
                            Id: <strong>{{ $dish->id }}</strong>
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
                        {{-- LINK AND BUTTON --}}
                        <div>
                            <a href="{{ route('dishes.index', $dish->id) }}" class="btn btn-success my-2">Lista</a>
                            <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-info my-2">Modifica</a>
                            <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" class="delete-form"
                                class="d-inline delete-form my-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')
    <script src="{{ asset('js/deleteconfirmation.js')}}"></script>    
@endsection
