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
                    <h3 class="card-title"> </h3>
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
                <form role="form" action="{{route('ajouter.ecole')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type d ecole</label>
                            <select class="form-control custom-select @error('type') is-invalid @enderror" name="type" style="border-radius:30px;">
                                <option disabled selected>Veuillez sélectionner le type</option>
                                <option value="privee">Privée</option>
                                <option value="public">Publique</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nom</label>
                            <input type="text" name="nom" class="form-control @error('description') is-invalid @enderror" value="{{old('nom')}}">
                            @error('nom')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" name="email" class="form-control @error('motscles') is-invalid @enderror" value="{{old('email')}}">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Votre numero de Telephone</label>
                            <input type="number" name="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{old('telephone')}}">
                            @error('telephone')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ville" class="font-bold font-open mb-2"> Ville</label>
                            <select class="form-control br custom-select @error('ville') is-invalid @enderror" autocomplete="ville" name="nationalite" id="ville">
                                <option disabled selected>Votre choix</option>
                                @foreach ($villes as $v)
                                    <option value="{{ $v->getId() }}" @if (old('ville')==$v->getId()) selected @endif>{{ $v->getNom() }}</option>
                                @endforeach
                            </select>
                            @error('ville')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
