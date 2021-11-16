@extends('layouts.app')

@section('content')

    <section class="container">
        <div class="d-flex justify-content-between m-3">
            <h1>I miei piatti</h1>
            <div><a href="{{ route('dishes.create') }}" class="btn btn-primary p-2  my-1">Aggiungi un piatto</a></div>
        </div>
        @if (session('deleted'))
            <div class="alert alert-success d-flex align-items-center m-3" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    <i class="far fa-check-circle text-success"></i> Il piatto {{ session('deleted') }} è stato eliminato!
                </div>
            </div>
        @endif
        {{-- PRINT DISHES --}}
        @forelse($dishes as $dish)
            <div class="row">
                <div class="card m-3" style="width: 18rem">
                    <img class="img-fluid" src="{{ asset('storage/' . $dish->picture) }}" alt="{{ $dish->name }}">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <h5>Nome piatto: <strong>{{ $dish->name }}</strong></h5>
                        <a href="{{ route('dishes.edit', $dish->id) }}" class="btn my-2">
                            <i class="fas fa-pen fs-4"></i>
                        </a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Portata: {{ $dish->entry }}</li>
                        <li class="list-group-item">Prezzo: € {{ $dish->price }}</li>
                        <li class="list-group-item">ID: {{ $dish->id }}</li>
                    </ul>
                    <div class="card-body">
                        {{-- LINK AND BUTTON --}}

                        <a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-info my-1">Dettaglio</a>
                        <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST"
                            class="d-inline delete-form  my-1">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger p-2">Elimina</button> --}}
                            @include('dishes.includes.modal')
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div>
                <h3 class="text-center">Non ci sono piatti</h3>
            </div>
        @endforelse
    </section>
@endsection
@section('secondaryscript')
    <script src="{{ asset('js/delete_confirmation.js') }}"></script>
@endsection
