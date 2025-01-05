@extends('layouts.admin')
@section('title', 'Edit Penginapan')


@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Penginapan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Penginapan</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <form action="{{ route('admin.penginapan.update', $penginapan->id) }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit</h3>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="name">Nama Penginapan</label>
                <input type="text" class="form-control" name="name" value="{{ $penginapan->name }}" required>
                <p class="text-danger">{{ $errors->first('name') }}</p>
              </div>

              <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" class="form-control" name="location" value="{{ $penginapan->location }}" required>
                <p class="text-danger">{{ $errors->first('location') }}</p>
              </div>

              <div class="form-group">
                <div class="form-group">
                  <label for="distance">Jarak</label>
                  <select name="distance" id="distance" class="form-control" required>
                    <option selected disabled>Pilih Jarak</option>
                    <option value="0-1Km" {{ $penginapan->distance == '0-1Km' ? 'selected' : '' }}>0-1Km</option>
                    <option value="1-2Km" {{ $penginapan->distance == '1-2Km' ? 'selected' : '' }}>1-2Km</option>
                    <option value="2-3Km" {{ $penginapan->distance == '2-3Km' ? 'selected' : '' }}>2-3Km</option>
                    <option value="3-4Km" {{ $penginapan->distance == '3-4Km' ? 'selected' : '' }}>3-4Km</option>
                    <option value="4-5Km" {{ $penginapan->distance == '4-5Km' ? 'selected' : '' }}>4-5Km</option>
                    <option value="+5Km" {{ $penginapan->distance == '+5Km' ? 'selected' : '' }}>+5Km</option>
                  </select>
                  <p class="text-danger">{{ $errors->first('distance') }}</p>
                </div>
              </div>

              <div class="form-group">
                <label for="price">Range Harga</label>
                <select name="price" id="price" class="form-control" required>
                  <option selected disabled>Pilih Range Harga</option>
                  <option value="Rp50.000-100.000" {{ $penginapan->price == 'Rp50.000-100.000' ? 'selected' : '' }}>Rp50.000-100.000</option>
                  <option value="Rp100.000-200.000" {{ $penginapan->price == 'Rp100.000-200.000' ? 'selected' : '' }}>Rp100.000-200.000</option>
                  <option value="Rp300.000-400.000" {{ $penginapan->price == 'Rp300.000-400.000' ? 'selected' : '' }}>Rp300.000-400.000</option>
                  <option value="Rp400.000-500.000" {{ $penginapan->price == 'Rp400.000-500.000' ? 'selected' : '' }}>Rp400.000-500.000</option>
                  <option value="+Rp500.000" {{ $penginapan->price == '+Rp500.000' ? 'selected' : '' }}>+Rp500.000</option>

                </select>
                <p class="text-danger">{{ $errors->first('price') }}</p>
              </div>

              <div class="form-group">
                <label for="category">Kategori</label>
                <input type="text" class="form-control" name="category" value="{{ $penginapan->category }}" required>
                <p class="text-danger">{{ $errors->first('category') }}</p>
              </div>

              <div class="form-group">
                <label for="image">Gambar</label>
                <br>
                <img src="{{ asset('storage/penginapan/' . $penginapan->image) }}" width="100px" height="100px" alt="{{ $penginapan->name }}">
                <input type="file" class="form-control" name="image" value="{{ old('image') }}">
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
