<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
}

