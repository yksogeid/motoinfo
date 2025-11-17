@extends('asesorVentas.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Editar Mecánico</h2>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('asesor.mecanicos.update', $mecanico->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ $mecanico->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" value="{{ $mecanico->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Documento</label>
                    <input type="text" name="documento" class="form-control" value="{{ $mecanico->documento }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="fechanacimiento" class="form-control"
                           value="{{ $mecanico->fechanacimiento ? $mecanico->fechanacimiento->format('Y-m-d') : '' }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">País</label>
                    <input type="text" name="pais" class="form-control" value="{{ $mecanico->pais }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" value="{{ $mecanico->ciudad }}">
                </div>

                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('asesor.mecanicos.index') }}" class="btn btn-secondary">Volver</a>
            </form>

        </div>
    </div>
</div>
@endsection
