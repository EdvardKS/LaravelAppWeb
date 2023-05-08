@extends('admin.layouts.private')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2>Añadir nuevo producto</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{route('products.index')}}">Volver</a>
            </div>
        </div>
    </div>
</div>
@error('image')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-12">
            <div class="form-group">
                <label for="name" class="form-label"><strong>Nombre:</strong></label>
                <input type="text" name="name" class="form-control" placeholder="Nombre" required>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">

                <label for="image" class="form-label"><strong>Imagen:</strong></label>
                <input type="file" name="image" id="image" class="form-control" placeholder="Imagen" required>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="category_id" class="form-label"><strong>Categoría:</strong></label>
                <select name="category_id" class="form-select">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
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
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
@endsection