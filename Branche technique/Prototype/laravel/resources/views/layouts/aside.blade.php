<!-- aside -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('project.index') }}" class="brand-link">
        <img src={{ asset('dist/img/solicoders-logo.png') }} class="brand-image img-circle elevation-3" alt="Group Image">
        <span class="brand-text font-weight-light text-center">Solicoders</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src={{ asset('dist/img/solicoders-logo.png') }} class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#profile" class="d-block">Amine Lamchatab</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('project.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Projets
                        </p>
                    </a>
                </li>
                @can('view', App\Models\Member::class)
                    <li class="nav-item">
                        <a href="{{ route('member.index') }}" class="nav-link ">
                            <i class="fa-solid fa-users pl-1 pr-1"></i>
                            <p>
                                Members
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
