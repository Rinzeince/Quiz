@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>DAFTAR PRODUK TIDAK TERSEDIA</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->nama }}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>Rp {{ $product->harga }}.000</td>
                        <td>                            
                        <a href="{{ '/product/edit/'.$product->id }}" type="button" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
