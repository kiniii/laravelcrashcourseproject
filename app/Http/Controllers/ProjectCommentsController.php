<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectCommentsController extends Controller
{
    public function store(Project $project)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $project->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
