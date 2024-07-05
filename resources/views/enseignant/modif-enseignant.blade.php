@extends('layout')

/* @section('style')

<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

@endsection */

@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ajouter un enseignant</h3>
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
                <form role="form" action="{{route('ajouter.enseignant')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" class="input form-control" value="{{$enseignant->getNom()}}">
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="form-label">Prenoms</label>
                            <input type="text" name="prenom" class="input form-control" value="{{$enseignant->getPrenom()}}">
                        </div>
                        <div class="form-group">
                            <label for="naissance" class="form-label">Date de naissance</label>
                            <input type="date" name="datenais" class="input form-control" value="{{$enseignant->getDateNaissance()}}">
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <select class="form-control custom-select " name="genre" style="border-radius:30px;">
                                <option disabled selected>Sélectionner le genre</option>
                                <option value="feminin">Feminin</option>
                                <option value="Masculin">Masculin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input type="number" name="telephone" class="input form-control " value="{{$enseignant->getTelephone()}}">
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" name="Adresse" class="input form-control " value="{{$enseignant->getAdresse()}}">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="input form-control " value="{{$enseignant->getEmail()}}">
                        </div> 
                        <div class="form-group">
                            <label for="situation">Situation</label>
                            <select class="form-control custom-select " name="situation" style="border-radius:30px;">
                                <option disabled selected>Sélectionner</option>
                                <option value="celibataire">Celibataire</option>
                                <option value="marie">Marié</option>
                            </select>
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
