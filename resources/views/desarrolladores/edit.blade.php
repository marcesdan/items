@extends('layouts.app')
@section('page-title')
  Edición de desarrollador
@endsection
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
  <li class="breadcrumb-item active"><a href="{{route('admin.desarrolladores.index')}}">Desarrolladores</a></li>
  <li class="breadcrumb-item active">Edición de desarrollador</li>
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.desarrolladores.update', [$desarrollador->id]) }}">
        @method('PUT')
        @csrf
        <div class="row mt-3">
          <div class="col-md-10 offset-md-1">
           @include('desarrolladores._form')
          </div>
        </div>
        <div class="card-footer text-center bg-white pt-4">
          <button class="btn btn-primary" type="submit">
            <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
          </button>&nbsp;&nbsp;&nbsp;
          <a class="btn btn-secondary" href="{{ route('admin.desarrolladores.index') }}">
            <i class="fa fa-fw fa-lg fa-times-circle"></i>Volver
          </a>
        </div>
        <!-- card-footer-->
      </form>
    </div> <!-- card-body -->
  </div>
  <!-- card-->

@endsection
