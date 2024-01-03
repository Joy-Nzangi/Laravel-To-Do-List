<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SmoDav\Mpesa\Laravel\Facades\STK;

class MpesaController extends Controller
{
    private $conf = 'http://example.com/mpesa/confirm?secret=some_secret_hash_key';
    private $val = 'http://example.com/mpesa/validate?secret=some_secret_hash_key';

    //MPESA
    public function stkSimulation(Request $request)
    {
        $phoneNumber = $request->input('phone');

        $response = STK::request(1)
            ->from($phoneNumber)
            ->usingReference('Some Reference', 'Test Payment')
            ->push();

        // Extract the CustomerMessage from the response
        $customerMessage = $response->CustomerMessage;

        // Dump the CustomerMessage for debugging purposes
        dump($customerMessage);
        return view('mpesa.success', ['customerMessage' => $customerMessage]);

        // If you want to return a JSON response with CustomerMessage
        //return response()->json(['customer_message' => $customerMessage]);
    }

    public function BuyGoodsSimulation(Request $request)
    {
        $phoneNumber = $request->input('phone');

        $response = STK::request(1)
            ->from($phoneNumber)
            ->usingReference('Some Reference', 'Test Payment')
            ->setCommand(CUSTOMER_BUYGOODS_ONLINE)
            ->push();

        // Extract the CustomerMessage from the response
        $customerMessage = $response->CustomerMessage;

        // Dump the CustomerMessage for debugging purposes
        dump($customerMessage);

        // If you want to return a JSON response with CustomerMessage
        //return response()->json(['customer_message' => $customerMessage]);
    }

    public function validateSTK()
    {
        // Adjust the merchant reference ID as needed
        $merchantReferenceId = 'ws_CO_16022018125';

        // Use the STK::validate method
        $response = STK::validate($merchantReferenceId);

        // Extract the CustomerMessage from the response
        $customerMessage = $response->CustomerMessage;

        // Dump the CustomerMessage for debugging purposes
        dump($customerMessage);

        // If you want to return a JSON response with CustomerMessage
        //return response()->json(['customer_message' => $customerMessage]);
    }
}


