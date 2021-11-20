@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="justify-content-between m-3">
            <div><a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary p-2 mr-3 my-1">Torna
                    indietro</a>
                <h3 style="vertical-align: middle" class="d-inline-block self-align-center pl-3 mx-3">Statistiche Ristorante
                </h3>
            </div>
        </div>

        <div class="m-5 rounded p-3 bg-light">
            <canvas id="myChart"></canvas>
        </div>


    </div>

    <script type="application/javascript">
        var sales = {!! $orders !!};
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
        let data = {
            labels: labels,
            datasets: [{
                label: 'Vendite mensili',
                backgroundColor: 'rgb(5, 29, 161)',
                borderColor: 'rgb(5, 29, 161)',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            }]
        };
        // </block:setup>


        sales.forEach(saleGroup => {
            data.datasets[0].data[saleGroup.month - 1] = saleGroup.sales;
        });




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

@endsection
