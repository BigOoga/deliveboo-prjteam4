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
    <div class="container mt-5 mb-5">  
        <div class="row">
            {{-- RESTAURANT DETAILS  --}}
            <h1>PROVA TEST</h1>
            <div class="row">
                {{-- RESTAURANT PIC  --}}
                <div>
                    <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}" class="img-fluid rounded px-3" style="max-width: 450px;"> 
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
            <h1>Menu</h1>
            <div class="col-8">
                {{-- MENU  --}}
                <div class="row">
                    @foreach($dishes as $dish)
                        <div class="card m-3 mt-0 shadow" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-4">
                <img src="{{ asset('storage/' . $dish->picture) }}" class="img-fluid rounded-start" alt="{{$dish->name}}">
            </div>
            <div class="col-8">
                <div class="card-body">
                    <h5 class="card-title">{{$dish->name}}</h5>
                    <p class="card-text m-0">{{$dish->description}}</p>
                    <p class="card-text">{{ $dish->price . ' €'}}</p>
                </div>
            </div>
        </div>
    </div>
                    @endforeach                
                </div>
            </div>
            <div class="col-4">
                <div id="app">
                    <Cart></Cart>
                </div>
            </div>
        </div>
        </div> 
    
    <script src="{{ asset('js/app.js') }}"></script>    
</body>
</html>
    