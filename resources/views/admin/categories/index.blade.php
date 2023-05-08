@extends('admin.layouts.private')
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2>Categorías</h2>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('categories.create') }}">Crear nueva categoría</a>
        </div>
    </div>
</div>



<form action="{{route('categories.indexCrud')}}" method="GET">
    <div class="form-row">
        <div class="col-sm-4 my-1">
            <input type="text" class="form-control" name="text" value="{{$text}}">
        </div>
        <div class="btn-group my-2">
            <div class="col-sm-4 me-4">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
            <div class="col-sm-4">
                <a href="{{ route('categories.indexCrud') }}" class="btn btn-primary">Volver</a>

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
            <th width="120px">Borrado</th>
            <th>Imagen</th>
            <th width="220px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
        <tr>
            <th>{{ $categoria->id }}</th>
            <td>{{ $categoria->name }}</td>
            <td>{{ $categoria->description }}</td>
            <td>
                @if (isset($categoria->deleted_at))

                <form action="{{ route('categories.restore', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Restaurar</button>
                </form>
                @endif
            </td>
            <td>{{ $categoria->image }}</td>
            <td style="text-align: center; vertical-align: middle;">

                <div class="btn-group" role="group" aria-label="Acciones">
                    @if (!isset($categoria->deleted_at))
                        <div class="me-1">
                            <button class="btn btn-primary" type="button"
                                onclick="location.href='{{ route('categories.edit', $categoria->id) }}'">Editar</button>
                        </div>

                        <div class="mx-1">
                            <form action="{{ route('categories.borrado', $categoria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning"
                                    onclick="return confirm('¿Estas seguro que quires borrar la categoría?')">Eliminar</button>

                            </form>
                        </div>
                        @if($userRole === 'Admin')
                            <div class="ms-1">
                                <form action="{{ route('categories.destroy', $categoria->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('¿Estas seguro que quieres borrar definitivamente la categoría?')">Destroy</button>
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

{!! $categorias->links() !!}
@endsection