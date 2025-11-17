@extends('layouts.app')
@section('title', 'Programar Nuevo Mantenimiento')

@section('content')
<div class="min-h-screen py-14 px-6 relative overflow-hidden">

    {{-- Fondo decorativo --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-gray-100 via-white to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-black"></div>

    {{-- Encabezado y botones --}}
    <div class="max-w-5xl mx-auto flex items-center justify-between mb-10">
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">
            Programar Nuevo Mantenimiento
        </h1>

        <a href="{{ route('asesor.mantenimientos.index') }}"
            class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 
                   text-gray-700 dark:text-gray-200 flex items-center gap-2 transition shadow-sm">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Volver
        </a>
    </div>

    {{-- Tarjeta Formulario --}}
    <div class="max-w-5xl mx-auto bg-white/90 dark:bg-gray-900/70 backdrop-blur-md border border-gray-200 dark:border-gray-700 shadow-xl rounded-2xl p-10 space-y-8">

        <form action="{{ route('asesor.mantenimientos.store') }}" method="POST" class="space-y-7">
            @csrf

            {{-- Vehículo --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700 dark:text-gray-300">Vehículo</label>
                <select name="idVehiculo" class="w-full rounded-xl border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                    <option value="">Seleccione un vehículo</option>
                    @foreach($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo->id }}">{{ $vehiculo->placa ?? 'Vehículo #'.$vehiculo->id }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Mecánico --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700 dark:text-gray-300">Mecánico</label>
                <select name="idMecanico" class="w-full rounded-xl border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                    <option value="">Seleccione un mecánico</option>
                    @foreach($mecanicos as $mecanico)
                        <option value="{{ $mecanico->id }}">{{ $mecanico->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Estado --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700 dark:text-gray-300">Estado</label>
                <select name="idEstado" class="w-full rounded-xl border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300">
                    <option value="">Seleccione un estado</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Fecha programada --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700 dark:text-gray-300">Fecha Programada</label>
                <input type="date" name="fechaProgramada" class="w-full rounded-xl border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300" required>
            </div>

            {{-- Observación --}}
            <div>
                <label class="block font-medium mb-1 text-gray-700 dark:text-gray-300">Observación</label>
                <textarea name="observacion" rows="4"
                    class="w-full rounded-xl border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 resize-none"></textarea>
            </div>

            {{-- Botones --}}
            <div class="flex items-center justify-end gap-4 pt-3">
                <a href="{{ route('asesor.mantenimientos.index') }}"
                    class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 
                           text-gray-700 dark:text-gray-200 transition shadow-sm flex items-center gap-2">
                    <i data-lucide="x" class="w-4 h-4"></i> Cancelar
                </a>

                <button type="submit"
                    class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium shadow-md flex items-center gap-2 transition">
                    <i data-lucide="save" class="w-4 h-4"></i> Guardar Mantenimiento
                </button>
            </div>

        </form>

    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script> lucide.createIcons(); </script>

@endsection

