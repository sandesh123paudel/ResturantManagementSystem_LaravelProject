<?php

namespace App\Service;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PayPalService
{
    public function payment($request)
    {
        $provider = new PayPalClient;
        $token= $provider->getAccessToken();
        $provider->setAccessToken($token);
        $orderPayPal = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.success'),
                "cancel_url" => route('payment.cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->input('totalPrice')
                    ]
                ]
            ]
        ]);
       return $orderPayPal;
    }
}