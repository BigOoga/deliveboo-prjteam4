<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    {{-- TABELLA PIATTI --}}
    <div class="container">
        <h1 class="text-center mb-5">I miei piatti</h1>
        @if (session('message'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                    </svg>
                    Il post {{ session('message') }} è stato eliminato!
                </div>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome piatto:</th>
                    <th scope="col">Descrizione:</th>
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
                        <td>{{ $restaurant->description }}</td>
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
        <hr>
</body>
</html>