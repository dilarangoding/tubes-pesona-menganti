<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>
  <link rel="icon" href="{{ asset('img/logo.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    * {
      font-family: 'Inter';
    }

    .navbar {
      background-color: transparent;
    }

    .navbar.sticky-top {
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .navbar-brand {
      color: #09090b99;
    }

    .navbar-scroll .nav-link:hover {
      color: white;
    }


    .navbar-scroll {
      background-color: rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(200px);
      transition: 0.5s ease;
    }

    .navbar-scroll .navbar-brand,
    .navbar-scroll .navbar-nav .nav-link {
      color: white;
    }

    .hero {
      background-image: url({{ asset('img/hero.png')}});
      background-size: cover;
      background-position: center;
      height: 90vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }

    .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 90vh;
      background-color: rgba(0, 0, 0, 0.4);
    }


    .hero .container {
      position: relative;
    }

    .hero .hero-title {
      font-size: 48px;
      font-weight: 800;
      margin-bottom: 20px;
    }

    .hero .hero-text {
      font-size: 18px;
      line-height: 1.6;
      margin-bottom: 40px;
    }

    .btn-hero {
      background-color: white;
      border-radius: 18px;
      padding: 10px 40px 10px 40px;
      font-weight: 600;
    }

    .promo {
      margin-top: 50px;
    }

    .promo .subtitle-promo {
      font-size: 14px;
      letter-spacing: 5px;
    }

    .subtitle-promo span {
      color: #f15c59;
    }

    .promo .title-promo {
      font-size: 28px;
      font-weight: 600
    }

    .promo .text-promo {
      line-height: 2.2rem;
    }


    .btn-order {
      background-color: #000000;
      color: #ffff;
      border-radius: 16px;
      padding: 10px 30px 10px 30px;
      font-weight: 600;
    }

    .btn-order:hover {
      background-color: #000000;
      color: #ffff;
      border-radius: 16px;
      padding: 15px 35px 15px 35px;
      font-weight: 600;
      transition: .5s;
    }

    .btn-explore {
      margin-left: 20px;
      border: 2px solid #000000;
      color: #000000;
      border-radius: 16px;
      padding: 10px 30px 10px 30px;
      font-weight: 600;
    }

    .promo .promo-image {
      width: 400px;
      height: 300px;
      object-fit: cover;
      border-radius: 10px;
    }

    .title-fasilitas {
      font-size: 28px;
      font-weight: 600;
    }

    .fasilitas .card-title {
      font-weight: 700;
    }

    .fasilitas .card-text {
      font-size: 14px;
      color: #09090b99;
    }

    .atv {
      height: 180px;
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

    .penginapan {
      margin-top: 50px;
      background-color: #007AFF;
      padding: 50px;
    }

    .penginapan img {
      border: 2px solid white;
      width: 300px;
      height: 200px;
      object-fit: cover;
      transform: rotate(3deg);
    }

    .penginapan .text-penginapan {
      color: white;
    }

    .penginapan .title-penginapan {
      font-size: 34px;
      font-weight: 600;
      color: white;
    }

    .btn-white {
      background-color: white;
      border-radius: 18px;
      padding: 10px 30px 10px 30px;
      font-weight: 600;
      color: #007AFF;
      font-size: 12px;
    }

    .btn-white-outline {
      border: 1px solid white;
      border-radius: 18px;
      padding: 10px 30px 10px 30px;
      font-weight: 600;
      color: white;
      font-size: 12px;
    }

    footer {
      margin-top: 100px;
      background-color: #09090b;
      padding: 20px;
    }

    @media screen and (max-width: 480px) {
      .container {
        width: 95%;
      }

      .promo-image {
        margin-top: 40px;
      }

      .card-kuliner {
        width: 180px;
      }

      .card-mobile {
        margin-top: 20px;
      }

      .atv {
        width: 520px !important;
      }
    }
  </style>
  @yield('style')
</head>

<body>

  <header class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a href="{{ route('front.index') }}" class="navbar-brand"><img src="{{ asset('img/logo.png') }}" width="60"
          alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="{{ route('front.index') }}" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('booking.index') }}" class="nav-link">Beli Tiket</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('front.penginapan') }}" class="nav-link">Penginapan</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('front.kuliner') }}" class="nav-link">Kuliner</a>
          </li>

          @if (Auth::user())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              @if (Auth::user()->role == 'user')
              <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
              <li><a class="dropdown-item" href="{{ route('user.tiket') }}">Tiket</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
              </li>
              @else
              <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
              </li>
              @endif
            </ul>
          </li>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @else
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">Login</a>
          </li>
          @endif
        </ul>

      </div>
    </div>
  </header>


  <section class="hero">
    <div class="hero-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h1 class="hero-title">
            Journey <br> Pantai Menganti
          </h1>
          <p class="hero-text">Temukan pengalaman wisata alam yang tak terlupakan di Pantai Menganti. Nikmati
            pemandangan yang menakjubkan, udara yang segar, dan berbagai aktivitas menarik.</p>

          <a href="{{ route('booking.index') }}" class="btn btn-hero">Pesan Tiket</a>
        </div>
      </div>
    </div>
  </section>


  <section class="promo">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="subtitle-promo">DAPATKAN DISKON HINGGA <span>75%</span></p>
          <h2 class="title-promo">
            Journey Pesona Menganti
            </h1>
            <p class="text-promo">
              Surga tersembunyi di laut selatan jawa. Nikmati sejuk nya suasana asri Pantai Menganti.
              cocok untuk wisata keluarga, pasangan, atau solo traveler. Pesan Tiket Anda Sekarang!
            </p>

            <a href="{{ route('booking.index') }}" class="btn btn-order">Pesan Tiket!</a>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
          <img src="{{ asset('img/register.png') }}" class="promo-image" alt="">
        </div>
      </div>
    </div>
  </section>


  <section class="fasilitas mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-4">
          <h2 class="title-fasilitas text-center">Fasilitas Kami</h2>
        </div>


        <div class="col-md-6">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('img/mushola.jpg') }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Mushola</h5>
                  <p class="card-text">Memiliki ruang salat yang luas dan bersih, tempat wudhu yang
                    terawat, serta alat salat yang lengkap</p>
                </div>
              </div>
            </div>
          </div>
        </div>

       

     

        <div class="col-md-6">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('img/toilet.jpg') }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Toilet</h5>
                  <p class="card-text">Dilengkapi dengan berbagai fasilitas, seperti toilet,
                    wastafel, air bersih, sabun dan cermin. </p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>




  <section class="penginapan">
    <div class="container">
      <div class="row">
        <div class="col-md-4 ">
          <p class="text-penginapan">
            Dapatkan harga terbaik sekarang juga
          </p>
          <h2 class="title-penginapan ">Penginapan <br> Terdekat <u>Murah.</u></h2>
        </div>
        <div class="col-md-4">
          <img src="{{ asset('img/penginapan.jpg') }}" alt="">
        </div>
        <div class="col-md-4">
          <p class="text-penginapan">
            Kami menawarkan berbagai pilihan penginapan untuk memenuhi kebutuhan Anda, mulai dari vila mewah
            hingga homestay nyaman dan terjangkau.
          </p>
          <a href="{{ route('front.penginapan') }}" class="btn btn-white">Cari Penginapan</a>
          <a href="{{ route('front.penginapan') }}" class="btn btn-white-outline">Pelajari Selengkapnya</a>
        </div>
      </div>
    </div>
  </section>

  <section class="kuliner">
    <div class="container">
      <div class="row">

        <h2 class="title-kuliner">
          Kuliner Terdekat
        </h2>

        <div class="col-md-4">

          <form action="{{ route('front.index') }}" method="GET">
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



  <footer>
    <div class="container text-center">
      <span class="text-muted ">&copy; 2025 Wisata Menganti</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script>
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      navbar.classList.toggle('navbar-scroll', window.pageYOffset > 0);
    });

    function addKulinerHash() {
      const currentUrl = window.location.href;
      if (currentUrl.includes("?price") || currentUrl.includes("?distance")) {
        const newUrl = currentUrl + "#kuliner";
        window.location.href = newUrl;
      }
    }
    window.addEventListener("load", addKulinerHash);
  </script>
</body>

</html>
