@extends('layouts.auth')
@section('app-content')
  <div class="register-box">
    <div class="register-logo">
      <b>Gestion de </b>Ítems
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg h5">{{ $titulo }} registro</p>
        <form method="POST" action='{{ url("$url/register") }}' aria-label="{{ __('Register') }}">
          {{ csrf_field() }}
          <div class="input-group mb-3">
            <input
              name="username"
              type="text"
              class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
              value="{{ old('username') }}"
              placeholder="Username"
              required
            >
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-user"></i>
              </span>
            </div>
            @if ($errors->has('username'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
            @endif
          </div>
          <!-- /.input-group username -->
          <div class="input-group mb-3">
            <input
              type="email"
              class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
              name="email"
              value="{{ old('email') }}"
              placeholder="{{ __('E-Mail Address') }}"
              required autofocus
            >
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-envelope"></i>
              </span>
            </div>
            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
          <!-- /.input-group email -->
          <div class="input-group mb-3">
            <input
              type="password"
              name="password"
              class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
              placeholder="{{ __('Password') }}"
              required
            >
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-lock"></i>
              </span>
            </div>
            @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
          <!-- /.input-group password -->
          <div class="input-group mb-3">
            <input
              name="password_confirmation"
              type="password"
              class="form-control"
              placeholder="{{ __('Confirm Password') }}"
              required
            >
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-lock"></i>
              </span>
            </div>
          </div>
          <!-- /.input-group password-confirm -->
          <div class="row justify-content-center">
            <div class="col-sm-6 text-center">
              <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
            </div>
            <p class="mb-0 mt-2">
              <a href="login" class="text-center">I already have a membership</a>
            </p>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
@endsection
