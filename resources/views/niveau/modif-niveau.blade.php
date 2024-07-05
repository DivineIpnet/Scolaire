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
                <form role="form" action="{{route('ajouter.niveau')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="genre">Nom</label>
                            <select class="form-control custom-select " name="nom" style="border-radius:30px;">
                                <option disabled selected>Sélectionner le niveau</option>
                                <option value="colege">Colège</option>
                                <option value="lycee">Lycée</option>
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
