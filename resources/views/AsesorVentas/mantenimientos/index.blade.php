@extends('layouts.app')
@section('title','Mantenimientos - Asesor de Ventas')

@section('content')
<div class="min-h-screen py-14 px-8 relative overflow-hidden">
    
    <!-- Fondo -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-gray-100 via-white to-gray-200 
        dark:from-gray-900 dark:via-gray-800 dark:to-black"></div>

    <!-- Titulo centrado -->
    <!-- Encabezado con título a la izquierda y botones a la derecha -->
<div class="max-w-5xl mx-auto mb-10 flex items-center justify-between">

    <!-- Título alineado a la izquierda -->
    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
        Mantenimientos Programados
    </h2>

    <!-- Contenedor botones -->
    <div class="flex gap-3">
        
        <!-- Botón Regresar -->
        <a href="{{ route('asesor.dashboard') }}"
           class="px-5 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-800 
           font-medium shadow flex items-center gap-2 transition">
            <i data-lucide="arrow-left"></i> Regresar
        </a>

        <!-- Botón Asignar -->
        <a href="{{ route('asesor.mantenimientos.create') }}"
           class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white 
           font-medium shadow flex items-center gap-2 transition">
            <i data-lucide="plus"></i> Asignar Mantenimiento
        </a>

    </div>
</div>


    <!-- Tabla -->
    <div class="max-w-5xl mx-auto bg-white/70 dark:bg-gray-900/60 backdrop-blur-lg border 
        border-gray-200 dark:border-gray-700 shadow-xl rounded-2xl overflow-hidden">

        <table class="w-full text-center">
            <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="py-3">#</th>
                    <th>Vehículo</th>
                    <th>Mecánico</th>
                    <th>Estado</th>
                    <th>Fecha Programada</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody class="text-gray-800 dark:text-gray-300">
                @forelse ($mantenimientos as $m)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="py-3">{{ $m->id }}</td>
                    <td>{{ $m->vehiculo->placa ?? 'N/A' }}</td>
                    <td>{{ $m->mecanico->name ?? 'No asignado' }}</td>
                    <td>{{ $m->estado->nombre ?? 'N/A' }}</td>
                    <td>{{ $m->fechaProgramada ?? 'Sin definir' }}</td>

                    <td>
                        <a href="{{ route('asesor.mantenimientos.show', $m->id) }}" 
                            class="px-3 py-1 rounded-lg bg-amber-300 hover:bg-amber-400 text-gray-800 transition">
                            Ver
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-5 text-gray-500 dark:text-gray-400">
                        No hay mantenimientos registrados 😔
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

