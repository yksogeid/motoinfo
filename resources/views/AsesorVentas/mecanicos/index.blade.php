@extends('asesorVentas.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Lista de Mecánicos</h2>

    <a href="{{ route('asesor.mecanicos.create') }}" class="btn btn-primary mb-3">
        Agregar Mecánico
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Documento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($mecanicos as $mecanico)
                        <tr>
                            <td>{{ $mecanico->id }}</td>
                            <td>{{ $mecanico->name }}</td>
                            <td>{{ $mecanico->email }}</td>
                            <td>{{ $mecanico->documento }}</td>
                            <td>
                                <a href="{{ route('asesor.mecanicos.edit', $mecanico->id) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>

                                <form action="{{ route('asesor.mecanicos.destroy', $mecanico->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar este mecánico?');">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No existen mecánicos registrados</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
