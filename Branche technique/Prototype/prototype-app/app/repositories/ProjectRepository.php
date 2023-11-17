<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository implements ManageProjectRepository {
    public function getAll() {
        // return Project::orderBy('startDate', 'asc')->paginate(5);
        return Project::paginate(10);
    }

    // public function find($id) {
    //     return Project::find($id);
    // }

    public function create(array $data) {
        return Project::create($data);
    }

    public function update(Project $project, array $data) {
        // $Project = Project::find($id);
        // if ($Project) {
        //     $Project->update($data);
        // }
        // dd($project);
        $project->update($data);

        return $project;
    }


    public function delete(Project $project) {
        return  $project->delete();
    }

    public function search($search) {
        // $searchQuery = $search;

        // $results = Stagiaire::where('name', 'like', '%' . $searchQuery . '%')
        //     ->orWhere('email', 'like', '%' . $searchQuery . '%')
        //     ->paginate(2);

        //     return $results;
    }

}
