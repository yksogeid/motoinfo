@extends('asesorVentas.layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Editar Repuesto</h2>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('asesor.repuestos.update', $repuesto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre del Repuesto</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $repuesto->nombre }}" required>
                </div>

                <button class="btn btn-success">Actualizar</button>
                <a href="{{ route('asesor.repuestos.index') }}" class="btn btn-secondary">Volver</a>
            </form>

        </div>
    </div>

</div>
@endsection
