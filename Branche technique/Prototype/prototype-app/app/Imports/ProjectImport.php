<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;
// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProjectImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        try {
            return new Project([
                'name'     => $row["nom"],
                'description'    => $row["description"],
                'startDate'   => Carbon::createFromFormat('Y-m-d', $row["date_debut"])->format('Y-m-d H:i:s'),
                'endDate'     => Carbon::createFromFormat('Y-m-d', $row["date_fin"])->format('Y-m-d H:i:s')
            ]);
        } catch (\ErrorException  $e) {
            return redirect()->route('project.index')->withError('Quelque chose s\'est mal passé, vérifiez votre fichier');
        }
    }



    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row)
    //     {
    //         Project::create([
    //             'name'  => $row[0],
    //             'description'    => $row[1],
    //             'startDate' => $row[2],
    //             'endDate' => $row[2],
    //         ]);
    //     }
    // }





}


