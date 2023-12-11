<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Xendit\Configuration;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Xendit\Invoice\InvoiceApi;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    var $apiInstance = null;


    public function __construct() {
        global $apiInstance;
        Configuration::setXenditKey("xnd_development_0CJnEAmovQfpGS6QJPy9JXJxNRz8wMbXkBYaR3PC6xXnRsHTvQFETRFxZGr7r");
        $apiInstance = new InvoiceApi();
    }

    public function store(Request $request) {

        global $apiInstance;
        $create_invoice_request = new \Xendit\Invoice\CreateInvoiceRequest([
            'external_id' => (string) Str::uuid(),
            'description' => 'Pemesanan di Delicious Resto',
            'amount' => 15000
          ]);

          $result = $apiInstance->createInvoice($create_invoice_request);

          //save to db
          $payment = new Payment();
          $payment->status = 'pending';
          $payment->checkout_link = $result['invoice_url'];
          $payment->external_id = $create_invoice_request['external_id'];
          $payment->save();

          return Redirect::to($payment->checkout_link);
    }

    public function notification(Request $request) {
        global $apiInstance;
        $result = $apiInstance->getInvoices(null, $request->external_id);

        //get data
        $payment = Payment::where('external_id', $request->external_id)->firstOrFail();

        if ($payment->status == 'settled') {
          return response()->json('Payment anda telah diproses');
        }

        $payment->status = strtolower($result[0]['status']);
        $payment->save();

        // return response()->json('Successs');
        // return response()->json($payment);

        // return Redirect::to('/');
        return redirect('/');

    }

}
