@extends('layouts.admin')
@section('title','Pantai')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pantai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Pantai</li>
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
                        <h3 class="card-title">List Pantai</h3>
                        <div class="card-tools">
                            <a href="{{route('admin.pantai.create')}}" class="btn btn-sm btn-primary">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-bordered text-center text-wrap">
                                <thead >
                                    <tr>
                                        <th>Image</th>
                                        <th>Nama</th>
                                        <th>Location</th>
                                        <th>Harga Tiket</th>
                                        <th>Jam Buka</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pantai as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/pantai/' . $item->image) }}" width="100px" height="100px" alt="{{ $item->name }}">
                                            </td>
                                            <td>
                                                <strong> {{$item->name}}</strong>
                                            </td>
                                            <td >
                                                <iframe src="{{$item->location}}" frameborder="0" width="300px"></iframe>
                                            </td>
                                            <td>
                                                Rp.{{number_format($item->ticket_price)}}
                                            </td>
                                            <td>
                                                {{$item->opening_hours}}
                                            </td>
                                            <td>
                                                <a href="{{route('admin.pantai.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <!--<a href="#" class="btn btn-danger btn-sm">Hapus</a>-->
                                            </td>
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
