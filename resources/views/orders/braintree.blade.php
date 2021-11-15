<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Braintree drop-in --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container" id="checkout">
        <div class="row">

            <div class="col-3 py-3">
                {{-- formnew --}}
                <form>
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name">
                        <label for="last_name">Cognome</label>
                        <input type="text" class="form-control" id="last_name">
                        <label for="address">Indirizzo</label>
                        <input type="text" class="form-control" id="address">
                        <label for="phone">Telefono</label>
                        <input type="text" class="form-control" id="phone">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                </form>
            </div>

            <div class="col-6">
                <div class="row">
                    {{-- BRAINTREE TEST --}}

                    <div class="py-12">
                        @csrf
                        <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;">
                        </div>
                        <div style="display: flex;justify-content: center;align-items: center; color: white">
                            <a id="submit-button" class="btn btn-sm btn-success">Submit payment</a>
                        </div>
                        {{-- BRAINTREE TEST --}}

                    </div>
                </div>
            </div>
        </div>
        <div id="app" class="row">
            {{-- Riepologo carrello qui --}}
            <Receipt></Receipt>
        </div>


</body>
<script>
    let button = document.querySelector('#submit-button');
    braintree.dropin.create({
        // Insert your tokenization key here
        authorization: '{{ $token }}',
        container: '#dropin-container'
    }, function(createErr, instance) {
        button.addEventListener('click', function() {

            let name = document.getElementById('name').value;
            let last_name = document.getElementById('last_name').value;
            let phone = document.getElementById('phone').value;
            let address = document.getElementById('address').value;
            let email = document.getElementById('email').value;
            const currentOrder = JSON.parse(sessionStorage.getItem("order"));
            let arr_id = [];
            currentOrder.dishes.forEach(dish => {
                arr_id.push(dish.dish_id);
            });
            let arr_quant = [];
            currentOrder.dishes.forEach(dish => {
                arr_quant.push(dish.quantity);
            });

            let total = currentOrder.total;
            console.log(name);
            console.log(last_name);
            console.log(phone);
            console.log(address);
            console.log(email);
            console.log(total);
            console.log(arr_id);
            console.log(arr_quant);

            instance.requestPaymentMethod(function(err, payload) {
                (function($) {
                    $(function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                    .attr('content')
                            }

                        });
                        $.ajax({
                            type: "POST",
                            url: "{{ route('token') }}",
                            data: {
                                nonce: payload.nonce,
                                amount: total,
                                name: name,
                                phone: phone,
                                address: address,
                                email: email,
                                last_name: last_name,
                                arr_id: arr_id,
                                arr_quant: arr_quant
                            },
                            success: function(data) {
                                console.log('success', payload.nonce)
                            },
                            error: function(data) {
                                console.log('error', payload.nonce)
                            }
                        });
                    });
                })(jQuery);
            });
        });
    });
</script>

</html>
