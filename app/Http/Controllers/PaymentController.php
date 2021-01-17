<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function payment()
    {
        // NOTE: Refactore this controller
        $user = auth()->user();

        $data = [
            'intent' => $user->createSetupIntent(),
            'plans' => [
                'price_1GwXnMAFgA7IL4XP1E2lLb2e' => '4K Quality 6 Screens',
                'price_1GwXnwAFgA7IL4XP4PG7lsDC' => 'FHD Quality 2 Screens',
                'price_1GwXoDAFgA7IL4XPpFNq1eXC' => 'HD Quality 1 Screens',
            ]
        ];
        return view('frontend.payment')->with($data);
    }
    public function subscription(Request $request)
    {
        $paymentMethod = $request->payment_method;
        $plan_id = $request->plan_id;

        $user = auth()->user();

        $user->newSubscription('default', $plan_id)->create($paymentMethod);
        $user->detachRole('user');
        $user->attachRole('premium_user');

        return response([
            'message' => 'success',
            'success_url' => redirect()->intended('/')->getTargetUrl()
        ]);
    }
}
