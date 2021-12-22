<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'produk_id',
        'qty',
        'total'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'produk_id');
    }
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }
}
