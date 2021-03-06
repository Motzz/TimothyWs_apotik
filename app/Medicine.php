<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    //untuk ambil kategori
    protected $table='medicines';
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
    public function transactions()
    {
        return $this->belongsToMany('App\Transaction')
                    ->withPivot('quantity','price');
    }
}
