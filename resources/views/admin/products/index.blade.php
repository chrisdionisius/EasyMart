@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Produk</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($produks as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->nama }}</td>
                                <td>{{ $product->kategori->nama}}</td>
                                <td>Rp {{ number_format($product->harga, 2) }}</td>
                                <td>
                                    <a href="{{ url('admin/produks/'. $product->id .'/edit') }}"
                                        class="btn btn-warning btn-sm">edit</a>

                                    {!! Form::open(['url' => 'admin/produks/'. $product->id, 'class' => 'delete',
                                    'style' => 'display:inline-block']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $produks->links() }}
                </div>
                <div class="card-footer text-right">
                    <a href="{{ url('admin/produks/create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection