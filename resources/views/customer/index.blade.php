@extends('layouts.app')

@section('content')
    <div class="container" style="margin-left: 60px;">
    <a href="{{ '/product/create' }}" class="btn btn-primary btn-sm text-capitalize">+ Tambah Data</a>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($products as $index => $product)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/photo-product/'.$product->image) }}" class="card-img-top" alt="Product Image" width="100" height="250">
                            <h5 class="card-title">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->status }}</p>
                            <p class="card-text">Stok: {{ $product->stok }}</p>
                            <p class="card-text">Harga: Rp {{ $product->harga }}.000</p>
                            <form action="{{ route('products.add', ['product' => $product->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="number" name="qty" value="1" min="1">
                                <button type="submit" class="btn btn-primary">Beli Sekarang</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="{{ '/product/edit/'.$product->id }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{'/product/delete/'.$product->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Data ini akan terhapus, lanjutkan?')">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection