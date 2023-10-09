@extends("layouts.app")

@section("content")

<h1 class="text-center mt-4">{{$show_project->titolo}}</h1>
<div class="container">
    <div class="card">
        <img src={{$show_project->immagine}} class="card-img-top" >
        <div class="card-body">
            <h5 class="card-title">{{$show_project->titolo}}</h5>
            <p class="card-text">{{$show_project->descrizione}}</p>
        </div>
    </div>

    <div>
        <a href="{{route('admin.projects.index')}}"><button class="btn btn-primary mt-5">Torna Indietro</button></a>
    </div>
</div>

@endsection