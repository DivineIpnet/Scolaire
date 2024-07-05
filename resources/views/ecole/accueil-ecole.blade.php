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
                    <h1 class="card-title">Bienvenue sur votre page d'ecole {{$ecole->getNom()}} </h1>
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
                              
                    <a href="{{route('ajouter.niveau', $ecole->getId())}}">
                        <button type="button" class="btn btn-outline-primary" id="btn-unview">
                            Ajouter un Niveau (College/Lycee)
                        </button>
                    </a> <br>
                    @foreach ($niveaux as $n)
                    <a href="{{route('lire.classeniv',['idEcol' => $ecole->getId(), 'idNiv' => $n->getId()])}}">
                        <button type="button" class="btn btn-outline-primary" id="btn-unview">
                            <strong>
                                {{$n->getNom()}}
                            </strong>
                        </button>
                    </a><br>
                    @endforeach

                    <a href="{{route('ajouter.classe', $ecole->getId())}}">
                        <button type="button" class="btn btn-outline-primary" id="btn-unview">
                            Ajouter une Classe
                        </button>
                    </a> <br>                   
                  
                    <a href="{{route('ajouter.enseignant', $ecole->getId())}}">
                        <button type="button" class="btn btn-outline-primary" id="btn-unview">
                            Ajouter un(e) Enseignant(e)
                        </button>
                    </a> <br>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>

@endsection

@section('scripts')
    <script>

    </script>
    <script>


    </script>

@endsection
