<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><strong>ID: </strong>{{$order->id}}</li>
        <li><strong>indirizzo: </strong>{{$order->address}}</li>
        <li><strong>nome: </strong>{{$order->user_name}}</li>
        <li><strong>cognome: </strong>{{$order->user_surname}}</li>
        <li><strong>telefono: </strong>{{$order->phone}}</li>
        <li><strong>email: </strong>{{$order->email}}</li>
        <li><strong>totale: </strong>{{$order->total}}</li>
        <li>{{$order->created_at}}</li>
        <form action="{{ route('orders.destroy', $order)}}"
        method="post">
        @csrf
            @method('DELETE')
            <input type="submit" value="elimina">
        </form>
        <li><a href="{{route('orders.index')}}">torna all'indice</a></li>
         <br>
    </ul>
</body>
</html>