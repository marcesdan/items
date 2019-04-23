@extends('layouts.app')
@section('page-title')
  Detalle de ítem
@endsection
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
  <li class="breadcrumb-item active"><a href="{{route('admin.items.index')}}">Items</a></li>
  <li class="breadcrumb-item active">Detalle de ítem</li>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <h3 class="profile-username text-center text-capitalize">{{$item->nombre}}</h3>

          <p class="text-muted text-center">{{$item->tipoItem->nombre}}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Proyecto</b> <a class="float-right text-capitalize">{{$item->proyecto->nombre}}</a>
            </li>
            <li class="list-group-item">
              <b>Prioridad</b> <a class="float-right text-capitalize">{{$item->prioridad}}</a>
            </li>
            <li class="list-group-item">
              <b>Estado</b> <a class="float-right text-capitalize">{{$item->getEstadoActual()->estado->nombre}}</a>
            </li>
          </ul>
          {{--          <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Responsable actual</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong><i class="fa fa-user mr-1"></i> Nombre</strong>
          <p class="text-muted">
            {{ $item->getResponsable()->full_name }}
          </p>
          <hr>
          <strong><i class="fa fa-address-book mr-1"></i> Email</strong>
          <p class="text-muted">{{ $item->getResponsable()->email }}</p>
          <hr>
          <strong><i class="fa fa-phone mr-1"></i> Teléfono</strong>
          <p class="text-muted">
            {{ $item->getResponsable()->telefono }}
          </p>
          <hr>
          <strong><i class="fa fa-code mr-1"></i>Como desarrollador</strong>
          <p class="text-muted">
            @foreach($item->getResponsable()->proyectos as $proyecto)
              <span class="danger">{{ $proyecto->nombre }}</span>
            @endforeach
          </p>
          <hr>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Desarrolladores</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <ul class="timeline timeline-inverse">
              @foreach($item->getHistorial() as $historial)
                <!-- The timeline -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-success">
                          {{$historial->created_at}}
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-primary"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>12:05</span>

                      <h3 class="timeline-header"><a href="#">{{ $historial->estado->nombre }}</a></h3>

                      <div class="timeline-body">
                        Responsable: {{ $historial->responsable->full_name }}
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                @endforeach
              </ul>
            </div>
            <div class="tab-pane" id="timeline">
              <div>
                <button class="btn btn-primary">Agregar desarrollador</button>
              </div>
              <table class="table table-bordered table-hover mt-2">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Telefono</th>
                </tr>
                </thead>
                <tbody>
                @foreach($item->desarrolladores as $desarrollador)
                  <tr>
                    <td>{{$desarrollador->full_name}}</td>
                    <td>{{$desarrollador->email}}</td>
                    <td>{{$desarrollador->telefono}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="settings">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputName2" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName2" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection
