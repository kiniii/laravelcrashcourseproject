<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectCommentsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Facade;
use Spatie\YamlFrontMatter\YamlFrontMatter;



Route::get('/', [ProjectController::class, 'index'])->name('home');

Route::get('projects/{project:slug}', [ProjectController::class, 'show']);
Route::post('projects/{project:slug}/comments', [ProjectCommentsController::class, 'store']);

// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('projects', [
//         'projects' => $category->projects,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');


// Route::get('projectmembers/{projectmember:username}', function (User $projectmember) {
//     return view('projects.index', [
//         'projects' => $projectmember,

//     ]);
// });


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/projects/create', [ProjectController::class, 'create'])->middleware('admin');
