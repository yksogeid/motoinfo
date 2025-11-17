@extends('asesorVentas.layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Registrar Repuesto</h2>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('asesor.repuestos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre del Repuesto</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <button class="btn btn-primary">Guardar</button>
                <a href="{{ route('asesor.repuestos.index') }}" class="btn btn-secondary">Volver</a>
            </form>

        </div>
    </div>

</div>
@endsection
