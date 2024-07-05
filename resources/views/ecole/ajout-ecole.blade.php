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
                    <h3 class="card-title">Ajouter une ecole </h3>
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
                            <label for="type" class="form-label">Type d'ecole</label>
                            <select class="form-control custom-select " name="type" style="border-radius:30px;">
                                <option disabled selected>Veuillez sélectionner le type</option>
                                <option value="privee">Privée</option>
                                <option value="public">Publique</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" class="input form-control" value="{{old('nom')}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="input form-control" value="{{old('email')}}">
                            
                        </div>

                        <div class="form-group">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input type="number" name="telephone" class="input form-control " value="{{old('telephone')}}">
                            
                        </div>

                        <div class="form-section">
                            <label for="ville" class="form-label">Ville</label>
                            <select class="form-control" autocomplete="ville" name="ville" id="ville">
                                   <option disabled selected>Votre choix</option>
                                   @foreach ($villes as $v)
                                       <option value="{{ $v->getId() }}">{{ $v->getName() }}</option>
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
    <script>
        window.onload = function(e) {
            $('.ville').hide();
        }
    </script>
    <script>

        function seevillles() {
            if(document.getElementById('pays').value != ''){
                $('.ville').show();
                $('#champ').val($villes);

            }
        }
    </script>

@endsection
