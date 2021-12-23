<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\ProdukImage;

class KatalogController extends Controller
{
    public function index()
    {
        $this->data['kategoris'] = Kategori::get();
        $this->data['produks'] = Produk::orderBy('nama', 'ASC')->paginate(6);
        return view('user.katalog', $this->data);
    }
    public function show($id)
    {
        $this->data['produk'] = Produk::findOrFail($id);
        return view('user.produk', $this->data);
    }
    public function dashboard()
    {
        $this->data['produks'] = Produk::orderBy('created_at', 'DESC')->paginate(8);
        return view('user.dashboard', $this->data);
    }
    public function showByCategory($category)
    {
        $this->data['kategoris'] = Kategori::get();
        $this->data['produks'] = Produk::where('kategori_id', '=', $category)->paginate(10);
        return view('user.katalog', $this->data);
    }
}