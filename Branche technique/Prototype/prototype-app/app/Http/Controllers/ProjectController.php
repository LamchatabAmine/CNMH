<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Exports\ProjectExport;
use App\Imports\ProjectImport;
use Maatwebsite\Excel\Facades\Excel;
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
        // if ($request->ajax()) {
        //     return view('project.index', compact('projects'));
        // }

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


    public function export()
    {
        $projects = Project::all();

        return Excel::download(new ProjectExport($projects),'projects.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        try {
            Excel::import(new ProjectImport, $request->file('file'));
        } catch (\Error $e) {
            return redirect()->route('project.index')->withError('Quelque chose s\'est mal passé, vérifiez votre fichier');
        }
        return redirect()->route('project.index')->with('success', 'Projet a ajouté avec succès');
    }





    public function searchProject(Request $request)
    {
        $searchValue = $request->input('searchValue');

        // Check if the search value is empty
        if (empty($searchValue)) {
            $projects = Project::paginate(5); // Return the initial state without filtering
            //  $pagination = $projects->links()->toHtml(); // Get pagination links
        } else {
            $projects = Project::where('name', 'like', '%' . $searchValue . '%')->paginate(5);
            // $pagination = $projects->links()->toHtml(); // Get pagination links
        }

        if ($request->ajax()) {
            return response()->json([
            'table' => view('project.table', compact('projects'))->render(),
            'pagination' => $projects->links()->toHtml(), // Get pagination links
            ]);
        }

    }







}
