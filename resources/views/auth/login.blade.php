@extends('layouts.auth')
@section('app-content')
  <div class="login-box">
    <div class="login-logo">
        <b>Gestion de </b>Ítems
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg h5">{{ __('Login') }}</p>
        <form method="post" action='{{ url("login") }}' aria-label="{{ __('Login') }}">
          {{ csrf_field() }}
          <div class="input-group mb-3">
            <input
              name="username" type="text"
              class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
              value="{{ old('username') }}"
              placeholder="username"
              required autofocus
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
              type="password"
              name="password"
              class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
              placeholder="{{ __('Password') }}"
              required
            >
            @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-lock"></i>
              </span>
            </div>
          </div>
          <!-- /.input-group password -->
          <div class="row">
            <div class="col-8">
              <div class="checkbox icheck pt-2">
                <label>
                  <input
                    type="checkbox"
                    name="remember"
                    {{ old('remember') ? 'checked' : '' }}
                  >
                  {{ __('Remember Me') }}
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Login') }}</button>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </form>
        <p class="mb-1">
          <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
        </p>
        <p class="mb-0">
          <a href="register" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection
