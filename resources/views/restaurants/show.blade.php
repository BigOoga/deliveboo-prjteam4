@extends('layouts.app')

@section('content')
    <div class="container">   
        {{-- RESTAURANT DETAILS  --}}
        <h1>PROVA TEST</h1>
        <div class="row">
            {{-- RESTAURANT PIC  --}}
            <div>
                <img src="{{ $restaurant->image }}" alt="immagine ristorante" class="img-fluid rounded px-3" style="max-width: 450px;"> 
            </div>
            <div>
                <h1>{{$restaurant->name}}</h1>
            {{-- RESTAURANT INFO  --}}
                <ul class="list-unstyled">
                    <li><time>Orario di apertura {{$restaurant->opening_time}}</time></li>
                    <li><time>Orario di chiusura {{$restaurant->closing_time}}</time></li>
                    <li>Contatti: {{$restaurant->email}}</li>
                    <li>Spese di spedizione: € {{$restaurant->delivery_fee}}</li>
                    {{-- INSERT DESCRIPTION  --}}
                </ul>
            </div>
        </div>

        {{-- MENU  --}}
        <h1>Menu</h1>
        <div class="row">
            @foreach($dishes as $dish) 
                <div class="card m-3 shadow" style="max-width: 500px;">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="{{$dish->picture}}" class="img-fluid rounded-start" alt="foto del piatto">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$dish->name}}</h5>
                                <p class="card-text">{{ $dish->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach                
        </div>
    </div>
    
 @endsection
    