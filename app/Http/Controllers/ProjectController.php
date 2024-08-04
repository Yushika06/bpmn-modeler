<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Modeler;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show()
    {
        // Fetch all projects
        $projects = Project::all();

        // Return view with project data
        return view('projects.show', compact('projects'));
    }
    public function create()
    {

        $users = User::all();
        $modeler = Modeler::all();

        return view('projects.create', compact('users', 'modeler'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // add more validate if require
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->user_id = auth()->id(); // or $request->user()->id
        $project->save();

        return redirect()->route('projects.show')->with('success', 'Project created successfully.');
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            // Update other necessary fields
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function requestCancel(Request $request, Project $project)
    {
        // Handle the request to cancel
        // For example, you can send a notification to the admin
        // or update the project's status to 'pending cancelation'

        // Example: Update the project's status
        $project->update(['status' => 'pending cancelation']);

        return redirect()->route('projects.index')->with('success', 'Cancelation request sent successfully.');
    }
}

