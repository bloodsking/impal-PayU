
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pay-U | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Pay-U</b> | Login</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="POST" action="{{ route('login') }}">
          @csrf
        <div class="form=group">
            <input type="email" name="email"class="form-control" placeholder="Email" autofocus>
            <div class="text-danger">
                @error('email')
                    {{ $message}}
                @enderror
              </div>
        </div>
        <br>
        <div class="form=group">
            <input type="password" name="password"class="form-control" placeholder="Password">
            <div class="text-danger">
                @error('password')
                    {{ $message}}
                @enderror
        </div>
        <br>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
                <label >

                </label>

            </div>
          </div>

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>

        </div>
      </form>
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register</a>
      </p>
    </div>

  </div>
</div>



<script src="{{asset('template/')}}/plugins/jquery/jquery.min.js"></script>
<script src="{{asset('template/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('template/')}}/dist/js/adminlte.min.js"></script>
</body>
</html>
