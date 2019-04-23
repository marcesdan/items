@extends('layouts.app')
@section('page-title')
  Listado de proyectos
@endsection
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
  <li class="breadcrumb-item active">Proyectos</li>
@endsection
@section('content')
  <div class="row">
    <div class="col-12" id="proyectos-index">
      <div id="proyectos-dt"></div>
    </div>
    <!-- /.col-->
  </div>
  <!-- /.row -->
@endsection
@push('before-body-close')
  <script src="{{ asset('js/Proyectos.js') }}"></script>
@endpush
