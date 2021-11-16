@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Kategori Produk</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($kategoris as $kategori)
                            <tr>
                                <td>{{ $kategori->id }}</td>
                                <td>{{ $kategori->nama }}</td>
                                <td>
                                    <a href="{{ url('admin/kategoris/'. $kategori->id .'/edit') }}"
                                        class="btn btn-warning btn-sm">edit</a>

                                    {!! Form::open(['url' => 'admin/kategoris/'. $kategori->id, 'class' => 'delete',
                                    'style' => 'display:inline-block']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $kategoris->links() }}
                </div>
                <div class="card-footer text-right">
                    <a href="{{ url('admin/kategoris/create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection