<nav class="navbar navbar-expand-lg navbar-light shadow bg-white">
  <div class="container">
    <a class="navbar-brand" href="{{route('front.index')}}"><img src="{{asset('img/logo.png')}}" width="60" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
      aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="{{route('front.index')}}" class="nav-link">Beranda</a>
        </li>
        <li class="nav-item">
          <a href="{{route('booking.index')}}" class="nav-link">Beli Tiket</a>
        </li>
        <li class="nav-item">
          <a href="{{route('front.penginapan')}}" class="nav-link">Penginapan</a>
        </li>
        <li class="nav-item">
          <a href="{{route('front.kuliner')}}" class="nav-link">Kuliner</a>
        </li>
        @if (Auth::user())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu">
            @if (Auth::user()->role == 'user')
            <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a class="dropdown-item" href="{{route('user.tiket')}}">Tiket</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a></li>
            @else
            <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a></li>

            @endif
          </ul>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        @else
        <li class="nav-item">
          <a href="{{route('login')}}" class="nav-link">Login</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
