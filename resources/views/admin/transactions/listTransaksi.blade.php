@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Transaksi</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>#ID</th>
                            <th>Produk</th>
                            <th>User</th>
                            <th>Jenis</th>
                            <th>Jumlah Awal</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                        </thead>
                        <tbody>
                            @forelse ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $transaksi->id }}</td>
                                <td>{{ $transaksi->produk->nama }}</td>
                                <td>{{ $transaksi->user->name }}</td>
                                @if($transaksi->jenis == 1)
                                <td>
                                    <div class="bg-primary text-white" align="center">Barang masuk</div>
                                </td>
                                @else
                                <td>
                                    <div class="bg-success text-white" align="center">Barang keluar</div>
                                </td>
                                @endif
                                <td>{{ $transaksi->jumlah_awal }}</td>
                                <td>{{ $transaksi->jumlah }}</td>
                                <td>{{ $transaksi->created_at }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $transaksis->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection