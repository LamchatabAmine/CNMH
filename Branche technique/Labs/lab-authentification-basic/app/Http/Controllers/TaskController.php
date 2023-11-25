<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\TasksRepository;

class TaskController extends Controller
{

    protected $tasksRepository;
    // protected $projectRepository;

    public function __construct(TasksRepository $tasksRepository){
        $this->tasksRepository = $tasksRepository;
    }

    public function index(Project $project = null)
    {
        $projects = Project::all();
        // Use the provided $project or get the first project as default
        $project = $project ?? Project::orderBy('id')->first();

        $tasksQuery = ['project_id' => $project->id];
        $tasks = $this->tasksRepository->index($tasksQuery);
        return view('task.index', compact('tasks','project','projects'));
    }


    public function create(Project $project)
    {
        return view('task.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data['project_id'] = $project->id;

        $this->tasksRepository->store($data);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache créé avec succès');
    }


    public function edit(Project $project, Task $task)
    {
        $task = $this->tasksRepository->edit($task);
        return view('task.edit', ['task' => $task, 'project' => $project]);
    }



    public function update(Request $request, Project $project,Task $task)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data['project_id'] = $project->id;

        $task = $this->tasksRepository->update($data , $task);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache updated avec succès');
    }


    public function destroy(Project $project,Task $task)
    {
        $this->tasksRepository->destroy($task);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'tache supprimé avec succès');
    }


    public function searchTask(Request $request, $project)
    {
        $search = $request->input('search');
        $project = Project::findOrFail($project);

        // Check if the search value is empty
        // $tasksQuery = ['project_id' => $project->id];
        // $tasksQuery = ['name' => $search];

        if (empty($search)) {
            $tasks = $this->tasksRepository->index(['project_id' => $project->id]);
            // $tasks = Task::where('project_id',$project->id)->paginate(3);
        } else {
            $tasks =  $this->tasksRepository->index(['project_id' => $project->id, 'search' => $search]);
            // $tasks = Task::where('project_id', $project->id)->where('name', 'like', '%' . $search . '%')->paginate(3);
        }

        // Controller code
        if ($request->ajax()) {
            return response()->json([
                'table' => view('task.table', compact('tasks', 'project'))->render(),
                'pagination' => $tasks->links()->toHtml(),
            ]);
        }

    }



}
