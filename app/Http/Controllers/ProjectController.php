<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' =>  Project::latest()->filter(
                request(['search', 'category', 'projectmember'])
                // Om de paginate te stylen, voer in de cmd: php artisan vendor:publish -> 17(laravel-pagination)
            )->paginate(6)->withQueryString()
        ]);
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }
}
