@extends('layouts.auth')
@section('content')
  <div class="login-box flipped">
    @include('auth.login-form')
    @include('auth.passwords.email-form')
  </div>
@endsection
