@extends('app')

@section('content')
    <div class="row pt-3">
        <form action="{{ url('/products/add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Produk</label>
                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama produk" name="nama_produk">
                @error('nama_produk')
                <div class="invalid-feedback">
                    Nama produk tidak boleh kosong
                </div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="exampleInputPassword1">Spesifikasi</label>
                <textarea class="form-control @error('spesifikasi') is-invalid @enderror" name="spesifikasi" placeholder="Masukkan spesifikasi produk" rows="5" style="width: 100%;"></textarea>
                @error('spesifikasi')
                <div class="invalid-feedback">
                    Spesifikasi produk tidak boleh kosong
                </div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="exampleInputPassword1">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Masukkan deskripsi produk" rows="5" style="width: 100%;"></textarea>
                @error('deskripsi')
                <div class="invalid-feedback">
                    Deskripsi produk tidak boleh kosong
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Harga Produk</label>
                <input type="text" class="form-control @error('harga_produk') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan harga produk" name="harga_produk">
                @error('harga_produk')
                <div class="invalid-feedback">
                    Harga produk tidak boleh kosong
                </div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="exampleFormControlSelect1">ID Kategori</label>
                <select class="form-select @error('id_kategori') is-invalid @enderror" id="exampleFormControlSelect1" name="id_kategori">
                <option selected>Pilih Kategori Produk</option>
                  @foreach ($categories as $item)
                    <option value="{{ $item->id}}">{{ $item->name }}</option>
                  @endforeach
                </select>
                @error('id_kategori')
                <div class="invalid-feedback">
                    ID Kategori produk tidak boleh kosong
                </div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="avatar" class="form-label">Foto Produk</label>
                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
                @error('avatar')
                    <div id="avatarHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="margin-bottom: 20px">Submit</button>
            <a href="{{ url('/products/index') }}">
                <button type="button" class="btn btn-danger mt-3" style="margin-bottom: 20px">Back</button>
            </a>
        </form>
    </div>
  @endsection