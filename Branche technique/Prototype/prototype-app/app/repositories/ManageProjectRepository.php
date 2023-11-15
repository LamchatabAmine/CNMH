<?php

namespace App\Repositories;

use App\Models\Project;

interface ManageProjectRepository {
    public function getAll();
    // public function find($id);
    public function create(array $data);
    public function update(Project $project, array $data);
    public function delete(Project $project);
}
