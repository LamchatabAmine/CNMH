<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectTaskRequest;
use App\Models\Project;

use App\Repositories\ManageTaskRepository;

class TaskController extends Controller
{

    protected $manageTaskRepository;

    public function __construct(ManageTaskRepository $manageTaskRepository) {
        $this->manageTaskRepository = $manageTaskRepository;
    }

    /**
     * Display a listing of the resource.
     */

    // public function index(Request $request, Project $project)
    // {
    //     // Assuming you want to find the project by ID
    //     // $project = Project::find($projectId);
    //     // abort_unless($project, 404, 'Project not found');
    //     // abort_if(!$project, 404, 'Project not found');

    //     $tasks = $this->manageTaskRepository->getAll($project);
    //     return view('project.task.index', compact('tasks', 'project'));
    // }

    public function index(Request $request, Project $project)
    {
        $projects  = Project::paginate(2);
        $tasks = $this->manageTaskRepository->getAll($project);
        return view('project.task.index', compact('tasks', 'project','projects'));
    }

    public function tasks(Request $request)
    {
        $project = Project::first(); // Retrieve the first project
        $tasks = $this->manageTaskRepository->getTasks($project);

        return view('project.task.index', compact('tasks', 'project'));
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
    public function store(ProjectTaskRequest $request, Project $project)
    {
        // dd($request);
        $data = $request->all();

        $task = $this->manageTaskRepository->create($data, $project);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache créé avec succès');
        // return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project , Task $task)
    {
        return view('project.task.edit', compact('task','project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectTaskRequest $request, Project $project, Task $task)
    {
        $data = $request->all();

        $task = $this->manageTaskRepository->update($project, $task, $data);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache updated avec succès');
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Task $task)
    {
        $this->manageTaskRepository->delete($task);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'tache supprimé avec succès');
    }
}
