<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PWL_UTS | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Register</b></a>
    </div>
    <div class="card-body">

      <form method="POST" action="register">
        @csrf
        {!! (isset($usr))? method_field('PUT') : ''!!}
        <div class="input-group mb-3">
          <input class="form-control @error('username') is-invalid @enderror" value="{{ isset($usr)? $usr->username : old('username') }}" name="username" type="text" placeholder="Username">
          @error('username')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
          
        </div>
        <div class="input-group mb-3">
          <input class="form-control @error('name') is-invalid @enderror" value="{{ isset($usr)? $usr->name : old('name') }}" name="name" type="text" placeholder="Full name">
          @error('name')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
          
        </div>
        <div class="input-group mb-3">
          <input class="form-control @error('email') is-invalid @enderror" value="{{ isset($usr)? $usr->name : old('email') }}" name="email" type="email" placeholder="Email">
          @error('email')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
          
        </div>
        <div class="input-group mb-3">
          <input class="form-control @error('password') is-invalid @enderror" value="{{ isset($usr)? $usr->password : old('password') }}" name="password" type="password" placeholder="Password">
          @error('password')
            <span class="error invalid-feedback">{{ $message }} </span>
          @enderror
          
        </div>
        <div class="form-group">
          <button class="btn btn-primary btn-block">Register</button>
        </div>
      </form>

      <a href="{{url('/login')}}" class="text-center">Saya sudah punya akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>