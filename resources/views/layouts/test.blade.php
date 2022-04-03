
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('auth') }}/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('auth') }}/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('auth') }}/css/style.css">

    <title>Login | Movie Review</title>
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('auth') }}/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="mb-4">
                <h3>Sign In</h3>
                <p class="mb-4">Movie Review</p>
              </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group first">

                <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group last mb-4">

                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
        </form>
    </div>
</div>
</div>
      </div>

      </div>
    </div>
  </div>


    <script src="{{ asset('auth') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('auth') }}/js/popper.min.js"></script>
    <script src="{{ asset('auth') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('auth') }}/js/main.js"></script>
  </body>
</html>
