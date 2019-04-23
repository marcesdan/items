@extends('layouts.app')
@section('page-title')
  Información general
@endsection
@section('breadcrumbs')
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150</h3>

            <p>Mayoristas</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>25.000<sup style="font-size: 20px">%</sup></h3>

            <p>Turistas</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>44</h3>

            <p>Comercios</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>
            <p>Beneficios</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="card bg-primary-gradient">
      <div class="card-header no-border ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
          <i class="fa fa-map-marker mr-1"></i>
          Visitantes
        </h3>
        <!-- card tools -->
        <div class="card-tools">
          <button type="button" class="btn btn-primary btn-sm daterange" data-toggle="tooltip" title="Date range">
            <i class="fa fa-calendar"></i>
          </button>
          <button type="button" class="btn btn-primary btn-sm" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <div class="card-body">
      </div>
      <!-- /.card-body-->
      <div class="card-footer bg-transparent">
        <div class="row">
          <div class="col-6 text-center">
            <div id="sparkline-1">
              <canvas width="80" height="50"
                      style="display: inline-block; width: 80px; height: 50px; vertical-align: top;"></canvas>
            </div>
            <div class="text-white">Visitantes</div>
          </div>
          <!-- ./col -->
          <div class="col-6 text-center">
            <div id="sparkline-2">
              <canvas width="80" height="50"
                      style="display: inline-block; width: 80px; height: 50px; vertical-align: top;"></canvas>
            </div>
            <div class="text-white">Activos</div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
  </div>
@endsection
