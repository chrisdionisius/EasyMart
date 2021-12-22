<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'produk_id',
        'qty',
        'total'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'produk_id');
    }

}
