<table class="table table-striped text-nowrap ">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            @can('edit-Task')
                <th>Action</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @forelse ($tasks as  $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>
                    {{ $task->description }}
                </td>
                @can('edit-Task', 'destroy-Task')
                    {{-- @can('destroy-Task') --}}
                    <td>
                        <a href="{{ route('task.edit', ['project' => $project, 'task' => $task]) }}"
                            class="btn btn-sm btn-default "><i class="fa-solid fa-pen-to-square"></i></a>
                        <form method="POST" action="{{ route('task.destroy', ['project' => $project, 'task' => $task]) }}"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            {{-- onclick="return confirm('Are you sure?')" --}}
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                    {{-- @endcan --}}
                @endcan
            </tr>
        @empty
            <tr>
                <td colspan="6">Aucun tache trouvé.
                    @can('create-Task')
                        <a href="{{ route('task.create', $project) }}" class="mx-1">Ajouter tache</a>
                    @endcan
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
