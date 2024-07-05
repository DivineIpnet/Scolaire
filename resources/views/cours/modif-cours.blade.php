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
                    <h3 class="card-title">Modifier le cours </h3>
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
                <form role="form" action="{{route('modifier.cours')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" class="input form-control" value="{{$cours->getNom()}}">
                        </div>
                        <div class="form-group">
                            <label for="coeficient" class="form-label">Coeficient</label>
                            <input type="number" name="coeficient" class="input form-control" value="{{$cours->getCoeficient()}}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="input form-control" value="{{$cours->getDescription()}}">
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
