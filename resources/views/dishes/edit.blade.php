@extends('layouts.app')

@section('content')

    <div class="container">
        {{-- FORM FOR EDIT --}}
        <div class="d-flex justify-content-between my-2">
            <a href="{{ route('dishes.index') }}" class="btn btn-primary p-2 my-1">Torna indietro</a>
            <h1 class="h3 text-center ">Modifica piatto</h1>
            <a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary p-2  my-1">Torna alla dashboard</a>
        </div>
        @include('dishes.includes.form')
    </div>

@endsection
