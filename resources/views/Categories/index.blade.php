@extends('app')

@section('content')
    <a href="{{ url('/categories/add') }}">
        <button class="btn btn-info mt-3" type="button" style="margin-bottom: 20px;">Tambah Kategori</button>
    </a>
    {{-- <a href="{{ url('/') }}">
        <button class="btn btn-secondary mt-3" type="button" style="margin-bottom: 20px;">Beranda</button>
    </a> --}}
    <div class="row">
        @foreach ($categories as $item)
        <div class="col-sm-3">
            <div class="card text-center mb-3">
                <div class="card-body" style="height:auto;">
                    <h5>{{ $item->name }}</h5>
                    @if ($item->avatar)
                    <img src="{{ asset('storage/'.$item->avatar) }}" class="img-fluid" alt="">
                    @else
                    <img src="https://media.istockphoto.com/id/1397787055/id/vektor/cari-semua-item-kategori-simbol-tanda-ikon.jpg?s=612x612&w=0&k=20&c=Pb9OoapmFtql8XFRE502gLPM8uiq6F-F_OMYeH4E0LE=" class="img-fluid" alt="">
                    @endif
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