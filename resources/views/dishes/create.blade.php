@extends('layouts.app')

@section('content')

    <div class="container">
        {{-- FORM FOR EDIT --}}
        <h1 class="text-center mb-3">Crea Piatto</h1>
        @include('dishes.includes.form')
    </div>

@endsection


@section('scripts')
{{-- VALUTARE PREVIEW IMMAGINE --}}
    {{-- <script src="{{ asset('js/preview.js') }}"></script> --}}
@endsection
