<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tasks as $index => $task)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $task->name }}</td>
                <td>
                    {{ $task->description }}
                </td>
                <td>
                    {{ $task->startDate }}
                </td>
                <td>
                    {{ $task->endDate }}
                </td>
                <td>
                    <a href="{{ route('task.edit', ['project' => $project, 'task' => $task]) }}"
                        class="btn btn-sm btn-default "><i class="fa-solid fa-pen-to-square"></i></a>
                    <form method="POST" action="{{ route('task.destroy', ['project' => $project, 'task' => $task]) }}"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-default">
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
        {{-- <tr>
            <td>1</td>
            <td>tache 1</td>
            <td>
                Description de tache 1.
            </td>
            <td>
                <a href="{{ route('task.edit') }}" class="btn btn-sm btn-default "><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-sm btn-default "><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>tache 2</td>
            <td>
                Description de tache 2.
            </td>
            <td>
                <a href="{{ route('task.edit') }}" class="btn btn-sm btn-default "><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-sm btn-default "><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>tache 3</td>
            <td>
                Description de tache 3.
            </td>
            <td>
                <a href="{{ route('task.edit') }}" class="btn btn-sm btn-default "><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-sm btn-default "><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr> --}}
    </tbody>
</table>
