@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="d-flex align-items-center justify-content-between my-3">                
            <h3 style="vertical-align: middle" class="d-inline-block self-align-center">Le tue statistiche</h3>
            {{-- Bottone torna indietro --}}
            <a href="{{ route('restaurants.dashboard') }}" class="btn btn-primary">
                Torna indietro</a>
        </div>

        <div class="rounded w-100 p-3 bg-light mx-auto">
            {{-- Grafico --}}
            <canvas id="myChart"></canvas>
        </div>


    </div>

    <script type="application/javascript">
        var sales = {!! $orders !!};
        // Labek mensilità
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
                //setto a 0 ogni mese
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            }]
        };
        // ciclo per stampa dati per mese
        sales.forEach(saleGroup => {
            data.datasets[0].data[saleGroup.month - 1] = saleGroup.sales;
        });

        // stampa della linea a pari passo dei dati
        const config = {
            type: 'line',
            data: data,
            options: {}
        };

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
