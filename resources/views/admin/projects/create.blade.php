@extends("layouts.app")

@section("content")

<div class="container">
    <form action="{{route('admin.projects.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf()

        <div class="mb-3">
            <label class="form-label mb-1">Titolo </label>
            <input type="text" class="form-control" name="titolo">
        </div>

        <div class="mb-3">
            <label class="form-label mb-1">Immagine </label>
            <input type="file" class="form-control" name="immagine">
        </div>

        <div class="mb-3">
            <label class="form-label mb-1">Descrizione </label>
            <textarea type="text" class="form-control" name="descrizione"
                placeholder="Inserisci una descrizione"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label mb-1">Seleziona un Tipo </label>
            <select type="text" class="form-control" name="type_id">

                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{$type->name}}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label mb-1">Link_github </label>
            <input type="text" class="form-control" name="link_github">
        </div>


        <button class="btn btn-primary mt-4">Aggiungi Progetto</button></a>
    </form>
</div>


@endsection