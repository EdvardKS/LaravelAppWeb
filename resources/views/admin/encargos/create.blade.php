@extends('admin.layouts.private')
@section('content')

<div class="row">
    <div class="col-12 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2>Añadir nuevo encargo</h2>
            </div>
            
        </div>
    </div>
</div>
<form action="{{route('encargos.storePanel')}}" method="POST">
    @csrf
    <div class="row align-items-start">
            <div class="col-4">
                <div class="form-group">
                    <label for="name" class="form-label"><strong>Nombre:</strong></label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="date"><strong>Fecha:</strong></label>
                    <input type="date" class="form-control" name="date" id="fecha_pedido" value="{{ date('Y-m-d') }}" required>

                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="start_time"><strong>Hora de pedido:</strong></label>
                    <input type="time" class="form-control" name="hora_pedido" id="start_time" required>
                </div>
            </div>

        <div class="col-12 mt-5 mb-5">
            <div class="form-group">
                <label for="description" class="form-label"><strong>Descripcion:</strong></label>
                <textarea name="description" class="form-control" style="height:150px"
                    placeholder="Descripcion" required></textarea>
            </div>
        </div>
        <div class="col-2">
            <button class="btn btn-primary">Enviar</button>
            <a class="btn btn-primary ms-3" href="{{route('encargos.index')}}">Volver</a>
        </div>
    </div>
</form>
@endsection