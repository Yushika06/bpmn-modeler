<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Modeler;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjectController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        // Fetch all projects
        $projects = Project::all();
        $users = auth()->id();

        $projects = Project::where('user_id', $users)->get();

        // Return view with project data
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::all();
        return view('projects.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->user_id = auth()->id(); // or $request->user()->id
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);
    
        $modeler = $project->modeler;
    
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
    
    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $project->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    
        return redirect()->route('projects.show', $project->id)->with('success', 'Project updated successfully.');
    }
}
