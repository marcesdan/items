@extends('layouts.app')
@section('page-title')
  Listado de desarrolladores
@endsection
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
  <li class="breadcrumb-item active">Desarrolladores</li>
@endsection
@section('content')
  <div class="row">
    <div class="col-12" id="desarrolladores-index">
      <div id="desarrolladores-dt"></div>
    </div>
    <!-- /.col-->
  </div>
  <!-- /.row -->
@endsection
@push('before-body-close')
  <script src="{{ asset('js/Desarrolladores.js') }}"></script>
@endpush
