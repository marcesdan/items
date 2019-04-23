<!-- Navbar -->
<nav class="main-header navbar navbar-expand border-bottom navbar-light bg-primary">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
  </ul>
  @if (auth()->user())
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link font-weight-bold" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fa fa-user"></i>
          {{ auth()->user()->username }}
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="{{ route('perfil') }}" style="color:black !important" class="dropdown-item">
            <i class="far fa-edit"></i>
            Perfil
          </a>
          <form action="{{ route('logout') }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="dropdown-item">
              <i class="fas fa-sign-out-alt"></i>
              {{ __('Logout') }}
            </button>
          </form>
        </div>
      </li>
    </ul>
  @endif
</nav>
<!-- /.navbar -->
