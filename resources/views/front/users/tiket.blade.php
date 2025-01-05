@extends('layouts.front')
@section('title','Tiket')
@section('style')
<style>
  td {
    font-size: 14px;
  }

  @media screen and (max-width: 480px) {
    .col-md-4 {
      margin-top: 10px;
    }
  }
</style>

@endsection
@section('content')


<section class="orders mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3">
        <x-sidebar-menu-user></x-sidebar-menu-user>
      </div>
      <div class="col-md-9">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">List Tiket</h4>

              </div>
              <div class="card-body">
                <div class="table table-responsive">
                  <table class="table table-hover table-bordered">
                    <tr>
                      <th>Invoice</th>
                      <!-- <th>Penerima</th>
                                            <th>No Telp</th> -->
                      <th>Total</th>
                      <th>Status</th>
                      <th>Tanggal Booking</th>
                    </tr>
                    @forelse ($tiket as $row)
                    <tr>
                      <td>
                        <strong>
                          @if ($row->status == 0)
                          <a href="{{route('booking.pay', $row->invoice)}}" class="">
                            {{ $row->invoice }}
                          </a>
                          @else
                          <a href="{{route('booking.invoice', $row->invoice)}}" class="">
                            {{ $row->invoice }}
                          </a>
                          @endif
                        </strong>
                      </td>
                      <!-- <td>{{ $row->customer_name }}</td>
                      <td>{{ $row->customer_phone }}</td> -->
                      <td>Rp{{ number_format($row->subtotal) }}</td>
                      <td>
                        @if ($row->status == 0)
                        <a href="{{route('booking.pay', $row->invoice)}}" class="btn btn-sm btn-danger">Bayar</a>
                        @else
                        {!! $row->status_label !!}
                        @endif
                      </td>
                      <td>{{ $row->booking_date }}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7" class="text-center">Tidak ada pesanan</td>
                    </tr>
                    @endforelse
                  </table>
                </div>
                <div class="float-right">
                  {!! $tiket->links() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection
