<?php

namespace App\Http\Controllers;

use App\Models\Compentece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompenteceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Compentece::all();
        return view('index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate  data
        $validatedData = $request->validate([
            'References' => 'required',
            'Code' => 'nullable|string',
            'Nom' => 'required',
            'Description' => 'required',
        ]);

        // Create a new instance of the model
        $competence = new Compentece;

        // Assign the input values to the model attributes
        $competence->References = $request->References;
        $competence->Code = $request->Code;
        $competence->Nom = $request->Nom;
        $competence->Description = $request->Description;

        // Save the model to the database
        $competence->save();

        // Redirect to the index page
        return redirect()->route('index')->with("message", "Competence added successfully");
    }


    /**
     * Display the specified resource.
     */
    public function show(Compentece $competence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compentece $id)
    {
        // $competence = compentece::findOrFail($compentece);
        $competence = $id;
        return view('templates.edit', compact('competence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate  data
        $validatedData = $request->validate([
            'References' => 'required',
            'Code' => 'nullable|string',
            'Nom' => 'required',
            'Description' => 'required',
        ]);
        // Find the Id of Competence
        $competence = Compentece::findOrFail($id);
        // Check if the competence exists
        // if (!$competence) {
        //     return redirect()->route('index')->with("error", "Competence not found");
        // }
        // Assign the input values to the model attributes
        $competence->References = $request->References;
        $competence->Code = $request->Code;
        $competence->Nom = $request->Nom;
        $competence->Description = $request->Description;

        // Save the model to the database
        $competence->save();

       // Redirect to the index page
        return redirect()->route('index')->with("message", "Competence Update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Compentece::findOrFail($id);
        $delete->delete();
        return redirect()->route('index')->with("message", "Competence Deleted successfully");
    }
}


