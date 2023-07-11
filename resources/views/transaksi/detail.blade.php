@extends('layouts.app')

@section('content')
    <div class="container" style="margin-left: 60px;">
        <div class="card" style="width: 65rem; font-family: 'Times New Roman', Times, serif;">
            <div class="card-header">
                <h4>DETAIL PEMESANAN</h4>
            </div>
            <div class="card-body">
                <p>No Transaksi: {{ $transaksi->notransaksi }}</p>
                @foreach($products as $product)
                    @if($product->id == $transaksi->product_id)
                        <p>Nama Product: {{ $product->nama }}</p> <!-- Menampilkan nama produk -->
                    @endif
                @endforeach
                @foreach($products as $product)
                    @if($product->id == $transaksi->product_id)
                        <p>Harga Product: Rp. {{ $product->harga }}.000</p> <!-- Menampilkan nama produk -->
                    @endif
                @endforeach
                <p>Id Product: {{ $transaksi->product_id }}</p>
                <p>Qty: {{ $transaksi->Qty }}</p>
                <p>Total: Rp {{ $transaksi->total }}.000</p>
                <!-- Tambahkan informasi detail pemesanan lainnya sesuai kebutuhan -->
                <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
