@extends('asesorVentas.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Registrar Mecánico</h2>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('asesor.mecanicos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Documento</label>
                    <input type="text" name="documento" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="fechanacimiento" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">País</label>
                    <input type="text" name="pais" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control">
                </div>

                <button class="btn btn-primary">Crear Mecánico</button>
                <a href="{{ route('asesor.mecanicos.index') }}" class="btn btn-secondary">Volver</a>
            </form>

        </div>
    </div>
</div>
@endsection
