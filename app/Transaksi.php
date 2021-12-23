<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id',
        'produk_id',
        'jenis',
        'jumlah',
        'jumlah_awal',
    ];

    public function produk()
    {
        return $this->belongsTo('App\Produk');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}