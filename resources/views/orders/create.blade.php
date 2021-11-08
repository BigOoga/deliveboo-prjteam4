<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('orders.store')}}"
    method="post">
    @csrf 

    <label for="address">Indirizzo</label>
    <input type="text" name="address" id="address">

    <label for="user_name">User Name</label>
    <input type="text" name="user_name" id="user_name">

    <label for="user_surname">User Surname</label>
    <input type="text" name="user_surname" id="user_surname">

    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone">

    <label for="email">Email</label>
    <input type="text" name="email" id="email">

    <label for="total">totale</label>
    <input type="text" name="total" id="total">

    <input type="submit" value="invia">
</form>
</body>
</html>