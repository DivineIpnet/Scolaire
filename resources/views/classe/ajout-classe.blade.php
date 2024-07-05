@extends('layout')

@section('style')

<!--link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}"-->

@endsection 

@section('content')

@if (Session::has('mess'))
<script>
    Swal.fire(
        'Parfait',
        '{{session("mess")}}',
        'success'
        )
</script>
@endif

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ajouter une classe </h3>
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
                <form role="form" action="{{route('ajouter.classe', $ecole->getId())}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="type" class="form-label">Niveau</label>
                            <select class="form-control custom-select " name="niveau" id="niveau" style="border-radius:30px;">
                                <option disabled selected>Sélectionner le niveau</option>
                                 @foreach ($niveaux as $n)
                                    <option value="{{ $n->getNom() }}">{{ $n->getNom() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" >
                            <label for="nom" class="form-label">Nom</label>
                            <div id="college">
                                <select class="form-control custom-select " name="nom" style="border-radius:30px;">
                                    <option disabled selected>Ex:6eme</option>
                                        <option value="6">6eme</option>
                                        <option value="5">5eme</option>
                                        <option value="4">4eme</option>
                                        <option value="3">3eme</option>
                                </select>
                                <select class="form-control custom-select " name="num" style="border-radius:30px;">
                                    <option disabled selected>Ex:B</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                </select> 
                            </div>                               
                        

                            <div id="lycee">
                                <select class="form-control custom-select" name="nom" style="border-radius:30px;">
                                    <option disabled selected>Ex:Seconde</option>
                                        <option value="secondeA4">Seconde A4</option>
                                        <option value="secondeS">Seconde S</option>
                                        <option value="premiereA4">Premiere A4</option>
                                        <option value="premiereC">Premiere C</option>
                                        <option value="premiereD">Premiere D</option>
                                        <option value="terminaleA4">Terminale A4</option>
                                        <option value="terminaleC">Terminale C</option>
                                        <option value="terminaleD">Terminale D</option>
                                </select>
                                <input type="number" name="num" placeholder="Ex:1" class="input form-control" value="{{old('num')}}">                           
                            </div>
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
<script type="text/javascript">
    $(document).ready(function() {

        $('#college').hide();
        $('#lycee').hide();

        $('#niveau').change(function(){
            if(document.getElementById('niveau').value == 'college'){
                $('#college').show();
                $('#lycee').hide();
            }
            else if (document.getElementById('niveau').value == 'lycee'){
                $('#lycee').show();
                $('#college').hide();
            }
        });


            
    })
    
</script>
@endsection
