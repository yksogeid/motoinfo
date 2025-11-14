@extends('layouts.app')
@section('title', 'Mecanico - Dashboard')

@section('content')
<div class="min-h-screen relative overflow-hidden py-20 px-8 transition-colors duration-700">

    {{-- 🎨 FONDO ADAPTATIVO --}}
    <div class="absolute inset-0 -z-10 transition-colors duration-700
        bg-gradient-to-br from-gray-100 via-gray-50 to-gray-200
        dark:from-gray-950 dark:via-gray-900 dark:to-black"></div>

    {{-- Textura --}}
    <div class="absolute inset-0 -z-10 opacity-[0.07] dark:opacity-[0.08]
        bg-[url('https://www.transparenttextures.com/patterns/smooth-wall.png')]
        bg-repeat"></div>

    {{-- Luces decorativas --}}
    <div class="absolute inset-0 pointer-events-none
        bg-[radial-gradient(circle_at_15%_25%,rgba(59,130,246,0.12),transparent_60%),radial-gradient(circle_at_85%_85%,rgba(168,85,247,0.1),transparent_60%)]
        dark:bg-[radial-gradient(circle_at_20%_20%,rgba(59,130,246,0.15),transparent_50%),radial-gradient(circle_at_80%_80%,rgba(168,85,247,0.15),transparent_50%)]">
    </div>

    {{-- HEADER --}}
    <div class="relative text-center mb-16">
        <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-3 tracking-tight">
            ¡Bienvenido, {{ Auth::user()->name }}!
        </h1>
        <p class="text-gray-600 dark:text-gray-400 text-lg max-w-2xl mx-auto">
            Has ingresado como mecánico. Desde aquí podrás administrar tus mantenimientos y labores asignadas.
        </p>
    </div>

    {{-- TARJETAS DE ESTADÍSTICAS --}}
    <div class="relative max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

        {{-- Mantenimientos Realizados --}}
        <a href="{{route('mecanico.misMantenimientos')}}" class="block group">
            <div class="relative rounded-3xl overflow-hidden border
                bg-white/90 dark:bg-gray-900/70 border-gray-200 dark:border-gray-700 
                shadow-[0_10px_25px_-10px_rgba(0,0,0,0.25)] dark:shadow-[0_0_35px_-10px_rgba(59,130,246,0.35)]
                hover:shadow-[0_20px_35px_-10px_rgba(0,0,0,0.35)] dark:hover:shadow-[0_0_60px_-10px_rgba(59,130,246,0.6)]
                transform hover:-translate-y-3 transition-all duration-700 ease-[cubic-bezier(0.19,1,0.22,1)] 
                backdrop-blur-md cursor-pointer">

                {{-- Overlay --}}
                <div class="absolute inset-0 rounded-3xl pointer-events-none bg-gradient-to-tr 
                    from-blue-500/10 via-transparent to-transparent opacity-0 
                    group-hover:opacity-100 transition-opacity duration-700 
                    dark:from-blue-400/20"></div>

                <div class="p-8 relative z-10 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl 
                        bg-blue-600/10 dark:bg-blue-500/20 mb-4">
                        <i data-lucide="wrench" class="w-8 h-8 text-blue-600 dark:text-blue-400"></i>
                    </div>

                    <h3 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-2">
                        {{ $mantenimientosCount ?? '0' }}
                    </h3>

                    <p class="text-gray-600 dark:text-gray-400 font-medium">
                        Mantenimientos realizados.
                    </p>
                    <span class="text-xs text-gray-500 dark:text-gray-400">
                        Da clic para ver.
                    </span>

                </div>
            </div>
        </a>


        {{-- Mecánicos --}}
        <div class="group relative rounded-3xl overflow-hidden border
                    bg-white/90 dark:bg-gray-900/70 border-gray-200 dark:border-gray-700 
                    shadow-[0_10px_25px_-10px_rgba(0,0,0,0.25)] dark:shadow-[0_0_35px_-10px_rgba(34,197,94,0.35)]
                    hover:shadow-[0_20px_35px_-10px_rgba(0,0,0,0.35)] dark:hover:shadow-[0_0_60px_-10px_rgba(34,197,94,0.6)]
                    transform hover:-translate-y-3 transition-all duration-700 ease-[cubic-bezier(0.19,1,0.22,1)] backdrop-blur-md">

            {{-- Overlay --}}
            <div class="absolute inset-0 rounded-3xl pointer-events-none bg-gradient-to-tr 
                        from-green-500/10 via-transparent to-transparent opacity-0 
                        group-hover:opacity-100 transition-opacity duration-700 dark:from-green-400/20"></div>

            <div class="p-8 relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-green-600/10 dark:bg-green-500/20 mb-4">
                    <i data-lucide="wrench" class="w-8 h-8 text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-2">
                    {{ $mantenimientosPorRealizar ?? '0' }}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 font-medium">Mantenimientos por realizar</p>
            </div>
        </div>

        {{-- Usuarios Normales --}}
        <div class="group relative rounded-3xl overflow-hidden border
                    bg-white/90 dark:bg-gray-900/70 border-gray-200 dark:border-gray-700 
                    shadow-[0_10px_25px_-10px_rgba(0,0,0,0.25)] dark:shadow-[0_0_35px_-10px_rgba(168,85,247,0.35)]
                    hover:shadow-[0_20px_35px_-10px_rgba(0,0,0,0.35)] dark:hover:shadow-[0_0_60px_-10px_rgba(168,85,247,0.6)]
                    transform hover:-translate-y-3 transition-all duration-700 ease-[cubic-bezier(0.19,1,0.22,1)] backdrop-blur-md">

            {{-- Overlay --}}
            <div class="absolute inset-0 rounded-3xl pointer-events-none bg-gradient-to-tr 
                        from-purple-500/10 via-transparent to-transparent opacity-0 
                        group-hover:opacity-100 transition-opacity duration-700 dark:from-purple-400/20"></div>

            <div class="p-8 relative z-10 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-purple-600/10 dark:bg-purple-500/20 mb-4">
                    <i data-lucide="motorbike" class="w-8 h-8 text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-2">
                    {{ $cantidadVehiculosRealizados ?? '0' }}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 font-medium">Motos Realizadas</p>
            </div>
        </div>
    </div>
</div>

{{-- Íconos FontAwesome --}}
<script src="https://kit.fontawesome.com/a2d9b6e6df.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>

@endsection