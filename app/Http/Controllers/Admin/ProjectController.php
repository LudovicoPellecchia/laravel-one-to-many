<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();

        return view("admin.projects.index", compact('projects'));
    }

    public function show($id){
        $show_project = Project::findOrFail($id);

        return view("admin.projects.show", compact($show_project));

    }

    public function create(){
        return view("admin.projects.create");


    }

    public function store(){

    }
}
