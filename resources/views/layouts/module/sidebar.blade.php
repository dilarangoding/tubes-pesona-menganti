<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{url('/')}}" class="brand-link">

      <span class="brand-text font-weight-light">Pesona Menganti</span>
    </a>

    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="bi bi-speedometer2"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.pantai.index')}}" class="nav-link">
                    <i class="bi bi-water"></i>
                    <p>
                    Pantai
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.tiket.index')}}" class="nav-link">
                    <i class="bi bi-ticket-perforated"></i>
                    <p>
                     Tiket
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.penginapan.index')}}" class="nav-link">
                    <i class="bi bi-houses"></i>
                    <p>
                     Penginapan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.kuliner.index')}}" class="nav-link">
                    <i class="bi bi-cup-hot"></i>
                    <p>
                     Kuliner
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.user')}}" class="nav-link">
                    <i class="bi bi-person"></i>
                    <p>
                    User
                    </p>
                </a>
            </li>
        </ul>
      </nav>

    </div>

  </aside>
