@extends('admin.layouts.private')

@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-between align-items-center mb-3">
            <div>
                <h2>Encargos</h2>
            </div><div>
                <a class="btn btn-success" href="{{ route('encargos.create') }}">Crear nuevo encargo</a>
            </div>
        </div>
    </div>

    <div id="encargos-content">
    @include('admin.encargos._table')
</div>



    
@endsection