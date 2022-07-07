<?php

namespace App\Http\Controllers;
//use Session;
use Stripe;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function stripe()
    {
        //dump(config()->all());
        return view('stripe');  
    }

    public function stripePost(Request $request)
    {
        dd($request->All());

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100*100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "This is test payment",
        ]);
   
        session()->flash('success', 'Payment Successful !');
           
        return back();
    }
}
