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
        <ul class="list-group list-unstyled">
            <div class="border p-5">
                <li class="mb-2"><strong>ID: </strong>{{ $order->id }}</li>
                <li class="mb-2"><strong>Nome: </strong>{{ $order->user_name }}</li>
                <li class="mb-2"><strong>Cognome: </strong>{{ $order->user_surname }}</li>
                <li class="mb-2"><strong>Indirizzo: </strong>{{ $order->address }}</li>
                <li class="mb-2"><strong>Telefono: </strong>{{ $order->phone }}</li>
                <li class="mb-2"><strong>E-mail: </strong>{{ $order->email }}</li>
                <li class="mb-2"><strong>Totale: </strong>{{ $order->total }}</li>
                <li class="mb-2"><strong>Data: </strong>{{ $order->created_at }}</li>

                {{-- tasto torna all'indice --}}
                <li class="mb-2"><a href="{{ route('orders.index') }}" class="btn btn-outline-primary">torna
                        all'indice</a></li>
                {{-- tasto edit --}}
                <li class="mb-2"><a href="{{ route('orders.edit', $order->id) }}"
                        class="btn btn-outline-warning">modifica</a></li>
                {{-- tasto delete --}}
                <form action="{{ route('orders.destroy', $order) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mb-2">elimina</button>
                    <a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary">Torna alla dashboard</a>
                </form>
            </div>
        </ul>
    </div>
</body>

</html>
