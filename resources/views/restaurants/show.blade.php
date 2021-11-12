<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <topbar></topbar>
        <div class="container">
            {{-- RESTAURANT DETAILS --}}
            <h1>PROVA TEST</h1>
            <div class="row">
                {{-- RESTAURANT PIC --}}
                <div>
                    <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}"
                        class="img-fluid rounded px-3" style="max-width: 450px;">
                </div>
                <div>
                    <h1>{{ $restaurant->name }}</h1>
                    {{-- RESTAURANT INFO --}}
                    <ul class="list-unstyled">
                        <li><time>Orario di apertura {{ $restaurant->opening_time }}</time></li>
                        <li><time>Orario di chiusura {{ $restaurant->closing_time }}</time></li>
                        <li>Contatti: {{ $restaurant->email }}</li>
                        <li>Spese di spedizione: € {{ $restaurant->delivery_fee }}</li>
                        {{-- INSERT DESCRIPTION --}}
                    </ul>
                </div>
            </div>

            {{-- MENU --}}
            <h1>Menu</h1>
            <div class="row">
                <restaurantmenu></restaurantmenu>
                {{-- CART GOES HERE --}}
            </div>
        </div>
    </div>


</body>

</html>
