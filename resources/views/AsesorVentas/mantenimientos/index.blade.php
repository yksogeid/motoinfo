@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Mantenimientos Programados</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Vehículo</th>
                <th>Mecánico</th>
                <th>Estado</th>
                <th>Fecha Programada</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mantenimientos as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->vehiculo->placa ?? 'N/A' }}</td>
                    <td>{{ $m->mecanico->name ?? 'Sin asignar' }}</td>
                    <td>{{ $m->estado->nombre ?? 'N/A' }}</td>
                    <td>{{ $m->fechaProgramada }}</td>
                    <td>
                        <a href="{{ route('asesor.mantenimientos.show', $m->id) }}" class="btn btn-info btn-sm">
                            Ver
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay mantenimientos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
