<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('task.index') }}" class="nav-link {{ Request::is('task.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('task.create', $project) }}" class="nav-link {{ Request::is('task.create') ? 'active' : '' }}">
        {{-- <i class="nav-icon fas fa-home"></i> --}}
        <i class="nav-icon  fa fa-plus"></i>

        <p>Ajouter</p>
    </a>
</li>
