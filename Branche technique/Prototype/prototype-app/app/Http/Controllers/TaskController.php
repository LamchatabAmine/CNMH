<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Exports\TaskExport;
use App\Imports\TaskImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProjectTaskRequest;
use App\Repositories\ManageTaskRepository;

class TaskController extends Controller
{

    protected $manageTaskRepository;

    public function __construct(ManageTaskRepository $manageTaskRepository) {
        $this->manageTaskRepository = $manageTaskRepository;
    }

    public function index(Request $request, $project)
    {
        $projects = Project::all();
        $project = Project::findOrFail($project);

        $tasks = $this->manageTaskRepository->getAll($project);

        return view('project.task.index', compact('tasks', 'project', 'projects'));
    }





    public function create(Project $project)
    {

        return view('project.task.create', compact('project'));
    }


    public function store(ProjectTaskRequest $request, Project $project)
    {
        // dd($request);
        $data = $request->all();

        $task = $this->manageTaskRepository->create($data, $project);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache créé avec succès');
        // return back();
    }


    public function show(Task $task)
    {
        //
    }


    public function edit(Project $project , Task $task)
    {
        return view('project.task.edit', compact('task','project'));
    }


    public function update(ProjectTaskRequest $request, Project $project, Task $task)
    {
        $data = $request->all();

        $task = $this->manageTaskRepository->update($project, $task, $data);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache updated avec succès');
        // return back();
    }


    public function destroy(Project $project, Task $task)
    {
        $this->manageTaskRepository->delete($task);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'tache supprimé avec succès');
    }


    public function export(Project $project)
    {
        $tasks = Task::select('name', 'description', 'startDate', 'endDate')
                ->where('project_id', $project->id)
                ->get();
        // $tasks = Task::select('name', 'description', 'startDate', 'endDate')->get();
        return Excel::download(new TaskExport($tasks),'Taches.xlsx');
    }



    public function import(Request $request, Project $project)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        try {
            Excel::import(new TaskImport($project->id), $request->file('file'));
            // Excel::import(new TaskImport, $request->file('file'));
        } catch (\Error $e) {
            return redirect()->route('task.index', $project)->withError('Quelque chose s\'est mal passé, vérifiez votre fichier');
        }
        return redirect()->route('task.index', $project)->with('success', 'Taches a ajouté avec succès');
    }



    public function searchTask(Request $request, $project)
    {
        $search = $request->input('search');
        $project = Project::findOrFail($project);

        // Check if the search value is empty
        if (empty($search)) {
            $tasks = $this->manageTaskRepository->getAll($project);
        } else {
            $tasks = Task::where('project_id', $project->id)->where('name', 'like', '%' . $search . '%')->paginate(5);
        }

        // Controller code
        if ($request->ajax()) {
            return response()->json([
                'table' => view('project.task.table', compact('tasks', 'project'))->render(),
                'pagination' => $tasks->links()->toHtml(),
            ]);
        }

    }
}
