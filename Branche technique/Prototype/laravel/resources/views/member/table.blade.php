<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>email</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($members as $item => $member)
            <tr>
                <td>1</td>
                <td>{{ $member->firstName }}</td>
                <td>
                    {{ $member->lastName }}
                </td>
                <td>
                    {{ $member->email }}
                </td>
                <td>
                    <a href="{{ route('member.edit') }}" class="btn btn-sm btn-default"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                    <button type="button" class="btn btn-sm btn-default"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Aucun member trouvé.
                    <a href="{{ route('member.create') }}" class="mx-1">Ajouter member</a>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
