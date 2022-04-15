<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id');//punya
    }

    public function buyer()
    {
        return $this->belongsTo('App\Buyer','buyer_id');//punya
    }

    public function medicines()
    {
        return $this->belongsToMany('App\Medicine')//memiliki banyak
                    ->withPivot('quantity','price');
    }
}
