<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();


        //ritorno la lista dei progetti
        return view("admin.projects.index", compact('projects'));
    }

    public function show($slug){
        //recupero il primo progetto nel db che ha quello specifico slug 
        $show_project = Project::where("slug", $slug)->first();

        return view("admin.projects.show", compact("show_project"));
    }

    public function create(){
        return view("admin.projects.create");
    }

    public function store(StoreProjectRequest $request){
        //recupero i dati inseriti nel form create e validati dal FormRequest
        $data = $request->validated();

        //genero uno slug unico per la nuova istanza
        $data["slug"] = $this->generateSlug($data["titolo"]);

        //eseguo fill dei campi dell'istanza (è necessaria la variabile fillable nel Model con tutti i campi), e la salvo nel db
        $newProject = Project::create($data);

        return redirect()->route("admin.projects.show", $newProject->slug);
    }

    public function update(StoreProjectRequest $request, $slug){
        //recupero i dati aggiornati dall'edit e validati dal FormRequest
        $data = $request->validated();

        //recupero il progetto non modificato dal database
        $project = Project::where("slug", $slug)->firstOrFail();

        //se il titolo è stato modificato genero un altro slug
        if ($data["titolo"] !== $project->titolo) {
            $data["slug"] = $this->generateSlug($data["titolo"]);
        }

        //aggiorno e salvo i nuovi dati nel database
        $project->update($data);

        return redirect()->route("admin.posts.show", $project->slug);


    }

    protected function generateSlug($title) {
        $counter = 0;

        do {
            $slug = Str::slug($title) . ($counter > 0 ? "-" . $counter : "");

            $alreadyExists = Project::where("slug", $slug)->first();

            $counter++;
        } while ($alreadyExists);
        return $slug;
    }




}
