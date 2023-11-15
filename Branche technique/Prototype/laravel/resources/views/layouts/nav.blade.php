<!-- nav -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('project.index') }}" class="nav-link">{{__('words.project_link')}}</a>
        </li>
        @can('view', App\Models\Member::class)
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('member.index') }}" class="nav-link">{{__('words.member_link')}}</a>
            </li>
        @endcan

    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa-solid fa-language"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0" style="left: inherit; right: 0px;">
                <a href="#" class="dropdown-item active">
                    English
                </a>
                <a href="#" class="dropdown-item ">
                    French
                </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{-- <i class="far fa-bell"></i> --}}
                <i class="fa-solid fa-user"></i>
            </a>
            <div style="left: inherit; right: 0px;"
                class="dropdown-menu dropdown-menu-sm dropdown-menu-right text-center">
                <a href="#" class="dropdown-item">
                    {{__('words.profile_link')}}
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        {{__('words.logout_link')}}
                    </button>
                </form>
            </div>
        </li>

    </ul>
</nav>
