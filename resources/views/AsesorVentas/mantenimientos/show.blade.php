@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detalle del Mantenimiento</h2>

    <div class="card">
        <div class="card-header">
            Mantenimiento #{{ $mantenimiento->id }}
        </div>
        <div class="card-body">
            <p><strong>Vehículo:</strong> {{ $mantenimiento->vehiculo->placa }}</p>
            <p><strong>Asesor:</strong> {{ $mantenimiento->asesor->name }}</p>
            <p><strong>Mecánico:</strong> {{ $mantenimiento->mecanico->name ?? 'Sin asignar' }}</p>
            <p><strong>Estado:</strong> {{ $mantenimiento->estado->nombre }}</p>
            <p><strong>Fecha Programada:</strong> {{ $mantenimiento->fechaProgramada }}</p>
            <p><strong>Observación:</strong><br>{{ $mantenimiento->observacion }}</p>

            <a href="{{ route('asesor.mantenimientos.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>
</div>
@endsection
