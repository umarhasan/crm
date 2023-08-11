<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Virtue CRM | Resset Password</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('/admin')}}/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="{{asset('/admin')}}/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{asset('/admin')}}/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="{{asset('/admin')}}/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('/admin')}}/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="{{asset('/admin')}}/images/logo.png" alt="logo">
              </div>
              <p class="login-box-msg">{{ __('Reset Password') }}</p>
              @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
              @endif
              @error('email')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong> 
                </div>
              @enderror
              @error('password')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong> 
                </div>
              @enderror
              <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group mb-3">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">
                  
                </div>
                <div class="input-group mb-3">
                  <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
