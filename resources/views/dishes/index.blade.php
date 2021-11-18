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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Portata</th>
                    <th scope="col">Controlli</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dishes as $dish)
                    <tr>
                        <td><img class="dish-thumb" src="{{ asset('storage/' . $dish->picture) }}"
                                alt="{{ $dish->name }}"></td>
                        <td>{{ $dish->name }}</td>
                        <td>€{{ $dish->price }}</td>
                        <td>{{ $dish->entry }}</td>
                        <td><a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-info my-1">Dettaglio</a>
                            <a href="{{ route('dishes.edit', $dish->id) }}" class="btn my-2">
                                <i class="fas fa-pen fs-4"></i>
                            </a>
                            <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST"
                                class="d-inline delete-form  my-1">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="btn btn-danger p-2">Elimina</button> --}}
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

    </section>
@endsection

