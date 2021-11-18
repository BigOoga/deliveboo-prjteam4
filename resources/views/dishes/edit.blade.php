@extends('layouts.app')

@section('content')

    <div class="container">
        {{-- FORM FOR EDIT --}}
        <div class="d-flex justify-content-between m-3">
            <div><a href="{{ route('dishes.index') }}" class="btn btn-primary p-2  my-1">Indietro</a>
            </div>
            <h1>Modifica Piatto</h1>
            <div><a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary p-2  my-1">Torna alla dashboard</a>
            </div>
        </div>
        @include('dishes.includes.form')
    </div>

@endsection

@section('scripts')
    {{-- VALUTARE PREVIEW IMMAGINE --}}
    {{-- <script src="{{ asset('js/preview.js') }}"></script> --}}
@endsection
