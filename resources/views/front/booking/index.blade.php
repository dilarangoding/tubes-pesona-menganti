@extends('layouts.front')
@section('title','Pesan Tiket')

@section('style')
<style>

    .container-overview{
        padding: 40px;
        margin-top: 50px;
        border: 1px solid #eeeeee;
        border-radius: 8px;
    }
    .img-overview{
        max-width: 610px;
        border-radius: 8px;
    }

    .breadcrumb .breadcrumb-item a{
        color: #111827;
        text-decoration: none;
    }

    .text-overview{
        font-size: 20px;
        font-weight: 500;
    }

    .overview-price{
        color: #f15c59;
        font-size: 32px;
        font-weight: 600;
    }

    .quantity{
        margin-top: 10px;
    }

    .btn-order{
        margin-top: 20px;
        background-color: #007AFF;
        color: white;
        display: block;
        padding: 10px 150px 10px 150px;
    }

    .description-overview{
        font-size: 0.875rem;
        color: #6b7280;
        line-height: 1.7142857;
    }

    .location{
        width: 400px;
        height: 400px;
    }

    @media screen and (max-width: 480px) {
        .location{
            width: 300px;
            height: 300px;
        }

        .btn-order{
            margin-top: 20px;
            background-color: #007AFF;
            color: white;
            display: block;
            padding: 10px 110px 10px 110px;
        }

        .overview-price{
            color: #f15c59;
            font-size: 24px;
            font-weight: 600;
        }

        .img-overview{
            max-width: 320px;
            border-radius: 8px;
        }

        .galery{
            display: none;
        }
    }

</style>
@endsection

@section('content')

<section class="overview">
    <div class="container container-overview">

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Beli tiket</li>
                </ol>
              </nav>
        </div>

        <form action="{{route('booking.cart')}}" method="post">
            @csrf
            <input type="hidden" name="pantai_id" value="{{$pantai->id}}">
            <div class="row order-sm-2">
                <div class="col-md-7 ">
                    <img src="{{ asset('storage/pantai/' . $pantai->image) }}" class="img-overview">

                    <!-- Gallery -->
                    <div class="row mt-5 galery">
                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <img
                            src="{{asset('img/pantai.png')}}"
                            class="w-100 shadow-1-strong rounded mb-4"

                        />

                        <img
                             src="{{asset('img/penginapan.jpg')}}"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt="Wintry Mountain Landscape"
                        />
                        </div>

                        <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('img/pantai-2.png')}}"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt="Mountains in the Clouds"
                        />

                        <img
                        src="{{asset('img/register.png')}}"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt="Boat on Calm Water"
                        />
                        </div>

                        <div class="col-lg-4 mb-4 mb-lg-0">
                        <img
                        src="{{asset('img/login.png')}}"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt="Waves at Sea"
                        />

                        <img
                        src="{{asset('img/pantai-1.png')}}"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt="Yosemite National Park"
                        />
                        </div>
                    </div>
                    <!-- Gallery -->
                </div>
                <div class="col-md-5 order-sm-1">
                    <p class="text-overview">
                        {{$pantai->name}}
                    </p>
                    <span class="overview-price">
                        Rp{{number_format($pantai->ticket_price)}} / Orang
                    </span>

                    <div class="quantity">
                        <label for="">Jumlah tiket</label>
                        <div class="input-group mt-3">

                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                style="align-items: center; background: transparent; border: 0; border: 1px solid rgba(0, 0, 0, .09); border-radius: 2px; color: rgba(0, 0, 0, .8); cursor: pointer;  font-size: .875rem; font-weight: 300; height: 28px; justify-content: center; letter-spacing: 0; line-height: 1; outline: none; transition: background-color .1s cubic-bezier(.4,0,.6,1); width: 28px;" type="button" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="quantity">
                                -
                            </button>

                            <input type="text" name="qty" id="sst" maxlength="12"  title="Quantity:" value="1" class="quantity-field border-0 text-center w-25">
                            <div class="input-group-append">

                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                style="align-items: center; background: transparent; border: 0; border: 1px solid rgba(0, 0, 0, .09); border-radius: 2px; color: rgba(0, 0, 0, .8); cursor: pointer;  font-size: .875rem; font-weight: 300; height: 28px; justify-content: center; letter-spacing: 0; line-height: 1; outline: none; transition: background-color .1s cubic-bezier(.4,0,.6,1); width: 28px;" type="button" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity">
                                    +
                                </button>
                        </div>
                    </div>

                    <div class="form-group mt-3" >
                        <label for="booking_date">Tanggal Booking</label>
                        <input type="date" class="form-control mt-2" name="booking_date" min="{{date('Y-m-d')}}">
                        <p class="text-danger">{{ $errors->first('booking_date') }}   </p>
                    </div>



                    <div class="form-group">
                        <div class="d-grid">
                            <button class="btn btn-order" >Pesan Tiket</button>
                          </div>

                    </div>


                    <p class="mt-3">
                        Deskripsi
                    </p>
                    <p class="description-overview">
                        {{$pantai->description}}
                    </p>
                    <hr>
                    <p class="mt-3">
                        Jam Buka
                    </p>

                    <ul>
                        <li class="description-overview">{{$pantai->opening_hours}}</li>
                    </ul>

                    <hr>
                    <p class="mt-3">Alamat</p>
                    <iframe src="{{$pantai->location}}" class="location" frameborder="0"></iframe>
                </div>
            </div>
        </form>

    </div>
</section>

@endsection
