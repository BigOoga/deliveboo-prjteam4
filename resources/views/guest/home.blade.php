<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-small.png') }}" />
    <title>Deliveboo | Home</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">


</head>

<body id="root">


    {{-- Header --}}
    <header>

        <div id="nav-bg">
            <nav class="navbar navbar-light d-flex justify-content-space-between container">
                {{-- LOGO --}}
                <div>
                    <a class="navbar-brand" href="#">
                        <span class="text-white">
                            <img src="{{ asset('images/logo-small.png') }}" width="30" height="30"
                                class="d-inline-block align-top" alt="Logo">
                            Deliveboo
                        </span>
                    </a>
                </div>
                {{-- Navbar buttons --}}
                <div>
                    <a class="btn btn-light" href="#" role="button">Carrello</a>
                    <a class="btn btn-light" href="{{ route('login') }}" role="button">Accedi o registrati</a>
                    <a class="btn btn-light" href="#" role="button" onclick="openNav()">Menu</a>
                </div>
                {{-- Sidebar --}}
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <span class="d-flex mx-3">
                        <img src="{{ asset('images/logo-small.png') }}" width="30" height="30" alt="Deliveboo">
                        <h4 class="mx-3">Deliveboo</h4>
                    </span>
                    <hr class="mx-3">
                    <div class="d-flex justify-content-center p-3">
                        <a class="btn btn-primary text-center" href="{{ route('login') }}" role="button">Accedi</a>
                        <a class="btn btn-primary text-center" href="{{ route('register') }}"
                            role="button">Registrati</a>
                    </div>
                    <hr class="mx-3">
                    <a class="ps-5" href="{{ route('restaurants.create') }}">Aggiungi il tuo ristorante</a>
                </div>
            </nav>
        </div>

        <div id="hero" class="d-flex align-items-end py-4">
            <div class="container">
                <h1>I piatti che ami, a domicilio.</h1>
                <div class="row mt-5">
                    {{-- Search location --}}
                    <div id="search-form" class="col-6 px-4">
                        <div class="form-inline mr-auto">
                            <label for="search" class="w-100 d-block">VAI AI RISTORANTI</label>
                            <div class="d-flex">
                                <input class="form-control me-3" type="text" placeholder="Search" aria-label="Search"
                                    id="search">
                                <a class="btn btn-light" href="{{ route('restaurants.index') }}" role="button">Vai ai
                                    ristoranti</a>

                            </div>
                        </div>

                        <p><a href="{{ route('login') }}">Accedi</a> per visualizzare i tuoi indirizzi recenti.</p>
                    </div>

                </div>
            </div>

        </div>


    </header>

    {{-- Main --}}
    <main>

        {{-- Made first main section, need to make it respondive --}}
        <div id="deliveboo-section" class="my-3">
            <div class="container">
                {{-- Section title --}}
                <h2 class="mb-3">La selezione di Deliveboo</h2>
                <div class="row">
                    <div class="col-5 d-flex py-3">
                        <div class="card flex-grow-1 clickable" style="width: 18rem;">
                            {{-- Card image --}}
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                {{-- Card title --}}
                                <h5 class="card-title">Comfort food</h5>
                                {{-- Description --}}
                                <p class="card-text">I grandi classici che scaldano il cuore, perfetti in ogni
                                    momento.</p>
                                {{-- Link to card object --}}
                                <p>Scopri Comfort Food</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 d-flex py-3">
                        <div class="card flex-grow-1 clickable" style="width: 18rem;">
                            {{-- Card image --}}
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                {{-- Card title --}}
                                <h5 class="card-title">Dolci e dessert</h5>
                                {{-- Description --}}
                                <p class="card-text">Dolci piaceri per rendere la giornata ancora più gustosa.</p>
                                {{-- Link to card object --}}
                                <p>Scopri Dolci e dessert</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 d-flex py-3">
                        <div class="card flex-grow-1 clickable" style="width: 18rem;">
                            {{-- Card image --}}
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                {{-- Card title --}}
                                <h5 class="card-title">Perfetti da condividere</h5>
                                {{-- Description --}}
                                <p class="card-text">Serve una scusa per stare insieme? Ordina dai ristoranti che
                                    trasformeranno la tua serata in un vera festa.</p>
                                {{-- Link to card object --}}
                                <p>Scopri Perfetti da condividere</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 d-flex py-3">
                        <div class="card flex-grow-1 clickable" style="width: 18rem;">
                            {{-- Card image --}}
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                {{-- Card title --}}
                                <h5 class="card-title">Esclusiva deliveroo</h5>
                                {{-- Description --}}
                                <p class="card-text">I più famosi, i più buoni, i preferiti. Quelli che trovi solo
                                    su Deliveboo.</p>
                                {{-- Link to card object --}}
                                <p>Scopri Esclusiva Deliveboo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Da moltiplicare le cards e aggiustare le desc --}}
        <div id="default-section" class="my-3">
            <div class="container">
                {{-- Section title --}}
                <h2 class="mb-3">La selezione di Deliveboo</h2>
                <div class="row">
                    <div class="col-4 d-flex py-3">
                        <div class="card flex-grow-1 clickable" style="width: 18rem;">
                            {{-- Card image --}}
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                {{-- Card title --}}
                                <h5 class="card-title">Comfort food</h5>
                                {{-- Description --}}
                                <p class="card-text">I grandi classici che scaldano il cuore, perfetti in ogni
                                    momento.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex py-3">
                        <div class="card flex-grow-1 clickable" style="width: 18rem;">
                            {{-- Card image --}}
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                {{-- Card title --}}
                                <h5 class="card-title">Dolci e dessert</h5>
                                {{-- Description --}}
                                <p class="card-text">Dolci piaceri per rendere la giornata ancora più gustosa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex py-3">
                        <div class="card flex-grow-1 clickable" style="width: 18rem; max-width: 100%;">
                            {{-- Card image --}}
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                {{-- Card title --}}
                                <h5 class="card-title">Perfetti da condividere</h5>
                                {{-- Description --}}
                                <p class="card-text">Serve una scusa per stare insieme? Ordina dai ristoranti che
                                    trasformeranno la tua serata in un vera festa.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        {{-- Da aggiungere dati type per il loop --}}
        <div id="suggested">

            <div class="container">
                {{-- @foreach ($suggestions as $suggestion) --}}
                <a href="#" class="btn btn-light">categoria</a>
                {{-- @endforeach --}}
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer></footer>


    {{-- Scripts --}}
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "375px";
            document.getElementById("root").style.overflow = "hidden";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("root").style.overflow = "auto";
        }
    </script>

</body>

</html>
