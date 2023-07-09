<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Mail\PaymentSuccessNotification;
use App\Models\Job;
use App\Models\Notification;
use App\Models\PayPalPayment;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class EmployerPaypalOrderPaymentController extends Controller
{
    public function payorder($slug)
    {
        $job = Job::where('slug', $slug)->where('user_id', auth()->user()->id)->first();
        if ($job) {

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => url('employer/paypal-payment-success/' . $slug),
                    "cancel_url" => url('employer/paypal-payment-cancel/' . $slug),
                ],

                "purchase_units" => [
                    // "reference_id" => "1",
                    // "description" => "Your Order has a title of  #" . $order->order_title,
                    // "custom_id" => "Order  ID #" . $order->order_id,
                    // "amount" => [
                    //     "value" => $order->total_price,
                    //     "currency_code" => "USD",
                    // ],
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => rand(50, 70),
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
dd('something went wrong');
                // return redirect('client/order-attachments/' . $slug)->with('error', 'Something went wrong, please try again');
            } else {
                dd($response['message'] ?? 'Something went wrong, please try again');
                // return redirect('client/order-attachments/' . $slug)->with('error', $response['message'] ?? 'Something went wrong, please try again');
            }
        } else {
            Toastr::warning('We cannot retrieve your order details.', 'Warning',  ["positionClass" => "toast-top-right"]);
            return to_route('employer.alljobs');
        }
    }
    public function paymentsuccess(Request $request, $slug)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $order = Job::where('slug', $slug)->where('user_id', auth()->user()->id)->first();
            $order->status = 'inprogress';
            // if($order->time_allocated == null){
            //     $order->special_deadline_time = Carbon::now()->addHours($order->special_deadline);
            // }else{
            //     $order->order_deadline_time = Carbon::now()->addHours($order->time_allocated);
            // }
            $order->save();
            // dd($response);
            $newrecord = new PayPalPayment();
            $newrecord->payment_id = $response['id'];
            $newrecord->payer_id = auth()->user()->id;
            $newrecord->order_id = $order->id;
            $newrecord->payment_status = $response['status'];
            $newrecord->country_code = $response['payer']['address']['country_code'];
            $newrecord->payment_email = $response['payer']['email_address'];
            $newrecord->payment_amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $newrecord->payment_currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $newrecord->save();

            $notification = new Notification();

            $notification->receiver_id = auth()->user()->id;
            $notification->sender_id = 5;
            $notification->data = "Order #" . $order->order_id . " has been paid " . $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'] . " USD";
            $notification->save();

            $receiver = auth()->user()->name;
            $sender = User::find(5);
            $message = "Order #" . $order->id . " has been paid " . $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'] . " USD";
            Mail::to($receiver->email)->queue(new PaymentSuccessNotification($sender, $receiver, $message, $order));
            Toastr::success('Payment has been successfully completed. Your order will be worked on immediately.', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect('client/my-orders');
        } else {
            return redirect()->back()->with('error', $response['message'] ?? 'Something went wrong,');
        }
    }
    public function paymentcancel(Request $request, $slug)
    {
        Toastr::error('Payment Cancelled', 'Error', ["positionClass" => "toast-top-right"]);
        return redirect('client/order-attachments/' . $slug);
    }
}
