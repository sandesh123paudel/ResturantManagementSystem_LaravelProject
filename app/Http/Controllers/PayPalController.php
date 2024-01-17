<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function cancel(Request $request)
    {
        dd($request);
    }
    
    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response= $provider->capturePaymentOrder($request['token']);
        if ($response['status'] == "COMPLETED") {
            $notification = [
                'message' => 'Order Placed Successfully',
                'alert-type' => 'success',
            ];

            // DB::commit();
            return redirect('/')->with($notification);
        } else {
            // Handle payment not completed
            // Redirect to an error page or take appropriate action
        }
    }
}
