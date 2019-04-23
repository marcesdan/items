@extends('layouts.base')
@section('content')
<body class="hold-transition login-page">
  @yield('app-content')
  @stack('before-body-close')
</body>
@endsection
