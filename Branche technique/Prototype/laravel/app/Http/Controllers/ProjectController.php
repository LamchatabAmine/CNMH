<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectTaskRequest;

use App\Repositories\ManageRepository;

class ProjectController extends Controller
{
    protected $manageRepository;

    public function __construct(ManageRepository $manageRepository) {
        $this->manageRepository = $manageRepository;
    }


    public function index()
    {
        return view('project.index');
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

        $project = $this->manageRepository->create($data);

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
        return view('project.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
