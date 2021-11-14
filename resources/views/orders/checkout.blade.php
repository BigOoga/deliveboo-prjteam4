<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Braintree drop-in --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container" id="app">
        <div class="row">
            <div class="col-6">
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
                    <input type="submit" value="invia">
                </form>
            </div>

            <div class="col-6">
                <div class="row">
                    {{-- BRAINTREE TEST --}}

                    <div class="col-6">
                        <div id="dropin-container"></div>
                        <button id="submit-button">Request payment method</button>
                    </div>

                    {{-- BRAINTREE TEST --}}

                </div>
            </div>
        </div>
    </div>


</body>
<script>
    let button = document.querySelector("#submit-button");

    braintree.dropin.create({
        authorization: '{{ $token }}',
        container: "#dropin-container"
    }, function(createErr, dropin) {
        if (createErr) {
            console.log(createErr);
        }
        button.addEventListener('click', function() {
            dropin.requestPaymentMethod(function(requestPaymentMethodErr, payload) {
                if (requestPaymentMethodErr) {
                    console.log(requestPaymentMethodErr);
                }
                console.log(payload);
            });
        });
    });
</script>

</html>
