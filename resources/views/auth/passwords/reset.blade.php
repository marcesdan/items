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
        <form method="POST" action="{{ route('password.update') }}">
          {{ csrf_field() }}
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="input-group">
            <input placeholder="Email" id="email" type="email"
                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                   value="{{ $email ?? old('email') }}" required autofocus>
            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>

          <div class="input-group">
            <input id="password" placeholder="Contraseña" type="password"
                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
          <div class="input-group">
            <input placeholder="Confirmar contraseña" id="password-confirm" type="password" class="form-control"
                   name="password_confirmation" required>
          </div>
          <div class="input-group mb-0">
            <button type="submit" class="btn btn-success">
              Cambiar contraseña
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
