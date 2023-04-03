@extends('app')

@section('content')
    <a href="{{ url('/products/add') }}">
        <button class="btn btn-info mt-3" type="button" style="margin-bottom: 20px;">Tambah Produk</button>
    </a>
    <div class="row">
        @foreach ($products as $item)
        <div class="col-sm-3">
            <div class="card text-center mb-3">
                <div class="card-body" style="height:auto;">
                    <h5>{{ $item->name }}</h5>
                    @if ($item->avatar)
                    <img src="{{ asset('storage/'.$item->avatar) }}" class="img-fluid" style="width: 75%;" alt="">
                    @else
                    <img src="https://cdn-image.hipwee.com/wp-content/uploads/2021/12/hipwee-Recycle-Symbols-and-Patterns-Signs-Reduce-Reuse-Recycle_-RRR.png" class="img-fluid" style="width: 75%;" alt="">
                    @endif
                    <h6 class="card-subtitle my-2 text-muted"><i>Category : {{ $item->category->name }}</i></h6>
                    <h4>Rp. {{ number_format($item->price,0,',','.') }}</h4>
                    <a href="/products/{{ $item->id }}/edit">
                        <button class="btn btn-primary mt-3" type="button">Update</button>
                    </a>
                    <a href="/products/{{ $item->id }}/delete">
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