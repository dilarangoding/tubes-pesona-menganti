@extends('layouts.front')
@section('title', 'Form PesananTiket')

@section('style')
<style>
  body {

    background-color: #F1F5F9;
  }

  .informasi {
    margin-top: 50px;

  }

  .card {
    padding: 20px;
    border-radius: 15px;
    border: none;
    background-color: white;
  }

  .card-title {
    font-weight: 700;
    font-family: 'Inter';
  }

  .card-text {
    color: #6b7280;
    font-size: 14px;
    font-weight: 600;
  }

  .card-body {
    border: 0;
  }

  .card-header {
    background-color: white;
    border: 0;
  }

  label {
    font-size: 14px;
  }

  input[type="text"],
  input[type="number"] {
    font-size: 14px;
  }

  .price {
    color: #
  }

  .ms-2 {
    color: #6b7280;
  }

  .btn-pesan {
    margin-top: 15px;
    background-color: #007AFF;
    color: white;
    border-radius: 10px;
  }

  .fw-bold {
    font-size: 24px;
  }

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>
@endsection

@section('content')


<section class="informasi">
  <div class="container">
    <form action="{{ route('booking.store_checkout') }}" method="post">
      @csrf

      <div class="row justify-content-center">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <!-- <div class="col-md-6">
                        <div class="card pesanan">
                            <div class="card-header">
                                <h5 class="card-title">Informasi Pribadi</h3>
                                    <p class="card-text">sediakan informasi pribadi kamu
                                    </p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="customer_name">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="customer_name"
                                            placeholder="Masukan Nama Lengkap">
                                        <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                                    </div>
                                    <div class="col">
                                        <label for="customer_phone">No Handphone</label>
                                        <input type="number" class="form-control" name="customer_phone"
                                            placeholder="Masukan No Handphone">
                                        <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="customer_address">Alamat</label>
                                        <input type="text" class="form-control" name="customer_address"
                                            placeholder="Masukan Alamat">
                                        <p class="text-danger">{{ $errors->first('customer_address') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
        <div class="col-md-8">
          <div class="card pesanan">
            <div class="card-header">
              <h5 class="card-title">Informasi Pesanan</h3>
            </div>
            <div class="card-body">
              <ol class="list-group  list-group-flush">
                @forelse ($carts as $item)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    Harga Tiket
                  </div>
                  <span>Rp{{ number_format($item['ticket_price']) }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div>Tiket Pesanan</div>
                    {{ $item['qty'] }} x Rp{{ number_format($item['ticket_price']) }}
                  </div>
                  <span>Rp{{ number_format($subtotal) }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div>Total Bayar</div>

                  </div>
                  <span class="fw-bold">Rp{{ number_format($subtotal) }}</span>
                </li>
                @empty
                @endforelse

              </ol>

              <div class="d-grid gap-2">
                <button class="btn btn-pesan" type="submit">Pesan</button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

@endsection
