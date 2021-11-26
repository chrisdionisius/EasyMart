<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Kategori;
use App\ProdukImage;
use Illuminate\Http\Request;
use App\Http\Requests\ProductImageRequest;

use Str;
use Auth;
use DB;
use Session;

class ProdukController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'produk';
        $this->data['currentAdminSubMenu'] = 'tambah';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['produks'] = Produk::orderBy('nama', 'ASC')->paginate(10);

        return view('admin.products.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::pluck('nama', 'id');

        $this->data['kategoris'] = $kategoris;
        $this->data['produk'] = null;
        $this->data['produkID'] = 0;
        $this->data['categoryIDs'] = [];

        return view('admin.products.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['stok' => '0']);
        $params = $request->except('_token');

        if (Produk::create($params)) {
            Session::flash('success', 'Product has been saved');
        }else {
            Session::flash('error', 'Product could not be saved');
        }

        return redirect('admin/produks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        if (empty($produk)) {
            return redirect('admin/produks/create');
        }

        $kategoris = Kategori::pluck('nama', 'id');

        $this->data['kategoris'] = $kategoris;
        $this->data['produk'] = $produk;
        $this->data['produkID'] = $produk->id;
        $this->data['categoryIDs'] = $produk->kategori->pluck('id')->toArray();

        return view('admin.products.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $params = $request->except('_token');

        if ($produk->update($params)) {
            Session::flash('success', 'Produk berhasil diperbaharui');
        }

        return redirect('admin/produks');
    }

    public function updateStok($request)
    {
        $productInventory = Produk::where('id', '=', $request['produk_id'])->firstOrFail();
        
        if ($request['jenis'] == 1) {
            $productInventory->stok += $request['jumlah'];
        }else{
            $productInventory->stok -= $request['jumlah'];
        }
        $productInventory->save();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if ($produk->delete()) {
            Session::flash('success', 'Produk berhasil dihapus');
        }

        return redirect('admin/produks');
    }

    public function images($id)
    {
        if (empty($id)) {
            return redirect('admin/produks/create');
        }

        $produk = Produk::findOrFail($id);

        $this->data['produkID'] = $id;
        $this->data['produkImages'] = $produk->produkImages;

        return view('admin.products.images', $this->data);
    }

    public function add_image($id)
    {
        if (empty($id)) {
            return redirect('admin/produks');
        }

        $produk = Produk::findOrFail($id);

        $this->data['produkID'] = $id;
        $this->data['produk'] = $produk;

        return view('admin.products.image_form', $this->data);
    }

    public function upload_image(ProductImageRequest $request, $id)
    {
        $produk = Produk::findOrFail($id);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $produk->slug . "_" . time();
            $fileName = $name . "." . $image->getClientOriginalExtension();

            $folder = '/uploads/images';
            $filePath = $image->storeAs($folder, $fileName, 'public');

            $params = [
                'produk_id' => $produk->id,
                'path' => $filePath,
            ];

            if (ProdukImage::create($params)) {
                Session::flash('success', 'Image has been uploaded');
            }else {
                Session::flash('error', 'Image could not be uploaded');
            }

            return redirect('admin/produks/' . $id . '/images');
        }
    }

    public function delete_image($id)
    {
        $image = ProdukImage::findOrFail($id);

        if($image->delete()){
            Session::flash('success', 'Image has been deleted');
        }

        return redirect('admin/produks/' . $image->produk->id . '/images');
    }
}