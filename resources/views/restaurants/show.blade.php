</html>

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

            <div class="row border">

                <div class="col-8 border">
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
                {{-- RESTAURANT PIC --}}
                <div class="col-4 border">
                    <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}"
                        class="img-fluid rounded px-3" style="max-width: 450px;">
                </div>
            </div>

            {{-- MENU --}}
            <h2>I nostri piatti</h2>
            <div class="row">
                <restaurantmenu></restaurantmenu>
                <Cart></Cart>
            </div>
        </div>
    </div>


</body>

</html>
