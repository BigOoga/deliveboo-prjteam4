@extends('layouts.app')

@section('content')

    <div class="container">
        {{-- FORM FOR EDIT --}}
        <h1 class="text-center mb-3">Crea Piatto</h1>
        @include('dishes.includes.form')
    </div>

@endsection

        <div class="form-row">
            <div class="form-group col-2">
                <button type="submit" class="btn btn-primary">Invia</button>
            </div>
        </div>
        <a class="btn btn-success my-2" href="{{ route('dishes.index') }}">Torna alla lista</a>
        <a class="btn btn-success" href="{{ route('restaurants.dashboard') }}">Torna alla dashboard</a>
    </div>
</form>
@section('scripts')
    <script src="{{ asset('js/preview.js') }}"></script>
@endsection
