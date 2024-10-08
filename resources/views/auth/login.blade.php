@extends('layouts.AuthLayout')

@section('title', 'Login')

@section('content')
    <div class="auth-form">
        <div class="card my-5">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ URL::asset('build/images/lpse/lpsekalsellogo.png') }}" alt="images" class="img-fluid mb-3">
                    <h4 class="f-w-500 mb-1">Masukkan Akun Anda</h4>
                  
                         
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="bil" class="form-control @error('email') is-invalid @enderror" name="email" value="@gmail.com" required autocomplete="email" autofocus id="floatingInput" placeholder="Masukkan Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" type="password" class="form-control @error('password') is-invalid @enderror" value="12345678" name="password" required autocomplete="current-password" id="floatingInput1" placeholder="Masukkan Kata Sandi">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="d-flex mt-1 justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input input-primary" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-muted" for="remember">Ingat Sandi?</label>
                        </div>
                        <a href="{{ route('password.request') }}">
                            <h6 class="f-w-400 mb-0">Lupa Password?</h6>
                        </a>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
@endsection
