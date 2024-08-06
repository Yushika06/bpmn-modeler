<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Modeler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModelerController extends Controller
{
    public function show($projectId)
    {
        // Fetch the project details
        $project = Project::findOrFail($projectId);

        // Check if a modeler exists for this project
        $modeler = Modeler::where('project_id', $projectId)->first();

        if ($modeler) {
            $filePath = public_path('bpmn/' . $modeler->bpmn);
            if (file_exists($filePath)) {
                $bpmnXml = file_get_contents($filePath);
            } else {
                $bpmnXml = '';
            }
        } else {
            $bpmnXml = '';
        }

        return view('projects.show', compact('project', 'bpmnXml'));
    }

    public function create(Request $request)
    {
        $project_id = $request->input('project_id');
        return view('modeler.create', compact('project_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bpmnXml' => 'required',
        ]);

        $bpmnXml = $request->input('bpmnXml');
        $project_id = $request->input('project_id');

        $modeler = new Modeler();
        $modeler->bpmn = $bpmnXml;
        $modeler->project_id = $project_id;
        $modeler->save();

        return redirect()->route('modeler.edit', $modeler->id)->with('success', 'BPMN model created successfully.');
    }

    public function edit($id)
    {
        $modeler = Modeler::find($id);
        return view('modeler.edit', [
            'modeler' => $modeler,
            'bpmnXml' => $modeler->bpmnXml,
            'project_id' => $modeler->project_id
        ]);
    }

    public function update(Request $request, $id)
    {
        $modeler = Modeler::find($id);
        $modeler->bpmnXml = $request->input('bpmnXml');
        $modeler->save();
    
        return redirect()->route('modeler.edit', $id)->with('success', 'BPMN updated successfully');
    }
}
    
    // public function import(Request $request)
    // {
    //     $request->validate([
    //         'bpmn_file' => 'required|mimes:xml|max:10240', // XML file max 10MB
    //     ]);

    //     $file = $request->file('bpmn_file');
    //     $bpmnXml = file_get_contents($file->getRealPath());

    //     $modeler = Modeler::findOrFail($request->input('modeler_id'));
    //     $modeler->bpmn = $bpmnXml;
    //     $modeler->save();

    //     return redirect()->route('modeler.edit', $modeler->id)->with('success', 'BPMN XML imported successfully.');
    // }

    // public function export($id)
    // {
    //     $modeler = Modeler::findOrFail($id);
    //     $bpmnXml = $modeler->bpmn;

    //     return response()->streamDownload(function () use ($bpmnXml) {
    //         echo $bpmnXml;
    //     }, 'modeler_' . $modeler->id . '.bpmn');
    // }

