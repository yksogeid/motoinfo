@extends('asesorVentas.layouts.app')

@section('asesor-content')

<div class="max-w-3xl mx-auto">

    <!-- Título y botones -->
    <div class="flex items-center justify-between mb-10">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Editar Mecánico</h2>

        <a href="{{ route('asesor.mecanicos.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-600/20 dark:bg-gray-700
                   text-gray-700 dark:text-gray-300 hover:bg-gray-600/30 transition">
            <i data-lucide="arrow-left"></i> Volver
        </a>
    </div>

    <!-- Formulario -->
    <div class="rounded-2xl border border-gray-200 dark:border-gray-700 p-8 bg-white/80 dark:bg-gray-900/70 shadow-lg backdrop-blur-md">

        <form action="{{ route('asesor.mecanicos.update', $mecanico->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-5">
                <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                <input type="text" name="name" value="{{ $mecanico->name }}" required
                       class="w-full px-4 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                              focus:ring-2 focus:ring-blue-500 dark:text-white outline-none">
            </div>

            <!-- Correo -->
            <div class="mb-5">
                <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Correo Electrónico</label>
                <input type="email" name="email" value="{{ $mecanico->email }}" required
                       class="w-full px-4 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                              focus:ring-2 focus:ring-blue-500 dark:text-white outline-none">
            </div>

            <!-- Documento -->
            <div class="mb-5">
                <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Documento</label>
                <input type="text" name="documento" value="{{ $mecanico->documento }}" required
                       class="w-full px-4 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                              focus:ring-2 focus:ring-blue-500 dark:text-white outline-none">
            </div>

            <!-- Fecha -->
            <div class="mb-5">
                <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Fecha de Nacimiento</label>
                <input type="date" name="fechanacimiento" value="{{ $mecanico->fechanacimiento }}"
                       class="w-full px-4 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                              focus:ring-2 focus:ring-blue-500 dark:text-white outline-none">
            </div>

            <!-- País -->
            <div class="mb-5">
                <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">País</label>
                <input type="text" name="pais" value="{{ $mecanico->pais }}"
                       class="w-full px-4 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                              focus:ring-2 focus:ring-blue-500 dark:text-white outline-none">
            </div>

            <!-- Ciudad -->
            <div class="mb-8">
                <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Ciudad</label>
                <input type="text" name="ciudad" value="{{ $mecanico->ciudad }}"
                       class="w-full px-4 py-2 rounded-xl bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                              focus:ring-2 focus:ring-blue-500 dark:text-white outline-none">
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-4">
                <a href="{{ route('asesor.mecanicos.index') }}"
                   class="px-5 py-2 rounded-xl bg-gray-500/20 text-gray-600 dark:text-gray-300 hover:bg-gray-500/30 transition">
                    Cancelar
                </a>

                <button class="px-6 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-md transition">
                    Actualizar
                </button>
            </div>

        </form>

    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script> lucide.createIcons(); </script>

@endsection

