<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectTaskRequest;

use App\Repositories\ManageProjectRepository;

class ProjectController extends Controller
{
    protected $ManageProjectRepository;

    public function __construct(ManageProjectRepository $ManageProjectRepository) {
        $this->ManageProjectRepository = $ManageProjectRepository;
    }


    public function index()
    {
        $projects = $this->ManageProjectRepository->getAll();
        return view('project.index', compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectTaskRequest $request)
    {
        // dd($request);
        $data = $request->all();

        $project = $this->ManageProjectRepository->create($data);

        return redirect()->route('project.index')->with('success', 'projet créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectTaskRequest $request, Project $project)
    {
        $data = $request->all();

        $this->ManageProjectRepository->update($project, $data);

        return redirect()->route('project.index')->with('success', 'projet mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $this->ManageProjectRepository->delete($project);

        return redirect()->route('project.index')->with('success', 'projet supprimé avec succès');
    }
}
