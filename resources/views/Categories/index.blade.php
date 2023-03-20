@extends('app')

@section('content')
    <a href="{{ url('/categories/add') }}">
        <button class="btn btn-info mt-3" type="button" style="margin-bottom: 20px;">Tambah Kategori</button>
    </a>
    <a href="{{ url('/') }}">
        <button class="btn btn-secondary mt-3" type="button" style="margin-bottom: 20px;">Beranda</button>
    </a>
    <div class="row">
        @foreach ($categories as $item)
        <div class="col-sm-4">
            <div class="card text-center mb-3">
                <div class="card-body" style="height:130px;">
                    <h5>{{ $item->name }}</h5>
                    <a href="/categories/{{ $item->id }}/edit">
                        <button class="btn btn-primary mt-3" type="button">Update</button>
                    </a>
                    <a href="/categories/{{ $item->id }}/delete">
                        <button class="btn btn-danger mt-3" type="button">Delete</button>
                    </a>
                </div>
            </div>
            {{-- <a href="#">
                <button class="btn btn-success mt-3 mb-3" type="button">Tambah ke Keranjang</button>
            </a> --}}
        </div>
        @endforeach
    </div>
@endsection