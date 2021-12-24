@extends('admin.layout')

@section('content')

@php
$formTitle = !empty($kategori) ? 'Update' : 'New'
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>{{ $formTitle }} kategori</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($kategori))
                    {!! Form::model($kategori, ['url' => ['admin/kategoris', $kategori->id], 'method' => 'PUT']) !!}
                    {!! Form::hidden('id') !!}
                    @else
                    {!! Form::open(['url' => 'admin/kategoris']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('nama', 'Nama') !!}
                        {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'nama
                        kategori','required' => 'required']) !!}
                    </div>
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Save</button>
                        <a href="{{ url('admin/kategoris') }}" class="btn btn-secondary btn-default">Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection