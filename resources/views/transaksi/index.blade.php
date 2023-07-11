@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
<div class="container" style="margin-left: 60px;">
<div class="card" style="width: 65rem; font-family: 'Times New Roman', Times, serif;">
  <div class="card-header ">
    <h4>DAFTAR TRANSAKSI</h4>
    
    </div>
    <div class="card-body" >
    <form action="{{ route('transaksi.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari transaksi...">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>
    
    <a href="{{'/product' }}" class="btn btn-primary">Kembali</a>
    <table class="table table-hover">
        <thead class="table-primary">
            
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Id Product</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $index => $transaksi)
                <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaksi->notransaksi }}</td>
                <td>{{ $transaksi->product_id }}</td>
                <td>{{ $transaksi-> Qty }}</td>
                <td>Rp {{ $transaksi-> total }}.000</td>
                <td>
                    <a href="{{ '/transaksi/delete/' .$transaksi->id}}" class="btn btn-sm btn-danger" type="button" onclick="return confirm('Data ini akan terhapus, lanjutkan?')">Delete</a>
                    <a href="{{ route('transaksi.detail', ['transaksi' => $transaksi->id]) }}" class="btn btn-sm btn-primary" type="button">Detail</a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>
@endsection
