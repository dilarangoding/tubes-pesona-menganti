@extends('layouts.front')
@section('title', 'Kuliner')

@section('style')

<style>
  .hero-kuliner {
    margin-top: 40px;
  }

  .title-hero {
    font-size: 38px;
    font-weight: 700;

  }

  .title-hero span {
    color: #007AFF;
    font-weight: 800;

  }

  .img-hero-hero {
    width: 350px;
    height: 300px;
    border-radius: 15px;
    object-fit: cover;
    transform: rotate(3deg);
  }

  .btn-find {
    background-color: #007AFF;
    color: white;
    border-radius: 20px;
    padding: 10px 30px 10px 30px;
  }

  .kuliner {
    margin-top: 100px;
  }


  .title-kuliner {
    font-size: 28px;
    font-weight: 600
  }


  .card-kuliner .card-image {
    width: 100%;
    height: 200px;
    object-fit: cover;

  }

  .card {
    border: 1px solid rgba(84, 84, 84, 1);
  }

  .card-header {
    background-color: #fff;
    border: 0;
    padding: 20px;
  }

  .card-kuliner .card-title {
    color: #000000;
    font-weight: bold;
    font-size: 14px;
  }

  .card-kuliner .badge-tipe {
    color: #919191;
    background: #313031;
    width: 50%;
    font-size: 13px;
    text-align: center;
    border-radius: 20px;
  }

  .card-kuliner .card-button {
    background-color: #000000;
    border-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    display: block;
    margin-top: 10px;
    text-align: center;
  }

  @media screen and (max-width: 480px) {

    .card-mobile {
      margin-top: 20px;
    }

    .img-hero-hero {
      margin-top: 40px;
    }
  }
</style>

@endsection

@section('content')

<section class="hero-kuliner">
  <div class="container">
    <div class="row">
      <div class="col-md-6 ">
        <h2 class="title-hero">
          Hidangan Favorit <br>
          <span>Bersama Keluarga</span>
        </h2>
        <p class="description-hero">
          Hidangan makanan menyediakan beragam hidangan khas Indonesia.
        </p>

        <a href="#kuliner" class="btn btn-find">
          Cari Sekarang
        </a>
      </div>
      <div class="col-md-6">
        <img src="{{ asset('img/kuliner.jpg') }}" class="img-hero-hero">
      </div>
    </div>
  </div>
</section>


<section class="kuliner mb-5" id="#kuliner">
  <div class="container">
    <div class="row">

      <h2 class="title-kuliner">
        Kuliner
      </h2>

    </div>

    <div class="row">

      <div class="col-md-4">

        <form action="{{ route('front.kuliner') }}" method="GET">
          <div class="row">
            <div class="col-5">
              <select name="price" class="form-control">
                <option selected disabled>Range Harga</option>
                <option value="Rp50.000-100.000">Rp50.000-100.000</option>
                <option value="Rp100.000-200.000">Rp100.000-200.000</option>
                <option value="Rp300.000-400.000">Rp300.000-400.000</option>
                <option value="Rp400.000-500.000">Rp400.000-500.000</option>
                <option value="+Rp500.000">+Rp500.000</option>
              </select>
            </div>

            <div class="col-5">
              <select name="distance" class="form-control">
                <option selected disabled>Pilih Jarak</option>
                <option value="0-1Km">0-1Km</option>
                <option value="1-2Km">1-2Km</option>
                <option value="2-3Km">2-3Km</option>
                <option value="3-4Km">3-4Km</option>
                <option value="4-5Km">4-5Km</option>
                <option value="+5Km">+5Km</option>

              </select>
            </div>
            <input type="hidden">
            <div class="col-2">
              <button class="btn btn-primary ">Cari</button>
            </div>
          </div>
        </form>

      </div>
    </div>
    <div class="row mt-3" id="kuliner">

      @forelse($kuliner as $item)
      <div class="col-md-3 col-6">
        <div class="card mb-3 card-kuliner">
          <div class="card-header ">
            <img src="{{ asset('storage/kuliner/' . $item->image) }}" class="card-image" alt="Card 1">
          </div>
          <div class="card-body">
            <p class="badge-tipe">{{ $item->category }}</p>
            <h5 class="card-title">{{ Str::limit($item->name, 15) }}</h5>
            <a target="_link" href="{{ $item->location }}" class="card-button">Lokasi</a>
          </div>
        </div>
      </div>
      @empty
      <div class="col-md-12">
        <div class="alert alert-danger">
          Tidak ada kuliner
        </div>
      </div>
      @endforelse




    </div>
  </div>
</section>



@endsection
@section('js')
<script>
  function addKulinerHash() {
    const currentUrl = window.location.href;
    if (!currentUrl.includes("#kuliner") && currentUrl.includes("?price") || currentUrl.includes("?distance")) {
      const newUrl = currentUrl + "#kuliner";
      window.location.href = newUrl;
    }
  }

  window.addEventListener("load", addKulinerHash);
</script>
@endsection
