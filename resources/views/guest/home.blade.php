  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="{{ asset('images/logo-small.png') }}" />
      <title>Deliveboo | Home</title>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css'
          integrity='sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=='
          crossorigin='anonymous' />
      <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
  </head>

  <body id="root">
      {{-- HEADER --}}
      <header>
          <div id="nav-bg">
              <nav class="navbar navbar-light container d-flex justify-content-between">
                  {{-- LOGO --}}
                  <div>
                      <a class="navbar-brand d-flex align-items-center" href="#">
                          <img src="{{ asset('images/logo-small.png') }}" width="40" height="40"
                              class="d-inline-block align-top" alt="Logo">
                          <strong class="mx-1 text-logo">Deliveboo</strong>
                      </a>
                  </div>
                  {{-- Navbar buttons --}}
                  <div>
                      @if (Auth::guest())
                          <a class="btn btn-light mx-3" href="{{ route('login') }}" role="button"><i
                                  class="fas fa-home me-2 mr-2"></i>Accedi o registrati</a>
                      @endif
                      @if (Auth::check())
                          <a class="btn btn-light" href="{{ route('restaurants.dashboard') }}" role="button"><i
                                  class="fas fa-home me-2 mr-2"></i>Vai alla dashboard</a>
                      @endif
                      <a class="btn btn-light" href="#" role="button" onclick="openNav()"><i
                              class="fas fa-bars me-2 mr-2"></i>Menu</a>
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
                          @if (Auth::guest())
                              <a class="btn btn-primary text-center" href="{{ route('login') }}"
                                  role="button">Accedi</a>
                              <a class="btn btn-primary text-center" href="{{ route('register') }}"
                                  role="button">Registrati</a>
                          @endif
                          @if (Auth::check())
                              <a class="btn btn-primary" href="{{ route('restaurants.dashboard') }}" role="button">
                                  Vai alla dashboard</a>
                          @endif
                      </div>
                      <hr class="mx-3">
                  </div>
              </nav>
          </div>
          {{-- HERO --}}
          <div id="hero">
              <div class="container">
                  <div class="row">
                      <div id="hero-text" class="col-6 mb-5 img-animation">
                          <h1>I piatti che ami, a domicilio.</h1>
                      </div>
                  </div>
              </div>
          </div>
      </header>

      {{-- MAIN --}}
      <main>
          {{-- DELIVEBOO SECTION --}}
          <section id="deliveboo-section" class="my-5">
              <div class="container">
                  {{-- Section title --}}
                  <h2 class="mb-3 fw-bolder">La selezione di Deliveboo</h2>
                  <div class="row">
                      {{-- Card Comfort Food --}}
                      <div class="col-lg-6 col-md-12 d-flex py-3">
                          <div class="card flex-grow-1 shadow-sm" style="width: 18rem;">
                              <a class="text-decoration-none text-dark" href="{{ route('restaurants.index') }}">
                                  {{-- Card image --}}
                                  <img src="{{ asset('images/comfortFood.png') }}" class="card-img-top"
                                      alt="Comfort-food">
                                  <div class="mt-4 p-3">
                                      {{-- Card title --}}
                                      <h5 class="card-title">Comfort food</h5>
                                      {{-- Description --}}
                                      <p class="card-text">I grandi classici che scaldano il cuore, perfetti in
                                          ogni momento.</p>
                                      <p>Scopri Comfort Food</p>
                                  </div>
                              </a>
                          </div>
                      </div>
                      {{-- Card Dessert --}}
                      <div class="col-lg-6 col-md-12 d-flex py-3">
                          <div class="card flex-grow-1 shadow-sm" style="width: 18rem;">
                              <a class="text-decoration-none text-dark" href="{{ route('restaurants.index') }}">
                                  {{-- Card image --}}
                                  <img src="{{ asset('images/dessert.png') }}" class="card-img-top" alt="dessert">
                                  <div class="mt-4 p-3">
                                      {{-- Card title --}}
                                      <h5 class="card-title">Dolci e dessert</h5>
                                      {{-- Description --}}
                                      <p class="card-text">Dolci piaceri per rendere la giornata ancora più
                                          gustosa.</p>
                                      <p>Scopri Dolci e dessert</p>
                                  </div>
                              </a>
                          </div>
                      </div>
                      {{-- Card Food To Share --}}
                      <div class="col-lg-6 col-md-12 d-flex py-3">
                          <div class="card flex-grow-1 shadow-sm" style="width: 18rem;">
                              <a class="text-decoration-none text-dark" href="{{ route('restaurants.index') }}">
                                  {{-- Card image --}}
                                  <img src="{{ asset('images/toshare.png') }}" class="card-img-top" alt="food">
                                  <div class="mt-4 p-3">
                                      {{-- Card title --}}
                                      <h5 class="card-title">Perfetti da condividere</h5>
                                      {{-- Description --}}
                                      <p class="card-text">Serve una scusa per stare insieme? Ordina dai ristoranti
                                          che trasformeranno la tua serata in un vera festa.</p>
                                      <p>Scopri Perfetti da condividere</p>
                                  </div>
                              </a>
                          </div>
                      </div>
                      {{-- Card Exclusive Deliveboo --}}
                      <div class="col-lg-6 col-md-12 d-flex py-3">
                          <div class="card flex-grow-1 shadow-sm" style="width: 18rem;">
                              <a class="text-decoration-none text-dark" href="{{ route('restaurants.index') }}">
                                  {{-- Card image --}}
                                  <img src="{{ asset('images/exclusive.png') }}" class="card-img-top" alt="food">
                                  <div class="mt-4 p-3">
                                      {{-- Card title --}}
                                      <h5 class="card-title">Esclusiva deliveboo</h5>
                                      {{-- Description --}}
                                      <p class="card-text">I più famosi, i più buoni, i preferiti. Quelli che trovi
                                          solo su Deliveboo.</p>
                                      <p>Scopri Esclusiva Deliveboo</p>
                                  </div>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          {{-- DEFAULT SECTION --}}
          <section id="default-section" class="py-5">
              <div class="container">
                  {{-- Section title --}}
                  <h2 class="mb-4 fw-bolder">I tuoi piatti preferiti, consegnati da noi</h2>
                  <div class="row row-cols-1 row-cols-md-3 justify-content-center">
                      {{-- FOOD CARD --}}
                      <div class="col-lg-4 col-md-6 mb-4">
                          <div>
                              <a href="{{ route('restaurants.index') }}">
                                  {{-- Card image --}}
                                  <img src="{{ asset('images/sushi.jpg') }}" class="card-img-top shadow-sm"
                                      alt="Sushi">
                                  <div class="mt-2">
                                      {{-- Card title --}}
                                      <h5 class="card-title text-capitalize">Sushi</h5>
                                  </div>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-4 col-md-6 mb-4">
                          <div>
                              <a href="{{ route('restaurants.index') }}">
                                  {{-- Card Image --}}
                                  <img src="{{ asset('images/pokè.jpg') }}" class="card-img-top shadow-sm"
                                      alt="Pokè-bowl">
                                  <div class="mt-2">
                                      {{-- Card title --}}
                                      <h5 class="card-title text-capitalize">Pokè bowl</h5>
                                  </div>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-4 col-md-6 mb-4">
                          <div>
                              <a href="{{ route('restaurants.index') }}">
                                  {{-- Card Image --}}
                                  <img src="{{ asset('images/tacos.jpg') }}" class="card-img-top shadow-sm"
                                      alt="Cucina-Messico">
                                  <div class="mt-2">
                                      {{-- Card title --}}
                                      <h5 class="card-title text-capitalize">Cucina messicana</h5>
                                  </div>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-4 col-md-6 mb-4">
                          <div>
                              <a href="{{ route('restaurants.index') }}">
                                  {{-- Card image --}}
                                  <img src="{{ asset('images/fastfood.jpg') }}" class="card-img-top shadow-sm"
                                      alt="Fast-food">
                                  <div class="mt-2">
                                      {{-- Card title --}}
                                      <h5 class="mt-2">Fast Food</h5>
                                  </div>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-4 col-md-6 mb-4">
                          <div>
                              <a href="{{ route('restaurants.index') }}">
                                  {{-- Card image --}}
                                  <img src="{{ asset('images/pizza.jpg') }}" class="card-img-top shadow-sm"
                                      alt="Pizza">
                                  <div class="mt-2">
                                      {{-- Card title --}}
                                      <h5 class="card-title text-capitalize">Pizza</h5>
                                  </div>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-4 col-md-6 mb-4">
                          <div>
                              <a href="{{ route('restaurants.index') }}">
                                  {{-- Card Image --}}
                                  <img src="{{ asset('images/pasta.jpg') }}" class="card-img-top shadow-sm"
                                      alt="Pasta">
                                  <div class="mt-2">
                                      {{-- Card title --}}
                                      <h5 class="card-title text-capitalize">Cucina italiana</h5>
                                  </div>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-4 col-md-6 mb-4">
                          <div>
                              <a href="{{ route('restaurants.index') }}">
                                  {{-- Card Image --}}
                                  <img src="{{ asset('images/pesce.jpg') }}" class="card-img-top shadow-sm"
                                      alt="Frittura-di-pesce">
                                  <div class="mt-2">
                                      {{-- Card title --}}
                                      <h5 class="card-title text-capitalize">Pesce</h5>
                                  </div>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-4 col-md-6 mb-4">
                          <div>
                              <a href="{{ route('restaurants.index') }}">
                                  {{-- Card Image --}}
                                  <img src="{{ asset('images/kebab.jpg') }}" class="card-img-top shadow-sm"
                                      alt="Kebab">
                                  <div class="mt-2">
                                      {{-- Card title --}}
                                      <h5 class="card-title text-capitalize">Kebab</h5>
                                  </div>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-4 col-md-6 mb-4">
                          <div>
                              <a href="{{ route('restaurants.index') }}">
                                  {{-- Card Image --}}
                                  <img src="{{ asset('images/vietnamita.jpg') }}" class="card-img-top shadow-sm"
                                      alt="Cucina-Vietnam">
                                  <div class="mt-2">
                                      {{-- Card title --}}
                                      <h5 class="card-title text-capitalize">Cucina vietnamita</h5>
                                  </div>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          {{-- SECTION SUGGESTED --}}
          <section id="suggested" class="m-5">
              <div class="container">
                  <h2 class="mb-4">Cerchi qualcos'altro?</h2>
                  @foreach ($types as $type)
                      <a href="{{ route('restaurants.index', ['category' => $type]) }}"
                          class="btn btn-secondary px-2 m-2">{{ $type->name }}</a>
                  @endforeach
              </div>
          </section>
      </main>


      <script>
          //recupero elementi pagina
          const sideNavBarElem = document.getElementById("mySidenav");
          const rootElem = document.getElementById("root");
          const bodyElem = document.querySelector('body');

          //open function
          function openNav() {
              sideNavBarElem.style.width = "375px";
              rootElem.style.overflow = "hidden";
              //ritardo aggancio event listener finchè la sidebar non si apre
              setTimeout(function() {
                  bodyElem.addEventListener('click', bodyNavListener);
              }, 500);
          }
          //close function
          function closeNav() {
              sideNavBarElem.style.width = "0";
              rootElem.style.overflow = "auto";
              bodyElem.removeEventListener('click', bodyNavListener);
          }

          function bodyNavListener() {
              if (sideNavBarElem.style.width !== "0") {
                  closeNav();
              }
          }

          //stoppo propagazione evento
          sideNavBarElem.addEventListener('click', function(event) {
              event.stopPropagation();
          })
      </script>
  </body>

  </html>
