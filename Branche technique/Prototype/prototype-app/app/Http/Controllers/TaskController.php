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

    public function index(Request $request, Project $project)
    {
        $projects = Project::all();

        $tasks = $this->manageTaskRepository->getAll($project);

        return view('project.task.index', compact('tasks', 'project', 'projects'));
    }


    // public function getTasksByProject(Request $request, $projectId)
    // {
    //     $project = Project::findOrFail($projectId);
    //     $tasks = Task::where('project_id', $project->id)->paginate(5);
    //     // $tasks = $this->manageTaskRepository->getAll($project);

    //     return response()->json([
    //         'table' => view('project.task.index', compact('tasks'))->render(),
    //         'pagination' => $tasks->links()->toHtml(), // Get pagination links
    //     ]);
    //     // return response()->json(['tasks' => $tasks, 'project' => $project]);
    // }

    public function getTasksByProject(Request $request, $projectId)
    {
        $project = Project::findOrFail($projectId);
        $tasks = Task::where('project_id', $project->id)->paginate(5);

        if ($request->ajax()) {
            return response()->json([
            'table' => view('project.task.table', compact('tasks'))->render(),
            'pagination' => $tasks->links()->toHtml(), // Get pagination links
            ]);
        }
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



//    public function filterTasks(Request $request)
// {
//     $project_id = $request->input('filterTasks');

//     // Assuming 'id' is the primary key field of your 'tasks' table
//     // Change 'id' to the actual primary key column of your 'tasks' table
//     $tasks = Task::where('project_id', '=', $project_id)->paginate(3);

//     // Return the filtered tasks to the view or as JSON, depending on your needs
//     return response()->json(['tasks' => $tasks]);
// }



}
