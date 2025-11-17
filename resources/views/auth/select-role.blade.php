@extends('layouts.app')

@section('title', 'Seleccionar Rol')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center px-6 py-20 relative overflow-hidden">

    {{-- Fondo --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-gray-100 via-gray-50 to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-black"></div>
    <div class="absolute inset-0 -z-10 opacity-[0.07] dark:opacity-[0.08]
        bg-[url('https://www.transparenttextures.com/patterns/smooth-wall.png')]"></div>

    {{-- Contenedor --}}
    <div class="w-full max-w-2xl bg-white/90 dark:bg-gray-900/70 backdrop-blur-md rounded-3xl shadow-xl border border-gray-200 dark:border-gray-700 p-10 animate-fadeIn">

        <h1 class="text-4xl font-extrabold text-center text-gray-900 dark:text-white mb-6">
            Selecciona cómo deseas ingresar
        </h1>

        <p class="text-center text-gray-600 dark:text-gray-400 mb-10">
            Tu cuenta posee múltiples roles. Elige el perfil con el que deseas continuar.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            @foreach(Auth::user()->getRoleNames() as $role)

                {{-- CONFIGURAMOS LOS ICONOS Y COLORES SEGÚN EL ROL --}}
                @php
                    $icons = [
                        'user' => ['icon' => 'user', 'color' => 'blue'],
                        'mecanico' => ['icon' => 'wrench', 'color' => 'green'],
                        'asesorVentas' => ['icon' => 'briefcase-business', 'color' => 'purple'],
                        'admin' => ['icon' => 'shield-check', 'color' => 'red'],
                        'editor' => ['icon' => 'edit', 'color' => 'yellow'],
                    ];

                    $icon = $icons[$role]['icon'] ?? 'user';
                    $color = $icons[$role]['color'] ?? 'blue';
                @endphp

                <a href="{{ route('role.switch', $role) }}"
                    class="group block p-6 text-center rounded-2xl border border-gray-200 dark:border-gray-700
                    bg-white/80 dark:bg-gray-800/60 shadow-md hover:shadow-xl hover:-translate-y-2
                    transition-all duration-500 cursor-pointer">

                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full
                        bg-{{ $color }}-500/10 dark:bg-{{ $color }}-400/20 mb-4">
                        <i data-lucide="{{ $icon }}" class="w-8 h-8 text-{{ $color }}-600 dark:text-{{ $color }}-400"></i>
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-1">
                        {{ ucfirst($role) }}
                    </h3>

                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Iniciar como {{ ucfirst($role) }}
                    </p>
                </a>

            @endforeach

        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script> lucide.createIcons(); </script>

@endsection

