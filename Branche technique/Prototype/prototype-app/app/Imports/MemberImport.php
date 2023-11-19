<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MemberImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            return new Member([
                'firstName'     => $row["prenom"],
                'lastName'    => $row["nom"],
                'email'   => $row["email"],
                'password'   => bcrypt($row["mot_de_passe"]),
            ]);
        } catch (\ErrorException  $e) {
            return redirect()->route('member.index')->withError('Quelque chose s\'est mal passé, vérifiez votre fichier');
        }
    }
}
