<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>Tache</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Projet 1</td>
            <td>
                Description de projet 1.
            </td>
            <td>11-7-2014</td>
            <td>11-7-2014</td>
            <td>
                <a href="{{ route('task.index') }}" class="btn btn-sm btn-primary">Preview</a>
            </td>
            <td>
                <a href=" route('project.edit') " class="btn btn-sm btn-default "><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-sm btn-default "><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Projet 2</td>
            <td>
                Description de projet 2.
            </td>
            <td>11-7-2014</td>
            <td>11-7-2014</td>
            <td>
                <a href="{{ route('task.index') }}" class="btn btn-sm btn-primary">Preview</a>
            </td>
            <td>
                <a href=" route('project.edit') " class="btn btn-sm btn-default "><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-sm btn-default "><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Projet 3</td>
            <td>
                Description de projet 3.
            </td>
            <td>11-7-2014</td>
            <td>11-7-2014</td>
            <td>
                <a href="{{ route('task.index') }}" class="btn btn-sm btn-primary">Preview</a>
            </td>
            <td>
                <a href="route('project.edit') " class="btn btn-sm btn-default "><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-sm btn-default "><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
    </tbody>
</table>
