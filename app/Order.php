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

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail', 'order_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}