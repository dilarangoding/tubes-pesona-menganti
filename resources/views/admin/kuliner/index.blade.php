@extends('layouts.admin')
@section('title','Kuliner')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Kuliner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Kuliner</li>
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
                        <h3 class="card-title">List Kuliner</h3>
                        <div class="card-tools">
                            <a href="{{route('admin.kuliner.create')}}" class="btn btn-sm btn-primary">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered text-center text-wrap">
                                <thead >
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        <th>Jarak</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kuliner as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <img src="{{ asset('storage/kuliner/' . $item->image) }}" width="100px" height="100px" alt="{{ $item->name }}">
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->category}}</td>
                                        <td><a href="{{$item->location}}" target="_blank">{{$item->location}}</a></td>
                                        <td>{{$item->distance}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <a href="{{route('admin.kuliner.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                                            <a href="{{route("admin.kuliner.delete",$item->id)}}" class="btn btn-danger">Hapus</a>
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
