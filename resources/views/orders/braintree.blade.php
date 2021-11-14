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
    <div class="container" id="checkout">
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


</body>
<script>
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
        // Insert your tokenization key here
        authorization: '{{ $token }}',
        container: '#dropin-container'
    }, function(createErr, instance) {
        button.addEventListener('click', function() {
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
                                nonce: payload.nonce
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
