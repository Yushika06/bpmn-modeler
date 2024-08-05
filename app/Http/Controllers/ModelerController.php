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
    public function create($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('modeler.create', compact('project'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bpmn' => 'required',
        ]);

        $modeler = Modeler::create([
            'project_id' => $request->project_id,
            'bpmn' => '',
        ]);

        $fileName = 'bpmn_' . $modeler->id . '.xml';
        $filePath = public_path('bpmn/' . $fileName);

        // Save the BPMN XML to a file
        file_put_contents($filePath, $request->bpmn);

        // Update the modeler record with the file name
        $modeler->update([
            'bpmn' => $fileName,
        ]);

        return redirect()->route('projects.show', $modeler->project_id);
    }

    public function update(Request $request, Modeler $modeler)
    {
        $request->validate([
            'bpmn' => 'required',
        ]);

        $fileName = 'bpmn_' . $modeler->id . '.xml';
        $filePath = public_path('bpmn/' . $fileName);

        // Save the BPMN XML to a file
        file_put_contents($filePath, $request->bpmn);

        // Update the modeler record with the file name
        $modeler->update([
            'bpmn' => $fileName,
        ]);

        return redirect()->route('projects.show', $modeler->project_id);
    }



}
