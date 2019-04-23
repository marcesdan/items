<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-primary">
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link text-center">
    <span class="brand-text font-weight-light">Gestión de Ítems</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    @if (auth()->user())
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link @if (Route::is('home')) active @endif">
              <i class="nav-icon fa fa-home"></i>
              <p>Inicio</p>
            </a>
          </li>
          {{-- <li class="nav-item">
						<a href="{{route('matriculados')}}" class="nav-link @if (Request::is('matriculados')) active @endif">
							<i class="nav-icon fa fa-briefcase"></i>
							<p>Matriculados</p>
						</a>
					</li> --}}
          <li class="nav-item">
            <a href="{{ route('admin.desarrolladores.index') }}"
               class="nav-link @if (Route::is('admin.desarrolladores.**')) active @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>Desarrolladores</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.proyectos.index') }}" class="nav-link @if (Route::is('admin.proyectos.**')) active @endif">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>Proyetos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.items.index') }}" class="nav-link @if (Route::is('admin.items.**')) active @endif">
              <i class="nav-icon fas fa-tasks"></i>
              <p>Ítems</p>
            </a>
          </li>
        </ul>
      </nav>
  @endif
  <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
