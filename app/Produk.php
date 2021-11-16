<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'kategori_id',
        'nama',
        'harga',
        'stok',
        'keterangan'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }

    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail');
    }

}