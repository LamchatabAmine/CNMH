<table class="table table-striped text-nowrap ">
    <thead>
        <tr>
            {{-- <th>#</th> --}}
            <th>Nom</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tasks as  $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>
                    {{ $task->description }}
                </td>
                <td>
                    <a href="{{ route('task.edit', ['project' => $project, 'task' => $task]) }}"
                        class="btn btn-sm btn-default ">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
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
            </tr>
        @empty
            <tr>
                <td colspan="6">Aucun tache trouvé.
                    <a href="{{ route('task.create', $project) }}" class="mx-1">Ajouter tache</a>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
