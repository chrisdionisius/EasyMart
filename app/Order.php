<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'no_order',
        'user_id',
        'grand_total',
        'pembayaran',
        'kembalian'
    ];

    public function produkOrder()
    {
        return $this->hasMany('App\OrderDetail', 'order_id');
    }
}
