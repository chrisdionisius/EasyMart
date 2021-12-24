<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'transaksi';
        $this->data['currentAdminSubMenu'] = 'tambah';
    }


    public function index()
    {
        $this->data['transaksis'] = Transaksi::orderBy('created_at', 'ASC')->paginate(10);
        $this->data['produks'] = Produk::orderBy('nama', 'ASC')->paginate(10);

        return view('admin.transactions.index', $this->data);
    }

    public function listTransaksi()
    {
        $this->data['currentAdminMenu'] = 'laporan';
        $this->data['currentAdminSubMenu'] = 'tambah';
        $this->data['transaksis'] = Transaksi::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.transactions.listTransaksi', $this->data);
    }

    public function listPenjualan()
    {
        $this->data['currentAdminMenu'] = 'laporan';
        $this->data['currentAdminSubMenu'] = 'tambah';
        $this->data['transaksis'] = Transaksi::where('jenis', 2)->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.transactions.listTransaksi', $this->data);
    }

    public function listRestock()
    {
        $this->data['currentAdminMenu'] = 'laporan';
        $this->data['currentAdminSubMenu'] = 'tambah';
        $this->data['transaksis'] = Transaksi::where('jenis', 1)->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.transactions.listTransaksi', $this->data);
    }

    public function listStock()
    {
        $this->data['currentAdminMenu'] = 'laporan';
        $this->data['currentAdminSubMenu'] = 'tambah';
        $this->data['produks'] = Produk::orderBy('stok', 'DESC')->paginate(10);
        return view('admin.transactions.listStock', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $this->data['produk'] = Produk::find($product_id);
        return view('admin.transactions.form', $this->data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk_id = $request->produk_id;
        $this->data['user_id'] = Auth::user()->id;
        $this->data['produk_id'] = $produk_id;
        $this->data['jenis'] = $request->jenis_transaksi;
        $this->data['jumlah'] = $request->jumlah;
        $this->data['jumlah_awal'] = Produk::where('id', '=', $produk_id)->firstOrFail()->stok;
        Transaksi::create($this->data);
        app('App\Http\Controllers\ProdukController')->updateStok($this->data);
        return redirect('admin/transaksis');
    }

    public function penjualan($request)
    {
        $produk_id = $request->produk_id;
        $this->data['user_id'] = Auth::user()->id;
        $this->data['produk_id'] = $produk_id;
        $this->data['jenis'] = 2;
        $this->data['jumlah'] = $request->qty;
        $this->data['jumlah_awal'] = Produk::where('id', '=', $produk_id)->firstOrFail()->stok;
        Transaksi::create($this->data);
        app('App\Http\Controllers\ProdukController')->updateStok($this->data);
        return redirect('admin/transaksis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}