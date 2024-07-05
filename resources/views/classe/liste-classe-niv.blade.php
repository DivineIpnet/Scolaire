@extends('layout')

@section('style')

<!--link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}"-->

@endsection

@section('content')
    <div class="d-flex justify-content-between dashboard-info-head">
        <h1>Classes</h1>
    </div>

    <div style="margin-top: 20px">
        <a href="{{route('ajouter.classe', $ecole->getId())}}">
            <button type="button" class="btn btn-outline-primary" id="btn-unview">
                Ajouter une Classe
            </button>
        </a> <br> 

        <a href="{{route('ajouter.cours', ['idEcol' => $ecole->getId(), 'idNiv' => $idniv] )}}">
            <button type="button" class="btn btn-outline-primary" id="btn-unview">
                Ajouter un Cours
            </button>
        </a> <br>


        <div style="margin-top: 20px" class="d-flex justify-content-between flex-wrap">
            @foreach ($classes as $c)
            <a href="{{route('lire.appreclas',['idEcol' => $ecole->getId(), 'idClas' => $c->getId()])}}">
                <button type="button" class="btn btn-outline-primary" id="btn-unview">
                    <strong>
                        {{$c->getNom()}}
                    </strong>
                </button>

            </a><br>     
        @endforeach

        </div>
    </div>



    <script>

    </script>

@endsection


