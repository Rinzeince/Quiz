@extends('layouts.app')
@section('content')
<body>
  <br>
<div class="container">
<div class="card" style="width: 65rem; font-family: 'Times New Roman', Times, serif;">
  <div class="card-header ">
    <h1>FORM Create Data</h1>
    </div>
    <div class="card-body">
      <a class="btn btn-sm btn-primary" href="{{ '/product' }}" type="button">Kembali</a>
      <form method="POST" action="{{ '/product/store' }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group row">
          <label for="photo" class="col-md-4 col-form-label text-md-right">Photo Produk</label>
          <div class="col-md-6">
          <input type="file" name="photo" id="photo" value="{{ old('photo') }}" class="form-control @error('photo') is-invalid @enderror">
          @error('photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        </div>
        <br>

        <input type="hidden" name="id" id="id" class="@error('id') is-invalid @enderror" >
        <div class="form-group row">
          <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>
          <div class="col-md-6">
          <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
          @error('nama')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
          <div class="col-md-6">
          <input type="text" name="status" id="status" value="{{ old('status') }}" class="form-control @error('status') is-invalid @enderror">
          @error('status')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="stok" class="col-md-4 col-form-label text-md-right">Stok</label>
          <div class="col-md-6">
          <input type="text" name="stok" id="stok" value="{{ old('stok') }}" class="form-control @error('stok') is-invalid @enderror">
          @error('stok')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        </div>
        <br>

        <div class="form-group row">
          <label for="harga" class="col-md-4 col-form-label text-md-right">Harga</label>
          <div class="col-md-6">
          <input type="text" name="harga" id="harga" value="{{ old('harga') }}" class="form-control @error('harga') is-invalid @enderror">
          @error('harga')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        </div>
        <br>

        <button type="submit" class="btn btn-sm btn-primary">Save Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
