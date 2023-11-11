<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository implements ManageRepository {
    public function getAll() {
        return Project::paginate(2);
    }

    public function find($id) {
        return Project::find($id);
    }

    public function create(array $data) {
        return Project::create($data);
    }

    public function update($id, array $data) {
        $Project = Project::find($id);
        if ($Project) {
            $Project->update($data);
        }
        return $Project;
    }


    public function delete($id) {
        return Project::destroy($id);
    }

    public function search($search) {
        // $searchQuery = $search;

        // $results = Stagiaire::where('name', 'like', '%' . $searchQuery . '%')
        //     ->orWhere('email', 'like', '%' . $searchQuery . '%')
        //     ->paginate(2);

        //     return $results;
    }

}
