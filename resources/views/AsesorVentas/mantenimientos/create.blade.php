@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">Programar Nuevo Mantenimiento</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asesor.mantenimientos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="vehiculo" class="form-label"><strong>Vehículo</strong></label>
            <select name="idVehiculo" class="form-control" required>
                <option value="">Seleccione un vehículo</option>
                @foreach($vehiculos as $v)
                    <option value="{{ $v->id }}">
                        {{ $v->placa }} - {{ $v->marca }} {{ $v->modelo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Mecánico</strong></label>
            <select name="idMecanico" class="form-control" required>
                <option value="">Seleccione un mecánico</option>
                @foreach($mecanicos as $m)
                    <option value="{{ $m->id }}">
                        {{ $m->name }} ({{ $m->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Estado</strong></label>
            <select name="idEstado" class="form-control" required>
                <option value="">Seleccione un estado</option>
                @foreach($estados as $e)
                    <option value="{{ $e->id }}">
                        {{ $e->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Fecha programada</strong></label>
            <input type="date" name="fechaProgramada" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Observación</strong></label>
            <textarea name="observacion" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Mantenimiento</button>
        <a href="{{ route('asesor.mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</div>
@endsection
