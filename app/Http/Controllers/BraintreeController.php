<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmationMail;

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
            var_dump($request->input('nonce'));
            $nonceFromTheClient = $request->input('nonce');

            $gateway->transaction()->sale([
                'amount' => '10.00',
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
            
            return view('orders.dashboard');
        }
        
        //TODO: rendere dinamico l'indirizzo mail
                  Mail::to('client@test')->send(new PaymentConfirmationMail());
        return view('orders.braintree', ['token' => $clientToken]);
    }
}
