@extends('admin.layouts.private')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2>Productos</h2>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('products.create') }}">Crear nuevo producto</a>
        </div>
    </div>
</div>

<form action="{{route('products.index')}}" method="GET">
    <div class="form-row">
        <div class="col-sm-4 my-1">
            <input type="text" class="form-control" name="text" value="{{$text}}">
        </div>
        <div class="btn-group my-2">
            <div class="col-sm-4 me-4">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
            <div class="col-sm-4">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Volver</a>

            </div>
        </div>
    </div>
</form>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Categoría</th>
            <th width="120px">Borrado</th>
            <th>Imagen</th>
            <th width="280px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <th>{{ $producto->id }}</th>
            <td>{{ $producto->name }}</td>
            <td>{{ $producto->description }}</td>
            <td>{{ $producto->category_id }}</td>
            <td>
                @if (isset($producto->deleted_at))

                <form action="{{ route('products.restore', $producto->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="current_page" value="{{ $currentPage }}">
                    <button type="submit" class="btn btn-success">Restaurar</button>
                </form>
                @endif
            </td>
            <td>{{ $producto->image }}</td>
            <td style="text-align: center; vertical-align: middle;">

                <div class="btn-group" role="group" aria-label="Acciones">
                    @if (!isset($producto->deleted_at))
                    <div class="me-1">
                        <button class="btn btn-primary" type="button"
                            onclick="location.href='{{ route('products.edit', $producto->id) }}'">Editar</button>
                    </div>
                    <div class="mx-1">
                        <form action="{{ route('products.borrado', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="current_page" value="{{ $currentPage }}">
                            <button type="submit" class="btn btn-warning"
                                onclick="return confirm('¿Estas seguro que quieres borrar el producto?')">Eliminar</button>

                        </form>
                    </div>

                    @if($userRole === 'Admin')
                    <div class="ms-1">
                        <form action="{{ route('products.destroy', $producto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="current_page" value="{{ $currentPage }}">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Estas seguro que quieres borrar definitivamente el producto?')">Destroy</button>
                        </form>
                    </div>
                    @endif
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $productos->links() !!}
@endsection