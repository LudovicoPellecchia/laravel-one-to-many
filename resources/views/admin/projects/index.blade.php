@extends("layouts.app")

@section("content")

<h1 class="text-center mt-4">PORTFOLIO</h1>
<div class="container">
    <a href="{{route('admin.projects.create')}}" class="fs-5 link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Aggiungi un nuovo Progetto</a>


    <div class="row row-cols-4 gy-4 mt-4">
        @foreach ($projects as $singleProject )
        <div class="col">
            <div class="card my-card">
                <img src="{{$singleProject->immagine}}"  class="card-img-top" >
                <div class="card-body">
                    <h5 class="card-title">{{$singleProject->titolo}}</h5>
                    <p class="card-text">{{substr($singleProject->descrizione, 0, 150)}}...</p>
                    <h5 class="text-center">{{$singleProject->link_github}}$</h5>
                    <a href="{{route('admin.projects.show', $singleProject->slug)}}" class="btn btn-primary">View More</a>
                </div>
            </div>
        </div>
        @endforeach
</div>

@endsection

