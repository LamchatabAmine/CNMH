<?php

namespace App\Repositories;

// use Illuminate\Http\Request;
use App\Models\Project;



class ProjectRepository implements ManageProjectRepository
{

    public function getAll()
    {
        return Project::query()->paginate(5);
    }

    public function create(array $data)
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data)
    {
        $project->update($project, $data);
        return $project;
    }

    public function delete(Project $project)
    {
        return $project->delete();
    }

}
