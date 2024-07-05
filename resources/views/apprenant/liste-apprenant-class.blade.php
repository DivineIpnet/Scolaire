@extends('layout')

@section('style')

<!--link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}"-->

@endsection

@section('content')
    <div class="d-flex justify-content-between dashboard-info-head">
        <h1>Apprenants</h1>
    </div>

    <div style="margin-top: 20px">
        <div class="d-flex justify-content-between flex-wrap">
            <h3>Liste</h3>

            @foreach ($apprenants as $a)
            <a href="">
                <button type="button" class="btn btn-outline-primary" id="btn-unview">
                    <strong>
                        {{$a->getNom()}}
                    </strong>
                </button>

            </a>    
            @endforeach

        </div>

        <a href="{{route('ajouter.apprenant',['idEcol' => $ecole->getId(), 'idClas' => $classe->getId()])}}">
            <button type="button" class="btn btn-outline-primary" id="btn-unview">
                Ajouter un Apprenant
            </button>
        </a> <br> 
    </div>


@endsection


