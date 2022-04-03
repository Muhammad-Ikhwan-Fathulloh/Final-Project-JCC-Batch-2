{{-- @extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-200px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.login')

@section('content')
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">

      <div class="col-md-10 mx-auto col-lg-5">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('success')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('loginError')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form class="p-4 p-md-5 border rounded-3 bg-light"  novalidate action="/register" method="post">
          @csrf

          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="" autofocus value="{{old('name')}}" required>
            <label for="floatingInput">Nama</label>
            @error('email')
            <div class="invalid-feedback" role="alert">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control  @error('username') is-invalid @enderror " name="username" id="username" placeholder="Username" value="{{old('username')}}" required>
            <label for="floatingInput">Username</label>
            @error('username')
            <div class="invalid-feedback" role="alert">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" autofocus value="{{old('email')}}" required>
            <label for="floatingInput">Email</label>
            @error('email')
            <div class="invalid-feedback" role="alert">
              {{$message}}
            </div>
            @enderror
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" placeholder="xxxxxx" required>
            <label for="floatingPassword">Kata Sandi</label>
            @error('password')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
          <hr class="my-4">
          <small> Sudah Punya Akun ? <a href="/login">Masuk</a></small>
        </form>
      </div>
      <div class="col-lg-7 text-center text-lg-start">
        <a href="/"><img src="assets/img/hero/hero-img.png" class="pt-7 pt-md-0 img-fluid" alt=""></a>
      </div>
    </div>
  </div>
@endsection
