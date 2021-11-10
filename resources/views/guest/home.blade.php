<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ asset('images/logo-small.png') }}"/>
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
                                        <img src="{{ asset('images/logo-small.png') }}" width="30" height="30" class="d-inline-block align-top" alt="Logo">
                                        Deliveboo
                                    </span>
                                </a>
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
                                    <a class="btn btn-primary text-center" href="{{ route('register') }}" role="button">Registrati</a>
                                </div>
                                <hr class="mx-3">
                                <a class="ps-5" href="{{ route('restaurants.create') }}">Aggiungi il tuo ristorante</a>
                              </div>
                        </nav>
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
                        <div class="card flex-grow-1 clickable" style="width: 18rem;">
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


                        <div class="container">
                        {{-- @foreach($suggestions as $suggestion) --}}
                        <a href="#" class="btn btn-light">categoria</a>
                        {{-- @endforeach --}}
                        </div>
                    </div>
                </main>

                {{-- Footer --}}
                <footer></footer>





            {{-- Styles --}}
            <style>
                *{
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    
                }
                #root{
                    overflow: auto;
                }
                .clickable{
                    cursor: pointer;
                }
                
                #hero{
                    height: 400px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }
                
                header{
                    height: 455px;
                    background: linear-gradient(176deg, rgba(0,204,188,1) 49.7%, rgba(208,235,153,1) 50%);
                }
                #search-form{
                    align-self: flex-end;
                }
                .sidenav {
                    height: 100%;
                    width: 0;
                    position: fixed;
                    z-index: 1;
                    top: 0;
                    right: 0;
                    background-color: #fff;
                    overflow-x: hidden;
                    transition: 0.5s;
                    padding-top: 1rem;
                    border-left: 1px solid #eee;
                }

                .sidenav a {
                    padding: 8px 8px 8px 8px;
                    text-decoration: none;
                    font-size: 1rem;
                    color: #000;
                    display: block;
                    transition: 0.3s;
                }
                .sidenav .btn{
                    width: 100%;
                    margin: 10px;
                    color: #fff;
                }

                .sidenav a:hover {
                    color: #ccc;
                }

                .sidenav .closebtn {
                    position: absolute;
                    top: 0;
                    right: 25px;
                    font-size: 2rem;
                    margin-left: 50px;
                }

                
            </style>


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
