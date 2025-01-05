@extends('layouts.admin')
@section('title', 'Pesanan Tiket')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Pesanan Tiket</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Pesanan Tiket</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Tiket</h3>
            <div class="card-tools">
              <form action="{{ route('admin.tiket.index') }}" method="GET">
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <button type="button" class="btn btn-default" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> Filter Tanggal
                      <i class="fas fa-caret-down"></i>
                    </button>

                    <input type="hidden" id="startDate" name="s">
                    <input type="hidden" id="endDate" name="e">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered text-center text-wrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <!-- <th>Nama</th>
                                            <th>No Telpon</th> -->
                    <th>Tanggal Booking</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tiket as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->invoice }}</td>
                    <!-- <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->customer_phone }}</td> -->
                    <td>{{ date('d-m-Y', strtotime($item->booking_date)) }}</td>
                    <td>Rp{{ number_format($item->subtotal) }}</td>
                    <td>{{ $item->detail->qty }}</td>
                    <td>{!! $item->status_label !!}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

        </div>


      </div>
    </div>
  </div>
</section>
@endsection
@section('js')

<script>
  $('#daterange-btn').daterangepicker({
      ranges: {
        'Hari Ini': [moment(), moment()],
        'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
        '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
        'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
        'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
          'month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate: moment()
    },
    function(start, end) {
      $('#startDate').val(start.format('YYYY-MM-DD'));
      $('#endDate').val(end.format('YYYY-MM-DD'));
    }
  )
</script>
@endsection
