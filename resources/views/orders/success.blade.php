<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>Success!</title>
</head>

<body>
    <h1>Ordine avvenuto con successo</h1>
    <a href="{{route('restaurants.index')}}" class="btn btn-primary rounded">Ritorna ai ristoranti</a>
</body>

</html>
