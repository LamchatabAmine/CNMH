<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Exports\TaskExport;
use App\Imports\TaskImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\TaskRepository;
use App\Http\Requests\ProjectTaskRequest;
use App\Repositories\ManageTaskRepository;

class TaskController extends AppBaseController
{
    // protected $manageTaskRepository;

    // public function __construct(ManageTaskRepository $manageTaskRepository)
    // {
    //     $this->manageTaskRepository = $manageTaskRepository;
    // }

    protected $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index(Project $project)
    {
        $projects = Project::all();
        // $project = Project::findOrFail($project);

        // $tasks = $this->manageTaskRepository->getAll($project);
        $tasks = $this->taskRepository->index(['project_id' => $project->id]);


        return view('project.task.index', compact('tasks', 'project', 'projects'));
    }




    public function create(Project $project)
    {

        return view('project.task.create', compact('project'));
    }


    public function store(ProjectTaskRequest $request, Project $project)
    {
        $validatedData = $request->all();
        $validatedData['project_id'] = $project->id;
        $this->taskRepository->store($validatedData);

        // $task = $this->manageTaskRepository->create($data, $project);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache créé avec succès');
    }



    public function edit(Project $project, Task $task)
    {
        $task = $this->taskRepository->edit($task);
        return view('project.task.edit', compact('task', 'project'));
    }


    public function update(ProjectTaskRequest $request, Project $project, Task $task)
    {
        $validatedData = $request->all();
        $validatedData['project_id'] = $project->id;

        $this->taskRepository->update($validatedData, $task);

        // $task = $this->manageTaskRepository->update($project, $task, $data);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'Tache updated avec succès');
    }


    public function destroy(Project $project, Task $task)
    {
        $this->taskRepository->destroy($task);


        // $this->manageTaskRepository->delete($task);

        return redirect()->route('task.index', ['project' => $project])->with('success', 'tache supprimé avec succès');
    }


    public function export(Project $project)
    {
        $tasks = Task::select('name', 'description', 'startDate', 'endDate')
            ->where('project_id', $project->id)
            ->get();
        return Excel::download(new TaskExport($tasks), 'Taches.xlsx');
    }



    public function import(Request $request, Project $project)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        try {
            Excel::import(new TaskImport($project->id), $request->file('file'));
        } catch (\Error $e) {
            return redirect()->route('task.index', $project)->withError('Quelque chose s\'est mal passé, vérifiez votre fichier');
        }
        return redirect()->route('task.index', $project)->with('success', 'Taches a ajouté avec succès');
    }



    public function search(Request $request, Project $project)
    {
        $search = $request->input('search');
        // $project = Project::findOrFail($project);

        // Check if the search value is empty
        if (empty($search)) {
            $tasks = $this->taskRepository->index(['project_id' => $project->id]);

            // $tasks = $this->manageTaskRepository->getAll($project);
        } else {
            $tasks = $this->taskRepository->index(['project_id' => $project->id, 'search' => $search]);

            // $tasks = Task::where('project_id', $project->id)->where('name', 'like', '%' . $search . '%')->paginate(5);
        }

        if ($request->ajax()) {
            return response()->json([
                'table' => view('project.task.table', compact('tasks', 'project'))->render(),
                'pagination' => $tasks->links()->toHtml(),
            ]);
        }
    }

}
