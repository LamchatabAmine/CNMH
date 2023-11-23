<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Project $project)
    {
        $projects = Project::paginate(3);
        $tasks = Task::where('project_id',$project->id)->paginate(3);
        return view('project.task.index', compact('tasks', 'project', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('project.task.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data['project_id'] = $project->id;

        Task::create($data);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache créé avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Task $task)
    {
        return view('project.task.edit', ['task' => $task, 'project' => $project]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project,Task $task)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data['project_id'] = $project->id;

        $task->update($data);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache updated avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project,Task $task)
    {
        $task->delete();

        return redirect()->route('task.index', ['project' => $project])->with('success', 'tache supprimé avec succès');
    }
}
