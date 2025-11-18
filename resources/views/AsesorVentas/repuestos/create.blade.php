@extends('layouts.app')
@section('title', 'Registrar Repuesto')

@section('content')
<div class="min-h-screen py-10 px-6 relative overflow-hidden">

    <!-- Fondo -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-gray-100 via-white to-gray-200 
                dark:from-gray-900 dark:via-gray-800 dark:to-black"></div>

    <!-- Encabezado -->
    <div class="max-w-4xl mx-auto mb-8">
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                Registrar Repuesto
            </h2>

            <a href="{{ route('asesor.repuestos.index') }}"
                class="px-5 py-2.5 rounded-xl bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 
                       text-gray-700 dark:text-gray-200 font-medium transition flex items-center gap-2">
                <i data-lucide="arrow-left"></i> Regresar
            </a>
        </div>
    </div>

    <!-- Formulario -->
    <div class="max-w-4xl mx-auto bg-white/80 dark:bg-gray-900/70 backdrop-blur-md 
                border border-gray-200 dark:border-gray-700 rounded-2xl shadow-lg p-8">

        <form action="{{ route('asesor.repuestos.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300 font-medium mb-2">
                    Nombre del Repuesto
                </label>
                <input type="text" name="nombre"
                       class="w-full rounded-xl border-gray-300 dark:border-gray-700 
                              dark:bg-gray-800 dark:text-white focus:ring-blue-500"
                       placeholder="Ej: Bujía, filtro de aire, pastillas de freno..." required>
            </div>

            <!-- Botones -->
            <div class="flex items-center justify-end gap-4 mt-6">
                <a href="{{ route('asesor.repuestos.index') }}"
                   class="px-5 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 
                          dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 
                          dark:text-gray-200 font-medium transition">
                    Cancelar
                </a>

                <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 
                               text-white font-medium shadow transition">
                    Guardar Repuesto
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script> lucide.createIcons(); </script>
@endsection

