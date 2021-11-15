<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BraintreeController extends Controller
{

    public function token(Request $request)
    {

        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'jgvy755pfvwdcjzx',
            'publicKey' => 'qqpm93srfgwtx6dp',
            'privateKey' => 'd13ce21a7642606db73b12bb1300d3fd'
        ]);

        $clientToken = $gateway->clientToken()->generate();



        if ($request->input('nonce') != null) {


            $request->validate([
                'name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'email' => 'email:rfc',
                'amount' => 'required',
            ]);




            var_dump($request->input('nonce'));
            $nonceFromTheClient = $request->input('nonce');
            $amount = $request->input('amount');
            $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
            return view('orders.dashboard');
        }

        return view('orders.braintree', ['token' => $clientToken]);
    }
}
