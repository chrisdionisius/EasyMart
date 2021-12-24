<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Transaksi;
use App\Order;
use App\Produk;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['currentAdminMenu'] = 'dashboard';
        $this->data['currentAdminSubMenu'] = 'dashboard';
    }
    function index()
    {
        $this->data['transaksi'] = Transaksi::count();
        $this->data['masuk'] = Transaksi::where('jenis',1)->sum('jumlah');
        $this->data['keluar'] = Transaksi::where('jenis',2)->sum('jumlah');
        $this->data['pemasukan'] = Order::sum('grand_total');
        $this->data['sales'] = Transaksi::where('jenis',2)
                                ->groupBy('produk_id')
                                ->selectRaw('produk_id, sum(jumlah) as jumlah')
                                ->orderBy('jumlah','DESC')
                                ->take(5)
                                ->get();
        $this->data['inventories'] = Produk::take(5)->get();
        return view('admin.dashboard.index',$this->data);
    }
}