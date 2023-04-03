@extends('app')

@section('content')
<div class="container">
    <h1 class="text-center">Edit Profile</h1>
    <div class="row">
      <div class="col-3">
        @if ($user->avatar)
            <img src="{{ asset('storage/'.$user->avatar) }}" class="img-fluid" alt="">
        @else
            <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" class="img-fluid" alt="">
        @endif
        
      </div>
      <div class="col">
        <form action="{{ route('update_profile') }}" method="post"  >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" disabled name="email" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                @error('name')
                    <div id="nameHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
                @error('avatar')
                    <div id="avatarHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection