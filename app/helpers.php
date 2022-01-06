<?php

#check the cookies and the db to decide whether this is an existing user
/*
 * cookies:
 * user_id
 */

use App\Models\User;
use Illuminate\Support\Facades\Cookie;
