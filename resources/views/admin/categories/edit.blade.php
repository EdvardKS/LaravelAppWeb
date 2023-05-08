@extends('admin.layouts.private')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Editar categoría</h2>
            <a class="btn btn-primary" href="{{ route('categories.indexCrud') }}">Volver</a>
        </div>
    </div>
</div>

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control" type="text" name="name" value="{{ $category->name }}" placeholder="Nombre">
                <label for="name">Nombre:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control" type="text" name="image" value="{{ $category->image }}" placeholder="Imagen">
                <label for="image">Imagen:</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-floating">
                <textarea class="form-control" name="description" style="height:150px"
                    placeholder="Descripcion">{{ $category->description }}</textarea>
                <label for="description">Descripción:</label>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
@endsection