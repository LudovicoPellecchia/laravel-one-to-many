<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $dati = Project::all();

        return view("admin.project.index", compact($dati));
    }

    public function show($id){
        $dati = Project::findOrFail($id);

        return view("admin.project.show", compact($dati))


    }

    public function create(){

    }

    public function store(){

    }
}
