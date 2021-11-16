<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

use Str;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'produk';
        $this->data['currentAdminSubMenu'] = 'tambah';
    }
    public function index()
    {
        $this->data['kategoris'] = Kategori::orderBy('nama', 'ASC')->paginate(10);
        return view('admin.categories.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->except('_token');

        if (Kategori::create($params)) {
            Session::flash('success', 'Category has been saved');
        }
        return redirect('admin/kategoris');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $kategori = Kategori::findOrFail($kategori->id);
        $kategoris = Kategori::orderBy('nama', 'asc')->get();

        $this->data['kategoris'] = $kategoris;
        $this->data['kategori'] = $kategori;
        return view('admin.categories.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $params = $request->except('_token');

        if ($kategori->update($params)) {
            Session::flash('success', 'Category has been updated.');
        }

        return redirect('admin/kategoris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {

        if ($kategori->delete()) {
            Session::flash('success', 'Category has been deleted');
        }

        return redirect('admin/kategoris');
    }
}