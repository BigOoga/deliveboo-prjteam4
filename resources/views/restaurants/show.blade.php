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
            {{-- fixare il responsive  --}}
            
            {{-- RESTAURANT DETAILS --}}
            <a class="btn mb-3" href="{{ route('restaurants.index') }}" role="button">Indietro</a>
            <div class="row">
                    
                {{-- RESTAURANT INFO --}}
                        <div id="restaurant-infos" class="col-lg-8 col-md-6 p-3">
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
                    <div id="restaurant-image" class="col-lg-4 col-md-6 d-flex align-items-center">
                        <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}"
                        class="img-fluid">
                    </div> 
                </div> 
            </div>

            {{-- MENU --}}
            <div class="mt-5">
                <h2>I nostri piatti</h2>
            </div>
            <div class="row justify-content-between">
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
    };
</style>