<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AWSController extends Controller
{
    public function handle_bounces(Request $request){
        //SubscriptionConfirmation, Notification and UnsubscribeConfirmation
        if ($request->header('x-amz-sns-message-type') === 'SubscriptionConfirmation '){

            $body = $request->json();
            $subscribeURL = $body['SubscribeURL'];
            Http::get($subscribeURL);
            Log::debug('bounce confirmation: ');
            Log::debug($body);
        }
    }

    public function handle_complaints(Request $request){
        //SubscriptionConfirmation, Notification and UnsubscribeConfirmation
        if ($request->header('x-amz-sns-message-type') === 'SubscriptionConfirmation '){

            $body = $request->json();
            $subscribeURL = $body['SubscribeURL'];
            Http::get($subscribeURL);
            Log::debug('complaints confirmation: ');
            Log::debug($body);
        }
    }

    public function handle_deliveries(Request $request){
        //SubscriptionConfirmation, Notification and UnsubscribeConfirmation
        if ($request->header('x-amz-sns-message-type') === 'SubscriptionConfirmation '){

            $body = $request->json();
            $subscribeURL = $body['SubscribeURL'];
            Http::get($subscribeURL);
            Log::debug('complaints confirmation: ');
            Log::debug($body);
        }
    }
}