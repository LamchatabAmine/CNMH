<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;

class ProjectController extends Controller
{


    protected $projectRepository ;

    public function __construct(ProjectRepository $projectRepository){
        $this->projectRepository = $projectRepository;
    }

    public function index(){
        $this->projectRepository->index();
        return view('search' , compact('tasks'))->render();
    }

    // public function index()
    // {
    //     $projects = Project::paginate(3);
    //     return view('project.index', ['projects' => $projects]);
    // }


    // public function create()
    // {
    //     return view('project.create');
    // }


    // public function store(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //     ]);

    //     // Create a new project
    //     Project::create($request->all());

    //     return redirect()->route('project.index')->with('success', 'projet créé avec succès');
    // }



    // public function edit(Project $project)
    // {
    //     return view('project.edit', ['project' => $project]);
    // }


    // public function update(Request $request, Project $project)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //     ]);

    //     $project->update($request->all());

    //     return redirect()->route('project.index')->with('success', 'projet mis à jour avec succès.');
    // }

    // public function destroy(Project $project)
    // {
    //     $project->delete();
    //     return redirect()->route('project.index')->with('success', 'projet supprimé avec succès');
    // }
}
