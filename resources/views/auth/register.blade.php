@extends('layouts.auth.app')

@section('content')
<div class="register-box">
  <div class="register-logo">
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new Customer</p>

      <form id="kt_sign_up_form" action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Full Name" name="name" autocomplete="off" />
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror 
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>           
        </div>
        <div class="input-group mb-3">
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}" />
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Phone Number" name="phone" autocomplete="off" />
          @error('phone')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          <!-- <input type="text" class="" placeholder="Phone" name="phone" id="phone"> -->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input class="form-control @error('address') is-invalid @enderror" id="address" type="text" placeholder="address" name="address" autocomplete="off" value="{{ old('address') }}"/>
          @error('address')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password" name="password" autocomplete="off"/>
          <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
            <i class="bi bi-eye-slash fs-2"></i>
            <i class="bi bi-eye fs-2 d-none"></i>
          </span>
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input class="form-control" id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" autocomplete="off" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>          
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <!-- <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a> -->
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection
