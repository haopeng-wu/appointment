<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public function getPortraitAttribute($value){
        if($value){
            return asset('images/identities/'.$value);
        }else{
            return null;
        }
    }
}
