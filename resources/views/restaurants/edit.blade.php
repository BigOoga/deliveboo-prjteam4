@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-between m-3">
            <div><a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary p-2 mr-3 my-1">Torna
                    indietro</a>
                <h1 style="vertical-align: middle" class="d-inline-block self-align-center pl-3 ml-3">Modifica informazioni
                </h1>
            </div>
        </div>

        <div class="row my-3">
            {{-- NAME --}}
            <form method="POST" enctype="multipart/form-data" action="{{ route('restaurants.update', $restaurant->id) }}">
                @csrf
                @method('PATCH')
                <div class="col-12 col-md-8">
                    <label for="name" class="form-label">Nome attività</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ $restaurant->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row my-3">
                    {{-- ADDRESS --}}
                    <div class="col-12 col-lg-10">
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" value="{{ $restaurant->address }}">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- DESCRIPTION --}}
                    <div class="col-12 mt-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" name="description"
                            rows="5">{{ $restaurant->description }}</textarea>
                    </div>
                </div>
                <div class="row">
                    {{-- UPLOAD --}}
                    <div class="col-12 col-md-6 form-group my-3">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                            value="{{ $restaurant->image }}">
                        <label for="image" class="form-label">Immagine</label>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    {{-- OPENING TIME --}}
                    <div class="col-6 col-lg-3">
                        <label for="opening_time" class="form-label">Orario di apertura</label>
                        <input type="time" class="form-control @error('opening_time') is-invalid @enderror"
                            name="opening_time" id="opening_time" value="{{ $restaurant->opening_time }}">
                        @error('opening_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- CLOSING TIME --}}
                    <div class="col-6 col-lg-3">
                        <label for="closing_time" class="form-label">Orario di chiusura</label>
                        <input type="time" class="form-control @error('closing_time') is-invalid @enderror"
                            name="closing_time" id="closing_time" value="{{ $restaurant->closing_time }}">
                        @error('closing_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row my-3">
                    {{-- DELIVERY FEE --}}
                    <div class="col-4">
                        <label for="deliveryFee" class="form-label">Spese di spedizione</label>
                        <input type="number" class="form-control @error('delivery_fee') is-invalid @enderror" min="0.00"
                            step="0.01" name="delivery_fee" id="deliveryFee" value="{{ $restaurant->delivery_fee }}">
                        @error('delivery_fee')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row my-3">
                    {{-- TYPES --}}
                    <div class="col-12">
                        <h5 class="mb-2">Categoria</h5>
                        @foreach ($types as $type)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="{{ $type->id }}"
                                    id="type-{{ $type->id }}" name="types[]" @if (in_array($type->id, old('types', $type_arr))) checked @endif>
                                <label class="form-check-label" for="type-{{ $type->id }}">{{ $type->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- SIGN UP & LINK HOME --}}
                <div class="row mt-4">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary px-4">Salva modifiche</button>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/') }}" class="btn btn-primary">Torna alla home</a>
                    </div>

                </div>

            </form>
        </div>

    @endsection
