@extends('app')

@section('content')
    <div class="row">
        <div class="card mt-4" style="margin: 0 auto; width:50%;">
            <div class="card-body" style="text-align: center">
            Selamat Datang di <b>Imuslih E-Commerce</b>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-8 mb-3" style="margin: 0 auto;">
        <div class="card text-center">
            <div class="row mt-4">
                <h5>Menu Kategori</h5>
            </div>
            <div class="card-body">
            <a href="{{ url ('/categories/index') }}">
                <button class="btn btn-success mt-2" type="button">Daftar Kategori</button>
            </a>
            </div>
        </div>
    </div>

    <div class="col-md-8 mb-3" style="margin: 0 auto;">
        <div class="card text-center">
            <div class="row mt-4">
                <h5>Menu Produk</h5>
            </div>
            <div class="card-body">
            <a href="{{ url('/products/index') }}">
                <button class="btn btn-primary mt-2" type="button">Daftar Produk</button>
            </a>
            </div>
        </div>
    </div>

    {{-- <div class="col-md-8" style="margin: 0 auto;">
        <div class="card text-center">
            <div class="row mt-4">
                <h5>Menu Transaksi</h5>
            </div>
            <div class="card-body">
            <a href="{{ route ("index_transaksi") }}">
                <button class="btn btn-warning mt-2" type="button">Cek Keranjang Belanja</button>
            </a>
            </div>
        </div>
    </div> --}}
@endsection