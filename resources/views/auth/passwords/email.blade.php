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
              <p class="login-box-msg">Sign in to start your session</p>
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
              <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                  <input type="email" class="form-control" name="email" required value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
                </div>
                  <!-- /.col -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
                  </div>
                  <br>
                  <div class="col-12">
                    <a href="{{route('signup')}}" class="btn btn-danger btn-block">Register a new membership</a>
                  </div>
                  <!-- /.col -->
                  <a href="" class="text-center"></a>
                  <p class="mb-0"></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- jQuery -->
<script src="{{asset('/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
