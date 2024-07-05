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
                    <h3 class="card-title">Ajouter un cours </h3>
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
                <form role="form" action="{{route('ajouter.cours', ['idEcol' => $ecole->getId(), 'idNiv' => $idniv])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" id="nom" name="nom" class="input form-control" value="{{old('nom')}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="coeficient" class="form-label">Coeficient</label>
                            <input type="number" id="coeficient" name="coeficient" class="input form-control" value="{{old('coeficient')}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" id="description" name="description" class="input form-control" value="{{old('description')}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="classe" class="form-label">Classe</label>
                            <select class="form-control custom-select " name="classe" id="classe" style="border-radius:30px;">
                                <option disabled selected>Sélectionner la classe</option>
                                 @foreach ($clas as $c)
                                    <option value="{{ $c->getId() }}">{{ $c->getNom()}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="enseignant" class="form-label">Enseignant</label>
                            <select class="form-control custom-select " name="enseignant" id="enseignant" style="border-radius:30px;">
                                <option disabled selected>Sélectionner l'enseignant</option>
                                 @foreach ($ens as $e)
                                    <option value="{{ $e->getId() }}">{{ $e->getNom().' '.$e->getPrenoms() }}</option>
                                @endforeach
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
