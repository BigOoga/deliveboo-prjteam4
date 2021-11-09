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
                    <th scope="col">Disponibile:</th>
                    <th scope="col">Prezzo:</th>

                </tr>
            </thead>
            <tbody>
                {{-- CICLO FOR E STAMPA DETTAGLIO PIATTI --}}
                @forelse($dishes as $dish)
                    <tr>
                        <td scope="row">{{ $dish->id }} </td>
                        <td><h5>{{ $dish->name }}</h5></td>
                        <td>{{ $dish->available }}</td>
                        <td>€{{ $dish->price }}</td>

                        <td class="">
                            <a 
                            {{-- href="{{ route('admin.dish.show', $dish->id) }}"  --}}
                            class="btn btn-info p-2">Dettaglio</a>
                            <a 
                            {{-- href="{{ route('admin.dish.edit', $dish->id) }}"  --}}
                            class="btn btn-secondary p-2">Modifica</a>
                            {{-- <form action="{{ route('admin.dish.destroy', $dish->id) }}" method="POST"
                                class="d-inline delete-form" data-post="{{ $post->title }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form> --}}
                        </td>
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
