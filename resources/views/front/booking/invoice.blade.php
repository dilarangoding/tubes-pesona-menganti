@extends('layouts.front')
@section('title','Invoice')
@section('style')
<style>
    body{
        background-color: #F1F5F9;
    }
    .informasi{
        margin-top: 50px;

    }

    .card{
        padding: 20px;
        border-radius: 15px;
        border: none;
        background-color: white;
    }

    .card-title{
        font-weight: 700;
        font-family: 'Inter';
    }

    .card-text{
        color: #6b7280;
        font-size: 14px;
        font-weight: 600;
    }

    .card-body{
        border: 0;
    }

    .card-header{
        background-color: white;
        border: 0;
    }

    label{
        font-size: 14px;
    }

    input[type="text"],input[type="number"]{
        font-size:14px;
    }



    .ms-2{
        color: #6b7280;
    }

    .btn-lunas{
        margin-top: 15px;
        background-color: #22c55e;
        color: black;
        border-radius: 10px;
    }

    .fw-bold{
        font-size: 24px;
    }


</style>
@endsection

@section('content')


<section class="informasi">
    <div class="container">
        <div class="row justify-content-center">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="col-md-8">
                <div class="alert alert-success text-center">
                    LUNAS. Silahkan Download Tiket

                </div>
                <div class="card pesanan">
                    <div class="card-header">
                        <h5 class="card-title">Bukti Pembayaran</h3>
                        <p class="card-text">Tunjukan bukti pembayaran ini di loket</p>
                    </div>
                    <div class="card-body">
                        <ol class="list-group  list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    Invoice
                                </div>
                                <span >
                                    # {{$ticket->invoice}}
                                </span>
                            </li>

                            @foreach ($ticket->ticketDetail as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        Harga Tiket
                                    </div>
                                    <span >Rp{{number_format($item->price)}}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div>Tiket Pesanan</div>
                                        {{$item->qty}} x Rp{{number_format($item->price)}}
                                    </div>
                                    <span >Rp{{number_format($item->price * $item->qty)}}</span>
                                </li>
                            @endforeach

                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div>Total Bayar</div>
                                </div>
                                <span class="fw-bold">Rp{{number_format($ticket->subtotal)}}</span>
                            </li>

                        </ol>

                          <div class="d-grid gap-2">
                            <a href="{{route("user.downloadTiket", $ticket->invoice)}}" class="btn btn-lunas text-white" >Download Tiket</a>
                          </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
