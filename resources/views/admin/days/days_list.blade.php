@extends('admin.layouts.private')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row mt-4">
        <div class="col-md-6">
            <h2 class="mb-4">Días abiertos</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($open as $op)
                    <tr>
                        <td>{{ $op->date }}</td>
                        <td>{{ date('H:i', strtotime($op->start_time)) }} - {{ date('H:i', strtotime($op->end_time)) }}</td>

                        <td>
                            <form action="{{ route('days.destroy', $op->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar el día {{ $op->date }}?');">Eliminar</button>
                
                            </form>
                            <a href="{{ route('days.edit', $op->id) }}" class="btn btn-warning mr-2">Editar</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Días cerrados</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($closed as $close)
                    <tr>
                        <td>{{ $close->date }}</td>
                        <td>
                            <form action="{{ route('days.destroy', $close->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar el día {{ $close->date }}?');">Eliminar</button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('days.index') }}" class="btn btn-secondary mt-3">Volver al panel de administración</a>
</div>
@endsection