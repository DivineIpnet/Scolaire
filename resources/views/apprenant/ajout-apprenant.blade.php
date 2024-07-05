@extends('layout')

@section('style')

<!--link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}"-->

@endsection

@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ajouter un apprenant </h3>
                </div>
                @if (Session::has('mess'))
                <script>
                    Swal.fire(
                    'Parfait',
                    '{{session("mess")}}',
                    'success'
                    )
                </script>
                @endif
                <form role="form" action="{{route('ajouter.apprenant',['idEcol' => $ecole->getId(), 'idClas' => $classe->getId()])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" id="nom" name="nom" class="input form-control" value="{{old('nom')}}">
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="form-label">Prenoms</label>
                            <input type="text" id="prenom" name="prenom" class="input form-control" value="{{old('prenom')}}">
                        </div>
                        <div class="form-group">
                            <label for="naissance" class="form-label">Date de naissance</label>
                            <input type="date" id="naissance" name="datenais" class="input form-control" value="{{old('datenais')}}">
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <select class="form-control custom-select" id="genre" name="genre" style="border-radius:30px;">
                                <option disabled selected>Sélectionner le genre</option>
                                <option value="privee">Feminin</option>
                                <option value="public">Masculin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" id="adresse" name="adresse" class="input form-control" value="{{old('adresse')}}">
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input type="number" id="telephone" name="telephone" class="input form-control " value="{{old('telephone')}}">
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>

@endsection

@section('scripts')


@endsection
