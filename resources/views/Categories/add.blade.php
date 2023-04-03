@extends('app')

@section('content')
    <div class="row pt-3">
        <form action="{{ url('/categories/add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Kategori</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" 
                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama kategori" 
                        name="nama_kategori">
                @error('nama_kategori')
                <div class="invalid-feedback">
                    Nama kategori tidak boleh kosong
                </div>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
                @error('avatar')
                    <div id="avatarHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3" style="margin-bottom: 20px">Submit</button>
            <a href="{{ url('/categories/index') }}">
                <button type="button" class="btn btn-danger mt-3" style="margin-bottom: 20px">Back</button>
            </a>
        </form>
    </div>
  @endsection