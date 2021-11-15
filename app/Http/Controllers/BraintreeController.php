<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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

            //# Storo l'ordine
            $name = $request->input('name');
            $last_name = $request->input('last_name');
            $address = $request->input('address');
            $phone = $request->input('phone');
            $email = $request->input('email');
            $amount = $request->input('amount');
            $arr_id = $request->input('arr_id');
            $arr_quant = $request->input('arr_quant');

            $newOrder = new Order();
            $newOrder->status = 1;
            $newOrder->address = $address;
            $newOrder->user_name = $name;
            $newOrder->user_surname = $last_name;
            $newOrder->phone = $phone;
            $newOrder->email = $email;
            $newOrder->total = $amount;
            $newOrder->save();

            // // storo l'array di IDs
            $arrayLength = count($arr_id);

            // Ciclo una volta per ogni piatto contenuto nell'ordine, salvo la relazione e la sua quantità
            for ($i = 0; $i < $arrayLength; $i++) {
                $dish_id = $arr_id[$i];
                // Scrive nella tabella pivot dopo aver creato la relazione
                $newOrder->dishes()->attach([$dish_id => ['quantity' => $arr_quant[$i]]]);
                //
            }

            //#

            var_dump($request->input('nonce'));
            $nonceFromTheClient = $request->input('nonce');
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
