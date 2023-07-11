<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
    </style>
    </head>
   <body>
   
   <div class="container d-flex align-items-center justify-content-center vh-100">
         <div class="card">
            <div class="card-body">
               <h3 class="text-capitalize text-muted text-center">SELAMAT DATANG</h3>
   @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('failed') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('register-proses') }}" method="POST">
        @csrf
        <br>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Nama :</label>
            <div class="col-md-6">
                <input type="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan name Anda" value="{{ old('name') }}"> 
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>    
        </div>       

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email  :</label>
            <div class="col-md-6">
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email Anda" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password    :</label>
            <div class="col-md-6">
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password Anda" value="{{ old('password') }}"> 
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        
   <a href="{{'login'}}">Sign In</a>
   <button type="submit" class="btn btn-primary text-capitalize">Daftar</button>
      
               </form>
            </div>
         </div>
      </div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
