<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\Project;

interface ManageTaskRepository {
    public function getAll(Project $project);
    // public function find($id);
    public function create(array $data, Project $project);
    public function update(Project $project, Task $task, array $data);
    public function delete(Task $task);
}
