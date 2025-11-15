@extends('layouts.app')

@section('title', 'Seleccionar Rol')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center px-6 py-20 relative overflow-hidden">

    {{-- Fondo --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-gray-100 via-gray-50 to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-black"></div>
    <div class="absolute inset-0 -z-10 opacity-[0.07] dark:opacity-[0.08]
        bg-[url('https://www.transparenttextures.com/patterns/smooth-wall.png')]"></div>

    {{-- Contenido --}}
    <div class="w-full max-w-2xl bg-white/90 dark:bg-gray-900/70 backdrop-blur-md rounded-3xl shadow-xl border border-gray-200 dark:border-gray-700 p-10 animate-fadeIn">

        <h1 class="text-4xl font-extrabold text-center text-gray-900 dark:text-white mb-6">
            Selecciona cómo deseas ingresar
        </h1>

        <p class="text-center text-gray-600 dark:text-gray-400 mb-10">
            Tu cuenta posee múltiples roles. Elige el perfil con el que deseas continuar.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- Rol: Usuario --}}
            <a href="{{ route('role.switch', 'user') }}"
                class="group block p-6 text-center rounded-2xl border border-gray-200 dark:border-gray-700
                bg-white/80 dark:bg-gray-800/60 shadow-md hover:shadow-xl hover:-translate-y-2
                transition-all duration-500 cursor-pointer">

                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-500/10 dark:bg-blue-400/20 mb-4">
                    <i data-lucide="user" class="w-8 h-8 text-blue-600 dark:text-blue-400"></i>
                </div>

                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-1">
                    Usuario
                </h3>

                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Perfil normal para manejar vehículos y documentos.
                </p>
            </a>

            {{-- Rol: Mecánico --}}
            <a href="{{ route('role.switch', 'mecanico') }}"
                class="group block p-6 text-center rounded-2xl border border-gray-200 dark:border-gray-700
                bg-white/80 dark:bg-gray-800/60 shadow-md hover:shadow-xl hover:-translate-y-2
                transition-all duration-500 cursor-pointer">

                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-500/10 dark:bg-green-400/20 mb-4">
                    <i data-lucide="wrench" class="w-8 h-8 text-green-600 dark:text-green-400"></i>
                </div>

                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-1">
                    Mecánico
                </h3>

                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Accederás a tu panel de mantenimientos asignados.
                </p>
            </a>

        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script> lucide.createIcons(); </script>

@endsection
