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
            'fileName' => 'required|string|max:255'
        ]);
    
        $bpmnXml = $request->input('bpmnXml');
        $fileName = $request->input('fileName') . '.bpmn';
    
        // Save XML content to database
        $modeler = new Modeler();
        $modeler->xml_content = $bpmnXml;
        $modeler->file_name = $fileName;
        $modeler->save();
    
        // Save the file to public/bpmn directory
        Storage::disk('public')->put('bpmn/' . $fileName, $bpmnXml);
    
        return redirect()->route('modeler.edit', $modeler->id)->with('success', 'BPMN model created successfully.');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'bpmnXml' => 'required',
            'fileName' => 'required|string|max:255'
        ]);
    
        $modeler = Modeler::findOrFail($id);
        $bpmnXml = $request->input('bpmnXml');
        $fileName = $request->input('fileName') . '.bpmn';
    
        // Update XML content in database
        $modeler->xml_content = $bpmnXml;
        $modeler->file_name = $fileName;
        $modeler->save();
    
        // Save the file to public/bpmn directory
        Storage::disk('public')->put('bpmn/' . $fileName, $bpmnXml);
    
        return redirect()->route('modeler.edit', $modeler->id)->with('success', 'BPMN model updated successfully.');
    }
    public function import(Request $request)
    {
        $request->validate([
            'bpmn_file' => 'required|mimes:xml|max:10240', // XML file max 10MB
        ]);

        $file = $request->file('bpmn_file');
        $bpmnXml = file_get_contents($file->getRealPath());

        // Assuming $modeler is the BPMN model instance related to the project.
        // Fetch the modeler instance related to the project
        // You might need to pass the project ID or modeler ID in the request
        $modeler = Modeler::findOrFail($request->input('modeler_id'));
        $modeler->xml_content = $bpmnXml;
        $modeler->save();

        return redirect()->route('modeler.edit', $modeler->id)->with('success', 'BPMN XML imported successfully.');
    }

    /**
     * Export BPMN XML file.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function export($id)
    {
        $modeler = Modeler::findOrFail($id);
        $bpmnXml = $modeler->xml_content;

        return response()->streamDownload(function () use ($bpmnXml) {
            echo $bpmnXml;
        }, 'modeler_' . $modeler->id . '.bpmn');
    }
}
