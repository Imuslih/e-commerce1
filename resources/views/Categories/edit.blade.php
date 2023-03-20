@extends('app')

@section('content')
    <div class="row pt-3">
        <form action="/categories/{{ $categories->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Kategori</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" 
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama kategori" 
                        name="nama_kategori" value="{{ $categories->name }}">
                @error('nama_kategori')
                <div class="invalid-feedback">
                    Nama kategori tidak boleh kosong
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="margin-bottom: 20px">Update</button>
            <a href="{{ url('/index') }}">
                <button type="button" class="btn btn-danger mt-3" style="margin-bottom: 20px">Back</button>
            </a>
        </form>
    </div>
  @endsection