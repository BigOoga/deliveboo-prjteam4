<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet" type="text/css">
    <title>Success!</title>
</head>

<body>
    <div class="container">
        <div id="order-success" class="position-relative">
            <h1 class="text-center" id="bau" >Ordine completato con successo!</h1>
        </div>
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        <div id="btn-return" class="text-center">
            <a href="{{route('restaurants.index')}}" class="btn btn-primary rounded-pill">Torna ai ristoranti</a> 
        </div>
    </div>
</body>

</html>
