@extends('admin.layouts.private')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2>Añadir nueva categoría</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{route('categories.indexCrud')}}">Volver</a>
            </div>
        </div>
    </div>
</div>
<form action="{{route('categories.store')}}" method="POST">
    @csrf
    <div class="row g-3">
        <div class="col-4">
            <div class="form-group">
                <label for="name" class="form-label"><strong>Id:</strong></label>
                <input type="text" name="id" class="form-control" placeholder="Id" required>
                @if ($errors->has('id'))
                    <span class="text-danger">El ID ingresado ya esta en uso. Por favor, intenta nuevamente.</span>
                @endif
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="name" class="form-label"><strong>Nombre:</strong></label>
                <input type="text" name="name" class="form-control" placeholder="Nombre" required>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="image" class="form-label"><strong>Imagen:</strong></label>
                <input type="text" name="image" class="form-control" placeholder="Imagen">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="description" class="form-label"><strong>Descripcion:</strong></label>
                <textarea name="description" class="form-control" style="height:150px"
                    placeholder="Descripcion"></textarea>
            </div>
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
@endsection