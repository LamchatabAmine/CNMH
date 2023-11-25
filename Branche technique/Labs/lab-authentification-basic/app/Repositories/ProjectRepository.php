<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\BaseRepository;

class ProjectRepository extends BaseRepository {

    // protected $project;
    protected $fillable = [
        'name',
        'description',
    ];

    public function __construct(Project $project){
        $this->model = $project;
    }

    public function getFieldData():array {
        return $this->fillable;
        // return $this->project->attributesToArray();
    }

    public function model():string{
        return Project::class;
    }
}
