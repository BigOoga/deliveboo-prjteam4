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
        @foreach($orders as $order=>$val)
        <h2 class="text-center my-5">Statistiche Ristorante</h2>
            <div class="m-5">
                <canvas id="myChart"> </canvas>
                {{ dd(print($order))}}
                {{-- {{ print_r($val)}} --}}
            </div>
        @endforeach

    </div>

    {{-- <script src="{{ asset('js/chart.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // === include 'setup' then 'config' above ===

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

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
      data: [0, 2, 0, 4, 5, 10, 18, 5, 2, 20, 30, 45],
    }]
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

</body>
