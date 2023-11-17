<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function headings(): array{
        return [
            'Nom',
            'Description',
            'Date debut',
            'Date fin',
        ];
    }

    public function collection()
    {
        // return $this->data->toArray();

        // Transform the data before exporting
        return $this->data->map(function ($project) {
            return [
                'Nom' => $project->name,
                'Description' => $project->description,
                'Date debut' => $project->startDate,
                'Date fin' => $project->endDate,
            ];
        });

    }
}
