<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RemoteMerge\Esewa\Client;
// Init composer autoloader.
require '../vendor/autoload.php';


class EsewaController extends Controller
{
    public function esewaPay(Request $request)
    {
        $pid = uniqid();
        // create order
        Order::create([
            'user_id' => 1,
            'name' => $request->name,
            'email' => $request->email,
            'product_id' => $pid,
            'amount' => $request->amount,
            'esewa_status' => false
        ]);

        // Set success and failure callback URLs.
        $successUrl = url('/success');
        $failureUrl = url('/failure');

        // Initialize eSewa client for development.
        $esewa = new Client([
            'merchant_code' => 'EPAYTEST',
            'success_url' => $successUrl,
            'failure_url' => $failureUrl,
        ]);

        // make payment
        $esewa->payment($pid, $request->amount, 0, 0, 50);
    }

    public function esewaPaySuccess()
    {
        //do when pay success.
        $pid = $_GET['oid'];
        $refId = $_GET['refId'];
        $amount = $_GET['amt'];

        $order = Order::where('product_id', $pid)->first();
        //dd($order);
        $update_status = Order::find($order->id)->update([
            'esewa_status' => true,
            'updated_at' => Carbon::now(),
        ]);
        if ($update_status) {
            //send mail,....
            //
            $msg = 'Success';
            $msg1 = 'Payment success. Thank you for making purchase with us.';
            return view('thankyou', compact('msg', 'msg1'));
        }
    }



    public function esewaPayFailed()
    {
        //do when payment fails.
        $pid = $_GET['pid'];
        $order = Order::where('product_id', $pid)->first();
        //dd($order);
        $update_status = Order::find($order->id)->update([
            'esewa_status' => 'failed',
            'updated_at' => Carbon::now(),
        ]);
        if ($update_status) {
            //send mail,....
            //
            $msg = 'Failed';
            $msg1 = 'Payment is failed. Contact admin for support.';
            return view('thankyou', compact('msg', 'msg1'));
        }
    }
}
