@extends('layouts.admin')
@section('title', 'Tambah Kuliner')


@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Kuliner</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Tambah Kuliner</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <form action="{{ route('admin.kuliner.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah</h3>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="name">Nama Kuliner</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" >
                <p class="text-danger">{{ $errors->first('name') }}</p>
              </div>

              <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" class="form-control" name="location" value="{{ old('location') }}" >
                <p class="text-danger">{{ $errors->first('location') }}</p>
              </div>

              <div class="form-group">
                <div class="form-group">
                  <label for="distance">Jarak</label>
                  <select name="distance" id="distance" class="form-control" >
                    <option selected disabled>Pilih Jarak</option>
                    <option value="0-1Km">0-1Km</option>
                    <option value="1-2Km">1-2Km</option>
                    <option value="2-3Km">2-3Km</option>
                    <option value="3-4Km">3-4Km</option>
                    <option value="4-5Km">4-5Km</option>
                    <option value="+5Km">+5Km</option>
                  </select>
                  <p class="text-danger">{{ $errors->first('distance') }}</p>
                </div>
              </div>

              <div class="form-group">
                <label for="price">Range Harga</label>
                <select name="price" id="price" class="form-control" >
                  <option selected disabled>Pilih Range Harga</option>
                  <option value="Rp50.000-100.000">Rp50.000-100.000</option>
                  <option value="Rp100.000-200.000">Rp100.000-200.000</option>
                  <option value="Rp300.000-400.000">Rp300.000-400.000</option>
                  <option value="Rp400.000-500.000">Rp400.000-500.000</option>
                  <option value="+Rp500.000">+Rp500.000</option>
                </select>
                <p class="text-danger">{{ $errors->first('price') }}</p>
              </div>

              <div class="form-group">
                <label for="category">Kategori</label>
                <input type="text" class="form-control" name="category" value="{{ old('category') }}" >
                <p class="text-danger">{{ $errors->first('category') }}</p>
              </div>

              <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" class="form-control" name="image" value="{{ old('image') }}" >
                <p class="text-danger">{{ $errors->first('image') }}</p>
              </div>

              <div class="form-group">
                <button class="btn btn-primary btn-block">
                  Simpan
                </button>
              </div>

            </div>
          </div>
        </div>

      </div>

    </form>
  </div>
</section>
@endsection
