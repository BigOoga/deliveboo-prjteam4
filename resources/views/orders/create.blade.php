<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('orders.store') }}" method="post">
        @csrf

        <div>
            <label for="address">Indirizzo</label>
            <input type="text" name="address" id="address">
            <label for="user_name">Nome</label>
            <input type="text" name="user_name" id="user_name">
            <label for="user_surname">Cognome</label>
            <input type="text" name="user_surname" id="user_surname">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" id="phone">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            <label for="total">Totale</label>
            <input type="text" name="total" id="total">
        </div>
        <div>
            <h4>Ordinazioni:</h4>
            <div>
                <label for="dish_id">ID Piatto:</label>
                <input type="number" class="form-control" name="dish_ids[]" id="dish_id" value="0">
                <label for="quantity">Quantità:</label>
                <input type="number" class="form-control" min="1" name="quantity[]" id="quantity" value="1">
            </div>
            <div>
                <label for="dish_id">ID Piatto:</label>
                <input type="number" class="form-control" name="dish_ids[]" id="dish_id" value="0">
                <label for="quantity">Quantità:</label>
                <input type="number" class="form-control" min="1" name="quantity[]" id="quantity" value="1">
            </div>
            <div>
                <label for="dish_id">ID Piatto:</label>
                <input type="number" class="form-control" name="dish_ids[]" id="dish_id" value="0">
                <label for="quantity">Quantità:</label>
                <input type="number" class="form-control" min="1" name="quantity[]" id="quantity" value="1">
            </div>
        </div>

        <input type="submit" value="invia">
    </form>
</body>

</html>
