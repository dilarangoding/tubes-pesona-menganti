@extends('layouts.front')
@section('title','Dashboard')
@section('css')
<style>
 @media screen and (max-width: 480px) {
    .col-md-4{
        margin-top: 10px;
    }
 }
</style>

@endsection
@section('content')


<section class="dashboard mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <x-sidebar-menu-user></x-sidebar-menu-user>
            </div>
            <div class="col-md-9">

               <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3>Belum Dibayar</h3>
                            <hr>
                            <p>Rp {{ number_format($orders[0]->pending) }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3>Dibayar</h3>
                            <hr>
                            <p>{{ $orders[0]->paid }} Pesanan</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3>Selesai</h3>
                            <hr>
                            <p>{{ $orders[0]->paid }} Pesanan</p>
                        </div>
                    </div>
                </div>
               </div>

            </div>
        </div>
    </div>
</section>



@endsection
