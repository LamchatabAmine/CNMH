<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\Project;

class TaskRepository implements ManageTaskRepository {
    // public function getAll() {
    //     // return Task::orderBy('startDate', 'asc')->paginate(5);
    //     return Task::paginate(2);
    // }

    public function getAll(Project $project)
    {
        // if (!$project) {
        //     return
        // }
        // Retrieve all tasks for the given project
        return Task::where('project_id', $project->id)->paginate(5);
    }


    public function create(array $data, Project $project)
    {
        // Set the project_id in the data array
        $data['project_id'] = $project->id;

        return Task::create($data);
    }


    public function update(Project $project, Task $task, array $data) {
        $data['project_id'] = $project->id;
        $task->update($data);
        return $task;
    }


    public function delete(Task $task) {
        return  $task->delete();
    }

    public function search($search) {
        // $searchQuery = $search;

        // $results = Stagiaire::where('name', 'like', '%' . $searchQuery . '%')
        //     ->orWhere('email', 'like', '%' . $searchQuery . '%')
        //     ->paginate(2);

        //     return $results;
    }

}
