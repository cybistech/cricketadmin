{{-- @extends('layout')

@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Login</div>
                  <div class="card-body">

                      <form action="{{ route('login.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection --}}



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cricket Live | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin-assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Cricket Live Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        @if (session('error'))
            <div class="text-danger text-center mb-2">{{session('error')}}</div>
        @endif
        @if (session('success'))
        <div class="text-success text-center mb-2">{{session('success')}}</div>
    @endif
      <p class="login-box-msg"><b>Sign In</b></p>

      <form action="{{ route('login.post') }}" method="post">
        @csrf
        <div class="input-group mb-1">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <div class="text-danger">{{$message}}</div>
        @enderror
        <div class="input-group mt-2 mb-1">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
        <div class="text-danger">{{$message}}</div>
    @enderror
        <div class="row mt-3">

          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="row mt-3">
        <div class="col-12">
          <div class="icheck-primary text-center flex">

           <a href="">
              <p>don't have an account ?<a href="{{ route('register') }}"> <strong class="text-red">Register now</strong></a></p>
           </a>
          </div>
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>


      {{-- <div class="row mt-3"> --}}
        <div class="col-12">
          <div class="icheck-primary text-center flex">

           <a href="">
              <p>don't have an password ?<a href="{{ route('forget.password.get') }}"> <strong class="text-red">Reset Password</strong></a></p>
           </a>
          </div>
        </div>
        <!-- /.col -->

        <!-- /.col -->
      {{-- </div> --}}


      {{-- <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="checkbox">
                <label>
                    <a href="{{ route('forget.password.get') }}">Reset Password</a>
                </label>
            </div>
        </div>
    </div> --}}


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('admin-assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
