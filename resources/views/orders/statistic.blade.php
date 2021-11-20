<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>Statistics</title>
</head>

<body>
    <div class="container">

        <h2 class="text-center my-5">Statistiche Ristorante</h2>
        @foreach ($orders as $order)
            <div class="m-5">
                <canvas id="myChart"> </canvas>
                {{-- {{ dd($order.0)}} --}}
            </div>
        @endforeach

    </div>

    <script>
        // <block:setup:1>
        const labels = [
            'Gennaio',
            'Febraio',
            'Marzo',
            'Aprile',
            'Maggio',
            'Giugno',
            'Luglio',
            'Agosto',
            'Settembre',
            'Ottobre',
            'Novembre',
            'Dicembre'
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Vendite mensili',
                backgroundColor: 'rgb(5, 29, 161)',
                borderColor: 'rgb(5, 29, 161)',
                data: [
                    
                ],
            }]
        };
        var sales = $orders;
        for( var i=0; i <= 11; i++){
            if(!sales[i]) {
                
            }
        };

        // </block:setup>

        // <block:config:0>
        const config = {
            type: 'line',
            data: data,
            options: {}
        };
        // </block:config>

        module.exports = {
            actions: [],
            config: config,
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // === include 'setup' then 'config' above ===

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

</body>
