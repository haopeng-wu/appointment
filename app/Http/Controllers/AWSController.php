<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AWSController extends Controller
{
    public function handle_bounces(Request $request){
        Log::debug('In handle_bounces');
        //SubscriptionConfirmation, Notification and UnsubscribeConfirmation
        if ($request->header('x-amz-sns-message-type') === 'SubscriptionConfirmation '){

            $body = $request->json();
            $subscribeURL = $body['SubscribeURL'];
            Http::get($subscribeURL);
            Log::debug('bounce confirmation: ');
            Log::debug($body);
            return 'hello this is handle_bounces';
        }
    }

    public function handle_complaints(Request $request){
        Log::debug('In handle_complaints');
        //SubscriptionConfirmation, Notification and UnsubscribeConfirmation
        if ($request->header('x-amz-sns-message-type') === 'SubscriptionConfirmation '){

            $body = $request->json();
            $subscribeURL = $body['SubscribeURL'];
            Http::get($subscribeURL);
            Log::debug('complaints confirmation: ');
            Log::debug($body);
            return 'hello this is handle_complaints';
        }
    }

    public function handle_deliveries(Request $request){
        Log::debug('In handle_deliveries');
        //SubscriptionConfirmation, Notification and UnsubscribeConfirmation
        Log::debug($request->headers);
        Log::debug($request->url());
        Log::debug($request->json());
        if ($request->header('x-amz-sns-message-type') === 'SubscriptionConfirmation '){

            $body = $request->json();
            $subscribeURL = $body['SubscribeURL'];
            Http::get($subscribeURL);
            Log::debug('complaints confirmation: ');
            Log::debug($body);
            return 'hello this is handle_deliveries';
        }
    }
}