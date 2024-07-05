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
                    <h3 class="card-title">Creer une evaluation </h3>
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
                <form role="form" action="{{}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="genre">Type</label>
                            <select class="form-control custom-select" id="type" name="type" style="border-radius:30px;">
                                <option disabled selected>Sélectionner le genre</option>
                                <option value="interrogation">Interrogation</option>
                                <option value="devoir">Devoir</option>
                                <option value="composition">Composition</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="note" class="form-label">Note</label>
                            <input type="number" id="note" name="note" class="input form-control" value="{{old('note')}}">
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
