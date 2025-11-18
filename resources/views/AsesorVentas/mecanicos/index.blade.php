@extends('asesorVentas.layouts.app')

@section('asesor-content')

<div class="max-w-6xl mx-auto">

    <!-- Encabezado con botones -->
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Mecánicos Registrados</h2>

        <div class="flex gap-3">

            <!-- Botón Regresar -->
            <a href="{{ url()->route('asesor.dashboard') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-600/20 dark:bg-gray-700
                      text-gray-700 dark:text-gray-300 hover:bg-gray-600/30 transition">
                <i data-lucide="arrow-left"></i> Regresar
            </a>

            <!-- Botón Crear -->
            <a href="{{ route('asesor.mecanicos.create') }}"
                class="px-5 py-2 font-medium rounded-xl bg-blue-600 text-white shadow-md hover:bg-blue-700 transition">
                + Agregar Mecánico
            </a>

        </div>
    </div>

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-500/15 border border-green-500 text-green-700 dark:text-green-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla -->
    <div class="overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg bg-white/80 dark:bg-gray-900/70 backdrop-blur-md">
        <table class="w-full text-left">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">ID</th>
                    <th class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">Nombre</th>
                    <th class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">Email</th>
                    <th class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">Documento</th>
                    <th class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($mecanicos as $mecanico)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                        <td class="px-6 py-4 text-gray-800 dark:text-gray-100">{{ $mecanico->id }}</td>
                        <td class="px-6 py-4 text-gray-800 dark:text-gray-100 capitalize">{{ $mecanico->name }}</td>
                        <td class="px-6 py-4 text-gray-800 dark:text-gray-100">{{ $mecanico->email }}</td>
                        <td class="px-6 py-4 text-gray-800 dark:text-gray-100">{{ $mecanico->documento }}</td>
                        <td class="px-6 py-4 text-center space-x-2">

                            <!-- Editar -->
                            <a href="{{ route('asesor.mecanicos.edit', $mecanico->id) }}"
                                class="px-3 py-1 rounded-lg bg-yellow-500/20 text-yellow-600 dark:text-yellow-400 hover:bg-yellow-500/30 transition">
                                Editar
                            </a>

                            <!-- Eliminar -->
                            <form action="{{ route('asesor.mecanicos.destroy', $mecanico->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('¿Seguro que deseas eliminar este mecánico?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 rounded-lg bg-red-500/20 text-red-600 dark:text-red-400 hover:bg-red-600/30 transition">
                                    Eliminar
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500 dark:text-gray-400">
                            No existen mecánicos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script> lucide.createIcons(); </script>

@endsection

