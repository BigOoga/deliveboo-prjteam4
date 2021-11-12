@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-between m-3">        
            <h1>I miei piatti</h1>
            <div><a href="{{ route('dishes.create') }}" class="btn btn-primary p-2  my-1">Aggiungi un piatto</a></div>
        </div>
        {{-- PRINT DISHES --}}
        @forelse($dishes as $dish)
            <section class="row">
                <div class="col-md-4">
                    <div class="card m-3">
                        <img class="img-fluid" src="{{ asset('storage/' . $dish->picture) }}"
                            alt="{{ $dish->name }}">
                        <div class="card-body">
                            <h5 class="card-title">Nome Piatto{{ $dish->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Portata: {{ $dish->entry }}</li>
                            <li class="list-group-item">Prezzo: € {{ $dish->price }}</li>
                            <li class="list-group-item">ID: {{ $dish->id }}</li>
                        </ul>
                        <div class="card-body">
                            {{-- LINK AND BUTTON --}}

                            <a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-info my-1">Dettaglio</a>
                            <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-primary my-1">Modifica</a>
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
    
@section('secondaryscript')
    <script src="{{ asset('js/delete_confirmation.js')}}"></script>    
@endsection
