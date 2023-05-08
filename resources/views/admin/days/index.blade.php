@extends('admin.layouts.private')

@section('content')


<div class="container">
    <h1 class="mb-4">Hoararios</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    @error('date')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="row">
        <h3>Calendario encargos</h3>
        <form action="{{ route('days.store') }}" method="POST">
            @csrf
            <div class="col-md-3">
                <div class="form-group">
                    <label for="date">Fecha</label>
                    <input type="date" class="form-control" name="date" id="holiday_date" required>
                </div>
                <div class="form-group">
                    <label for="is_open">Tipo</label>
                    <select name="is_open" id="is_open" class="form-control" required>
                        <option value="1">Cerrado</option>
                        <option value="0">Abierto</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_time">Hora de apertura</label>
                    <input type="time" class="form-control" name="start_time" id="start_time">
                </div>
                <div class="form-group">
                    <label for="end_time">Hora de cierre</label>
                    <input type="time" class="form-control" name="end_time" id="end_time">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Guardar día</button>
                <a href="{{ route('days.list') }}" class="btn btn-secondary mt-3">Ver y eliminar días</a>
            </div>
        </form>
    </div>

    <div class="row mt-5">
        <div class="col">
            <h3>Calendario contacto</h3>
            <form action="{{ route('days.update_horarios') }}" method="POST">
                @csrf
                <div class="mobile-hidden">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                @foreach($horarios as $dia)
                                <th scope="col" class="text-center">{{ $dia->nombre_dia }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($horarios as $horario)
                                <td scope="col">
                                    <div class="form-group">
                                        <select name="estado[{{ $horario->id }}]" class="form-control">
                                            <option value="Abierto" {{ $horario->estado == "Abierto" ? 'selected' : ''
                                                }}>Abierto</option>
                                            <option value="Cerrado" {{ $horario->estado == "Cerrado" ? 'selected' : ''
                                                }}>Cerrado</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Desde:</label>
                                        <input type="time" name="h_abierto[{{ $horario->id }}]" class="form-control"
                                            value="{{ $horario->h_abierto }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Hasta:</label>
                                        <input type="time" name="h_cerrado[{{ $horario->id }}]" class="form-control"
                                            value="{{ $horario->h_cerrado }}">
                                    </div>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
            </form>
        </div>
    </div>


</div>
@endsection
@vite(['resources/js/admin/days/days-index.js'])

