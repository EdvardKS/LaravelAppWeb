<table class="table table-bordered">
    <thead>
        <tr>

            <th>Hora de Entrega</th>
            <th>Menú</th>
            <th>Detalles</th>
            <th>Nombre y Apellidos</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Código Postal</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="encargos-tbody">
        @foreach ($encargos as $encargo)
        @if($encargo->entregado !== 1)
        <tr>
            <td>{{ substr($encargo->hora_entrega, 0, 16) }}</td>
            <td>{{ $encargo->product ? $encargo->product->name : '' }}</td>
            <td>{{ $encargo->detalles }}</td>
            <td>{{ $encargo->nombre_apellidos }}</td>
            <td>{{ $encargo->telefono }}</td>
            <td>{{ $encargo->email }}</td>
            <td>{{ $encargo->codigo_postal }}</td>
            <td style="text-align: center; vertical-align: middle;">
                @if (!$encargo->entregado)
                <form action="{{ route('encargos.entregado', ['encargo' => $encargo->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('¿Estas seguro que quieres marcar el pedido como entregado?')">Entregado</button>
                </form>
                @endif
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<script lang="text/javascript" src="https://cdn.ably.com/lib/ably.min-1.js"></script>
@vite(['resources/js/admin/encargos/encargos-table.js'])
