@extends('layouts.app')

@section('content')


    <section class="container">
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('restaurants.dashboard') }}"
                    class="btn btn-primary p-2  my-1">Torna alla dashboard</a>
                <h1>I miei piatti</h1>
            <a href="{{ route('dishes.create') }}" class="btn btn-primary p-2 my-1 ">Aggiungi
                    un
                    piatto</a>
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
        <div class="row rounded p-3 bg-light">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Portata</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dishes as $dish)
                        <tr class="align-middle">
                            <td><img class="dish-thumb" src="{{ asset('storage/' . $dish->picture) }}"
                                    alt="{{ $dish->name }}"></td>
                            <td>{{ $dish->name }}</td>
                            <td>€{{ $dish->price }}</td>
                            <td>{{ $dish->entry }}</td>
                            <td  class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-info">Dettaglio</a>
                                <a href="{{ route('dishes.edit', $dish->id) }}" class="btn">
                                    <i class="fas fa-pen fs-4"></i>
                                </a>
                                <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST"
                                    class="d-inline delete-form" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Modal -->
                                    @include('dishes.includes.modal')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div>
                            <h3 class="text-center">Non ci sono piatti</h3>
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
