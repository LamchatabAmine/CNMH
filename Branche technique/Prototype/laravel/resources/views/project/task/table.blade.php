<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>tache 1</td>
            <td>
                Description de tache 1.
            </td>
            <td>
                <a href="{{ route('task.edit') }}" class="btn btn-sm btn-success"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>tache 2</td>
            <td>
                Description de tache 2.
            </td>
            <td>
                <a href="{{ route('task.edit') }}" class="btn btn-sm btn-success"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>tache 3</td>
            <td>
                Description de tache 3.
            </td>
            <td>
                <a href="{{ route('task.edit') }}" class="btn btn-sm btn-success"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
    </tbody>
</table>
