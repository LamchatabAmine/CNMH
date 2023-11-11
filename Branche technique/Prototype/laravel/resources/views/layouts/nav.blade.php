<!-- nav -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('project.index') }}" class="nav-link">Projets</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('member.index') }}" class="nav-link">Members</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{-- <i class="far fa-bell"></i> --}}
                <i class="fa-solid fa-user"></i>
            </a>
            <div style="left: inherit; right: 0px;"
                class="dropdown-menu dropdown-menu-sm dropdown-menu-right text-center">
                <a href="#" class="dropdown-item">
                    {{-- <i class="fas fa-file mr-2"></i> --}}
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        Logout
                    </button>
                </form>
            </div>
        </li>

    </ul>
</nav>
