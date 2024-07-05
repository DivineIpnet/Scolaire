@extends('layout')

@section('style')


@endsection 

@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ajouter un niveau </h3>
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
                <form role="form" action="{{route('ajouter.niveau', $idEcol)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <div class="form-group">
                            <label for="type" class="form-label">Nom</label>
                            <select class="form-control custom-select " name="nom" style="border-radius:30px;">
                                <option disabled selected>Veuillez sélectionner le type</option>
                                <option value="college">College</option>
                                <option value="lycee">Lycee</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nom" class="form-label">Periode</label>
                            <select class="form-control custom-select " name="periode" style="border-radius:30px;">
                                <option disabled selected></option>
                                <option value="trimestre">Trimestre</option>
                                <option value="semestre">Semestre</option>
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
