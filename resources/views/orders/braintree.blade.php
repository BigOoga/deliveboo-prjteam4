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
                        <label for="name">Nome <span style="color: red" class="name-feedback d-none">*Il campo non può
                                essere vuoto.</span></label>
                        <input type="text" class="form-control" id="name">
                        <label for="last_name">Cognome <span style="color: red" class="last-name-feedback d-none">*Il
                                campo non può essere vuoto.</span></label>
                        <input type="text" class="form-control" id="last_name">
                        <label for="address">Indirizzo <span style="color: red" class="address-feedback d-none">*Il campo
                                non può essere vuoto.</span></label>
                        <input type="text" class="form-control" id="address">
                        <label for="phone">Telefono <span style="color: red" class="phone-feedback d-none">*Inserisci un
                                numero di telefono valido.</span></label>
                        <input type="text" class="form-control" id="phone">
                        <label for="email">Email <span style="color: red" class="email-feedback d-none"></span></label>
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
    function validateEmail(email) {
        const re =
            /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    function validatePhone(phone) {
        const re =
            /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/;
        return re.test(String(phone).toLowerCase());
    }

    function validateForm() {
        console.log('Validating form...')
        let isValid = true;
        nameFeedback = document.querySelector('.name-feedback');
        console.log('Validating name...')
        if (name == '') {
            console.log('Name is empty')
            nameFeedback.classList.remove("d-none");
            isValid = false;
        } else {
            nameFeedback.classList.add("d-none");

        }
        console.log('Validating last name...')
        lastNameFeedback = document.querySelector('.last-name-feedback');
        if (last_name == '') {
            console.log('Last name is empty')
            lastNameFeedback.classList.remove("d-none");
            isValid = false;
        } else {
            console.log('Last name is valid')
            lastNameFeedback.classList.add("d-none");
        }
        addressFeedback = document.querySelector('.address-feedback');
        if (address == '') {
            addressFeedback.classList.remove("d-none");
            isValid = false;
        } else {
            addressFeedback.classList.add("d-none");

        }
        phoneFeedback = document.querySelector('.phone-feedback');
        if (phone == '') {
            phoneFeedback.innerText = '*Il campo non può essere vuoto.'
            phoneFeedback.classList.remove("d-none");
            isValid = false;
        } else if (!validatePhone(phone)) {
            phoneFeedback.innerText = '*Inserisci un numero valido.'
            phoneFeedback.classList.remove("d-none");
            isValid = false;
        } else {
            phoneFeedback.classList.add("d-none");

        }
        emailFeedback = document.querySelector('.email-feedback');

        if (email == '') {
            emailFeedback.innerText = '*Il campo non può essere vuoto.'
            emailFeedback.classList.remove("d-none");
            isValid = false;
        } else if (!validateEmail(email)) {
            emailFeedback.innerText = '*Inserisci un indirizzo email valido.'
            emailFeedback.classList.remove("d-none");
            isValid = false;
        } else {
            emailFeedback.classList.add("d-none");

        }
        return isValid;
    }


    let button = document.querySelector('#submit-button');
    braintree.dropin.create({
        authorization: '{{ $token }}',
        container: '#dropin-container'
    }, function(createErr, instance) {
        button.addEventListener('click', function() {

            let name = document.getElementById('name').value.trim();
            let last_name = document.getElementById('last_name').value.trim();
            let phone = document.getElementById('phone').value.replace(/\s+/g, '');
            let address = document.getElementById('address').value.trim();
            let email = document.getElementById('email').value.trim();
            const currentOrder = JSON.parse(sessionStorage.getItem("order"));
            const delivery_fee = currentOrder.delivery_fee;
            let arr_id = [];
            currentOrder.dishes.forEach(dish => {
                arr_id.push(dish.dish_id);
            });
            let arr_quant = [];
            currentOrder.dishes.forEach(dish => {
                arr_quant.push(dish.quantity);
            });







            console.log(`NAME:${name}`);
            console.log(`LAST NAME:${last_name}`);
            console.log(`PHONE: ${phone}`);
            console.log(`ADDRESS: ${address}`);
            console.log(`EMAIL: ${email}`);
            console.log(`IDS: ${arr_id}`);
            console.log(`QUANTS: ${arr_quant}`);

            if (validateForm()) {
                instance.requestPaymentMethod(function(err, payload) {
                    (function($) {
                        $(function() {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $(
                                            'meta[name="csrf-token"]')
                                        .attr('content')
                                }

                            });
                            $.ajax({
                                type: "POST",
                                url: "{{ route('token') }}",
                                data: {
                                    nonce: payload.nonce,
                                    name: name,
                                    phone: phone,
                                    delivery_fee: delivery_fee,
                                    address: address,
                                    email: email,
                                    last_name: last_name,
                                    arr_id: arr_id,
                                    arr_quant: arr_quant
                                },
                                success: function(data) {
                                    console.log('success', payload
                                        .nonce)
                                    sessionStorage.removeItem('order');
                                    sessionStorage.removeItem('cart');
                                    window.location.replace(
                                        '/payment/success');
                                },
                                error: function(data) {
                                    console.log('error', payload.nonce)
                                }
                            });
                        });
                    })(jQuery);
                });
            }
        });
    });
</script>

</html>
