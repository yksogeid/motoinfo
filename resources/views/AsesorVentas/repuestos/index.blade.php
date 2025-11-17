@extends('layouts.app')
@section('title', 'Repuestos Disponibles')

@section('content')
<div class="min-h-screen py-14 px-6 relative overflow-hidden">

    {{-- Fondo --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-gray-100 via-white to-gray-200
        dark:from-gray-900 dark:via-gray-800 dark:to-black">
    </div>

    {{-- Header --}}
    <div class="max-w-6xl mx-auto flex items-center justify-between mb-10">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">
            Repuestos Disponibles
        </h2>

        <div class="flex items-center gap-4">
            {{-- Botón volver --}}
            <a href="{{ route('asesor.dashboard') }}"
                class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600
                       text-gray-700 dark:text-gray-200 flex items-center gap-2 transition shadow-sm">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Regresar
            </a>

            {{-- Botón nuevo repuesto --}}
            <a href="{{ route('asesor.repuestos.create') }}"
                class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium shadow-md
                       flex items-center gap-2 transition">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Nuevo Repuesto
            </a>
        </div>
    </div>

    {{-- Tabla --}}
    <div class="max-w-6xl mx-auto bg-white/90 dark:bg-gray-900/70 backdrop-blur-md border border-gray-200
        dark:border-gray-700 shadow-xl rounded-2xl overflow-hidden">
        
        <table class="w-full text-left">
            <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Nombre</th>
                    <th class="py-3 px-6">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-gray-800 dark:text-gray-200">
                @forelse($repuestos as $repuesto)
                    <tr>
                        <td class="py-3 px-6">{{ $repuesto->id }}</td>
                        <td class="py-3 px-6">{{ $repuesto->nombre }}</td>
                        <td class="py-3 px-6 flex items-center gap-2">

                            {{-- Botón editar --}}
                            <a href="{{ route('asesor.repuestos.edit', $repuesto->id) }}"
                                class="px-3 py-1 rounded-lg bg-yellow-100 text-yellow-700 hover:bg-yellow-200 text-sm transition">
                                Editar
                            </a>

                            {{-- Botón eliminar --}}
                            <form action="{{ route('asesor.repuestos.destroy', $repuesto->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este repuesto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="px-3 py-1 rounded-lg bg-red-100 text-red-700 hover:bg-red-200 text-sm transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-6 text-center text-gray-500 dark:text-gray-400">
                            No hay repuestos registrados 😕
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
@endsection

