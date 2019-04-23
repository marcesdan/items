@extends('layouts.auth')
@section('app-content')
  <div class="login-box">
    <div class="login-logo">
      <b>Gestion de </b>Ítems
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg h5">Reset Password</p>
        <form method="POST" action="{{ route('password.email') }}">
          {{ csrf_field() }}
          <div class="input-group mb-3">
            <input
              name="email" type="email"
              class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
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
          <div class="form-group row mb-0 justify-content-center">
            <button type="submit" class="btn btn-primary btn-flat">
              Send Password Reset Link
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
