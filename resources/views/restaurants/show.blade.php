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
        <div class="container pt-5">
            {{-- RESTAURANT DETAILS --}}
            <a class="btn mb-3" href="{{ route('restaurants.index') }}" role="button">Indietro</a>
            <div class="row">

                {{-- RESTAURANT INFO --}}
                <div id="restaurant-infos" class="col-8 p-3">
                    <h1><strong>{{ $restaurant->name }}</strong></h1>
                    <hr>
                    <ul class="list-unstyled">
                        <li><time><strong>Orario di apertura: </strong>{{ $restaurant->opening_time }}</time></li>
                        <li><time><strong>Orario di chiusura: </strong>{{ $restaurant->closing_time }}</time></li>
                        <li><strong>Contatti: </strong>{{ $restaurant->email }}</li>
                        <li><strong>Spese di spedizione: € </strong>{{ $restaurant->delivery_fee }}</li>
                    </ul>
                    {{-- INSERT DESCRIPTION --}}
                    <h5><strong>Descrizione:</strong></h5>
                    <p>{{ $restaurant->description }}</p>
                </div>
                {{-- RESTAURANT PIC --}}
                <div id="restaurant-image" class="col-4">
                    <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}"
                        class="img-fluid">
                </div>
            </div>

            {{-- MENU --}}
            <div class="mt-5">
                <h2>I nostri piatti</h2>
            </div>
            <div class="row">
                <restaurantmenu></restaurantmenu>
                <Cart></Cart>
            </div>
        </div>
    </div>


</body>

</html>
<style lang="scss" scoped>
    a.btn{
        background-color: #00bb55;
        color: white;
        font-size: 1rem;
        font-weight: bold;
    }
    #restaurant-infos{
        border-left: 2px solid #00aabc;
        border-top: 2px solid #00aabc;
        border-bottom: 2px solid #00aabc;
        border-radius: 5px 0 0 5px;

    }
    #restaurant-image{
        border-right: 2px solid #00aabc;
        border-top: 2px solid #00aabc;
        border-bottom: 2px solid #00aabc;
        border-radius: 0 5px 5px 0;
    }
</style>