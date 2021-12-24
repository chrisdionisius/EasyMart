@extends('admin.layout')

@section('content')

@php
$formTitle = !empty($category) ? 'Update' : 'Tambah'
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-4">
            @include('admin.products.product_menus')
        </div>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>{{ $formTitle }} Produk</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($produk))
                    {!! Form::model($produk, ['url' => ['admin/produks', $produk->id], 'method' => 'PUT']) !!}
                    {!! Form::hidden('id') !!}
                    @else
                    {!! Form::open(['url' => 'admin/produks']) !!}
                    @endif

                    <div class="form-group">
                        {!! Form::label('name', 'Nama produk') !!}
                        {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'nama produk',
                        'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('price', 'Harga') !!}
                        {!! Form::text('harga', null, ['class' => 'form-control', 'placeholder' => 'harga','required' =>
                        'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_ids', 'Kategori') !!}
                        {!! Form::select('kategori_id', $kategoris, null, ['placeholder' => 'Pilih Kategori', 'required'
                        => 'required']); !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Deskripsi produk') !!}
                        {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'placeholder' =>
                        'deskripsi', 'required' => 'required']) !!}
                    </div>
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Save</button>
                        <a href="{{ url('admin/produks') }}" class="btn btn-secondary btn-default">Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection