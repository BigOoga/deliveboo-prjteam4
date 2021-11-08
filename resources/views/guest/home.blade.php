<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Boolpress</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

       
    </head>
    <body>
       
            <div id="root">

                {{-- Header --}}
                <header>
                    <!-- Image and text -->
                    <nav class="navbar navbar-light d-flex justify-content-space-between container">
                        <div>
                            <a class="navbar-brand" href="#">
                                <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="Logo">
                                Deliveboo
                            </a>
                        </div>
                        <div>
                            <a href="#">carrello</a>
                            <a href="#">accedi</a>
                            <a href="#">menu</a>
                        </div>
                    </nav>
                </header>

                {{-- Main --}}
                <main></main>

                {{-- Footer --}}
                <footer></footer>


            </div>

            <script src="{{ asset('js/front.js')}}">

            </script>
        
    </body>
</html>
