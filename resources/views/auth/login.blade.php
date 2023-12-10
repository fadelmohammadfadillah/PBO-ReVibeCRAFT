@extends('layouts.base_admin.base_auth') @section('judul', 'Halaman Login') @section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>ReVibeCRAFT</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card text-white">
        <div class="card-body login-card-body bg-orange-400">
            <p class="login-box-msg text-white">Masuk untuk memulai sesi Anda</p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input
                        id="email"
                        type="email"
                        placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required="required"
                        autocomplete="email"
                        autofocus="autofocus">
                    {{-- <input type="email" class="form-control" placeholder="Email" autocomplete="off"> --}}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope text-white"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                    <input
                        id="password"
                        type="password"
                        placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        required="required"
                        autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock text-white"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback text-white" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary text-white">
                            <input type="checkbox" id="remember">
                            <label for="remember text-white">
                                Ingat sesi saya
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-block bg-orange-100 hover:bg-white hover:text-orange-300">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{-- <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign in using Google+
                </a>
            </div> --}}
            <!-- /.social-auth-links -->

            <p class="mb-1 text-white">
                <a href="{{ route('password.request') }}">Lupa password?</a>
            </p>
            <p class="mb-0 text-white">
                Belum mempunyai akun?
                <a href="{{ route('register') }}" class="text-center">Register</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection

<!-- /.login-box -->
