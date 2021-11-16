<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Menu Produk</h2>
    </div>
    <div class="card-body">
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ url('admin/produks/'. $produkID .'/edit') }}">Detail Produk</a>
            <a class="nav-link" href="{{ url('admin/produks/'. $produkID .'/images') }}">Gambar Produk</a>
        </nav>
    </div>
</div>