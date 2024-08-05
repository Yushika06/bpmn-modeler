<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Modeler;
use Illuminate\Http\Request;

class ModelerController extends Controller
{
    public function show($projectId)
    {
        // Fetch the project details
        $project = Project::findOrFail($projectId);

        // Check if a modeler exists for this project
        $modeler = Modeler::where('project_id', $projectId)->first();

        return view('project.show', compact('project', 'modeler'));
    }
    public function create(Request $request)
    {
        $projectId = $request->query('project_id');
        // Return the view for creating a new modeler, passing the project ID
        return view('projects.modelers.create', compact('projectId'));
    }

    public function edit($id)
    {
        $modeler = Modeler::findOrFail($id);
        // Return the view for editing the modeler
        return view('projects.modelers.edit', compact('modeler'));
    }
}
