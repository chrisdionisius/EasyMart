<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama'];

    public function produks()
    {
        return $this->hasMany('App\Produk', 'kategori_id');
    }
}