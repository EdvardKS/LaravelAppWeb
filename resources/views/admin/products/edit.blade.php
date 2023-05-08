@extends('admin.layouts.private')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Editar producto</h2>
            <a class="btn btn-primary" href="{{ route('products.index') }}">Volver</a>
        </div>
    </div> 
</div>

<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <div class="col-md-4">
            <div class="form-floating">
                <input class="form-control" type="text" name="name" value="{{ $product->name }}" placeholder="Nombre">
                <label for="name">Nombre:</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input class="form-control" type="file" name="image" value="{{ $product->image }}" placeholder="Imagen"
                    accept=".jpg">
                <!-- "accept=".jpg", lo que limita la selección de archivos solo a imágenes en formato .jpg. -->
                <label for="image">Imagen:</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">

                <select name="category_id" class="form-select">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ?
                        'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach

                </select>
                <label for="category_id">Categoría:</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-floating">
                <textarea class="form-control" name="description" style="height:150px"
                    placeholder="Descripcion">{{ $product->description }}</textarea>
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