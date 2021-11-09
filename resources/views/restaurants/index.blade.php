@extends('layouts.app')

@section('content')
    {{-- TABELLA PIATTI --}}
    <div class="container">
        <h1 class="text-center mb-5">I miei piatti</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome piatto:</th>
                    {{-- <th scope="col">Descrizione:</th> --}}
                    <th scope="col">Portata:</th>
                    <th scope="col">Prezzo:</th>
                    <th scope="col">Disponibile:</th>
                    <th scope="col">Gluten Free:</th>
                    <th scope="col">Vegetariano:</th>
                    <th scope="col">Vegano:</th>
                    <th scope="col">Surgelato:</th>
                </tr>
            </thead>
            <tbody>
                {{-- CICLO FOR E STAMPA DETTAGLIO PIATTI --}}
                @forelse($restaurants as $restaurant)
                    <tr>
                        <td scope="row">{{ $restaurant->id }} </td>
                        <td>{{ $restaurant->name }}</td>
                        {{-- <td>{{ $restaurant->description }}</td> --}}
                        <td>{{ $restaurant->entry }}</td>
                        <td>{{ $restaurant->price }}</td>
                        <td>{{ $restaurant->gluten_free }}</td>
                        <td>{{ $restaurant->vegetarian }}</td>
                        <td>{{ $restaurant->vegan }}</td>
                        <td>{{ $restaurant->frozen }}</td>
                        {{-- <td class="">
                            <a href="{{ route('admin.restaurant.show', $restaurant->id) }}" class="btn btn-info p-2">Dettaglio</a>
                            <a href="{{ route('admin.restaurant.edit', $restaurant->id) }}" class="btn btn-secondary p-2">Modifica</a>
                            <form action="{{ route('admin.restaurant.destroy', $restaurant->id) }}" method="POST"
                                class="d-inline delete-form" data-post="{{ $post->title }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <th colspan="3" class="text-center">Non ci sono piatti</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
