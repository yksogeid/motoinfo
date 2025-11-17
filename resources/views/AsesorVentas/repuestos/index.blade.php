@extends('asesorVentas.layouts.app')
@section('asesor-content')

<div class="container mt-4">

    <h2 class="mb-4">Repuestos Disponibles</h2>

    <a href="{{ route('asesor.repuestos.create') }}" class="btn btn-primary mb-3">Nuevo Repuesto</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>

                @foreach($repuestos as $rep)
                <tr>
                    <td>{{ $rep->id }}</td>
                    <td>{{ $rep->nombre }}</td>
                    <td>
                        <a href="{{ route('asesor.repuestos.edit', $rep->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('asesor.repuestos.destroy', $rep->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar repuesto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>

</div>
@endsection
