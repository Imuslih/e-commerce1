

@extends('app')

@section('title', 'login')

@section('content')
<div class="row">
    <div class="col-md-4 mx-auto my-5" style="height: 100%;">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("do.login") }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp">
                        @error('email')
                            <div id="emailHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                        @error('password')
                            <div id="passwordHelp" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <p>
                        Belum punya akun?
                        <a href="{{ route('register') }}" style="text-decoration: none;">silakan mendaftar.</a>
                    </p>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection