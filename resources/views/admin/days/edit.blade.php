@extends('admin.layouts.private')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar día abierto</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('days.update', $day->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $day->date }}" readonly>
        </div>

        <div class="form-group">
            <label for="start_time">Hora de inicio:</label>
            <input type="time" name="start_time" id="start_time" class="form-control" value="{{ date('H:i', strtotime($day->start_time)) }}" required>
        </div>

        <div class="form-group">
            <label for="end_time">Hora de finalización:</label>
            <input type="time" name="end_time" id="end_time" class="form-control" value="{{ date('H:i', strtotime($day->end_time)) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('days.list') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
