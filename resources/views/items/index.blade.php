@extends('layouts.app')
@section('page-title')
  Listado de items
@endsection
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
  <li class="breadcrumb-item active">Items</li>
@endsection
@section('content')
  <div class="row">
    <div class="col-12" id="items-index">
      <div id="items-dt"></div>
    </div>
    <!-- /.col-->
  </div>
  <!-- /.row -->
@endsection
@push('before-body-close')
  <script src="{{ asset('js/Items.js') }}"></script>
@endpush
