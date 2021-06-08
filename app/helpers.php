<?php

#check the cookies and the db to decide whether this is an existing user
/*
 * cookies:
 * user_id
 */

use App\Models\User;
use Illuminate\Support\Facades\Cookie;

function loginOrCreate(){
    $u_id_cookie = request()->cookie('user_id');
    if ($u_id_cookie and $user=User::find($u_id_cookie)){
        return $user;
    }else{
        # first create this user
        $user=User::create();

        # set the user_id cookies
        $minutes=30*24*60;  # remember a user for a month
        Cookie::queue('user_id', $user->id, $minutes);
        return $user;
    }
}