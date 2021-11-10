<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="border p-5">
            <form action="{{route('orders.store')}}"
            method="post">
            @csrf 
            <div class="mb-2">
                <label for="address">Indirizzo</label>
                <input type="text" name="address" id="address">
            </div>
            <div class="mb-2">
                <label for="user_name">User Name</label>
                <input type="text" name="user_name" id="user_name">
            </div>
            <div class="mb-2">
                <label for="user_surname">User Surname</label>
                <input type="text" name="user_surname" id="user_surname">
            </div>
            <div class="mb-2">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone">
            </div>
            <div class="mb-2">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="mb-2">
                <label for="total">totale</label>
                <input type="text" name="total" id="total">
            </div>
        
            <button type="submit" class="btn btn-outline-success mb-2 mt-2">invia</button>
            <div class="mb-2 mt-2"><a href="{{route('orders.index')}}" class="btn btn-outline-primary">torna all'indice</a></div>

        </form>
        </div>
    </div>
</body>
</html>