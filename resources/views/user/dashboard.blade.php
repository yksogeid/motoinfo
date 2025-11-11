@extends('layouts.app')
@section('title', 'Mis Vehículos')

@section('content')
<div class="min-h-screen relative overflow-hidden py-20 px-8 transition-colors duration-700">

    {{-- FONDO ADAPTATIVO --}}
    <div class="absolute inset-0 -z-10 transition-colors duration-700
        bg-gradient-to-br from-gray-100 via-gray-50 to-gray-200
        dark:from-gray-950 dark:via-gray-900 dark:to-black">
    </div>

    {{-- Textura de fondo sutil --}}
    <div class="absolute inset-0 -z-10 opacity-[0.07] dark:opacity-[0.08]
        bg-[url('https://www.transparenttextures.com/patterns/smooth-wall.png')]
        bg-repeat">
    </div>

    {{-- Luces decorativas dinámicas --}}
    <div class="absolute inset-0 pointer-events-none
        bg-[radial-gradient(circle_at_15%_25%,rgba(59,130,246,0.12),transparent_60%),radial-gradient(circle_at_85%_85%,rgba(168,85,247,0.1),transparent_60%)]
        dark:bg-[radial-gradient(circle_at_20%_20%,rgba(59,130,246,0.15),transparent_50%),radial-gradient(circle_at_80%_80%,rgba(168,85,247,0.15),transparent_50%)]">
    </div>

    {{-- Header --}}
    <div class="relative text-center mb-16">
        <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-2 tracking-tight">Showroom Virtual</h1>
        <p class="text-gray-600 dark:text-gray-400 text-lg max-w-2xl mx-auto">
            Explora tu colección de vehículos en un entorno premium, con iluminación adaptable y presentación fluida.
        </p>
    </div>

    {{-- Estado vacío --}}
    @if ($userVehiculos->isEmpty())
        <div class="text-center mt-32">
            <div class="inline-block bg-white/80 dark:bg-gray-800/60 border border-gray-300 dark:border-gray-700 rounded-3xl px-16 py-12 shadow-2xl backdrop-blur-md transition-all">
                <h2 class="text-2xl font-bold mb-3 text-gray-900 dark:text-white">No hay vehículos registrados</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-8">Agrega tu primer vehículo y empieza a construir tu garaje virtual.</p>
                <a href="{{ route('vehiculos.create') }}"
                    class="px-6 py-3 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white font-semibold transition-all">
                    Agregar Vehículo
                </a>
            </div>
        </div>
    @else
        {{-- GALERÍA SHOWROOM --}}
        <div class="relative max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-14">
            @foreach ($userVehiculos as $rel)
                <div class="group relative rounded-3xl overflow-hidden border
                    bg-white/90 dark:bg-gray-900/70 border-gray-200 dark:border-gray-700 
                    shadow-[0_10px_25px_-10px_rgba(0,0,0,0.25)] dark:shadow-[0_0_35px_-10px_rgba(59,130,246,0.35)]
                    hover:shadow-[0_20px_35px_-10px_rgba(0,0,0,0.35)] dark:hover:shadow-[0_0_60px_-10px_rgba(59,130,246,0.6)]
                    transform hover:-translate-y-3 transition-all duration-700 ease-[cubic-bezier(0.19,1,0.22,1)] backdrop-blur-md">

                    {{-- ⚡ Overlay de luz decorativa (sin bloquear clics) --}}
                    <div class="absolute inset-0 rounded-3xl pointer-events-none bg-gradient-to-tr 
                        from-blue-500/5 via-transparent to-transparent opacity-0 
                        group-hover:opacity-100 transition-opacity duration-700 dark:from-blue-400/10">
                    </div>

                    {{-- CABECERA --}}
                    <div class="flex justify-between items-center p-6 relative z-10">
                        <h2 class="text-2xl font-bold tracking-wide text-gray-900 dark:text-white">
                            {{ $rel->vehiculo->placa ?? 'SIN PLACA' }}
                        </h2>
                        <span class="text-xs px-3 py-1 rounded-full font-semibold 
                            {{ $rel->estado
                                ? 'bg-green-100 text-green-700 border border-green-300 dark:bg-green-500/10 dark:text-green-400 dark:border-green-400/30'
                                : 'bg-gray-200 text-gray-600 border border-gray-300 dark:bg-gray-600/10 dark:text-gray-400 dark:border-gray-500/30' }}">
                            {{ $rel->estado ? 'Activo' : 'Inactivo' }}
                        </span>
                    </div>

                    {{-- INFORMACIÓN --}}
                    <div class="px-6 pb-6 space-y-2 text-sm relative z-10">
                        <p class="text-gray-700 dark:text-gray-400">
                            Modelo: <span class="font-medium text-gray-900 dark:text-gray-200">{{ $rel->vehiculo->modelo ?? 'N/A' }}</span>
                        </p>
                        <p class="text-gray-700 dark:text-gray-400">
                            Color: <span class="font-medium text-gray-900 dark:text-gray-200">{{ $rel->vehiculo->color->nombre ?? 'N/A' }}</span>
                        </p>
                        <p class="text-gray-700 dark:text-gray-400">
                            Registrado el: <span class="font-medium text-gray-900 dark:text-gray-200">{{ optional($rel->vehiculo->created_at)->format('d/m/Y') ?? '--' }}</span>
                        </p>
                    </div>

                    {{-- ACCIONES --}}
                    <div class="border-t border-gray-200/60 dark:border-gray-700/60 px-6 py-4 bg-gray-50/40 dark:bg-gray-800/40 relative z-10">
                        <div class="flex flex-wrap gap-3 justify-center">

                            {{-- Documentos --}}
                            <a href="{{ route('user.documentos-vehiculos.index', $rel->vehiculo->id) }}"
                                type="button"
                                class="px-4 py-1.5 text-xs rounded-lg 
                                    bg-blue-100 text-blue-700 border border-blue-300 hover:bg-blue-200
                                    dark:bg-blue-600/20 dark:border-blue-500/30 dark:text-blue-300 dark:hover:bg-blue-600/30 transition-all">
                                Documentos
                            </a>

                            {{-- Activar / Desactivar --}}
                            <form action="{{ route('user.vehiculos.update', $rel->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="estado" value="{{ $rel->estado ? 0 : 1 }}">
                                <button type="submit"
                                    class="px-4 py-1.5 text-xs rounded-lg transition-all
                                        {{ $rel->estado 
                                            ? 'bg-yellow-100 text-yellow-700 border border-yellow-300 hover:bg-yellow-200 dark:bg-yellow-500/20 dark:border-yellow-500/30 dark:text-yellow-300 dark:hover:bg-yellow-600/30' 
                                            : 'bg-green-100 text-green-700 border border-green-300 hover:bg-green-200 dark:bg-green-500/20 dark:border-green-500/30 dark:text-green-300 dark:hover:bg-green-600/30' }}">
                                    {{ $rel->estado ? 'Desactivar' : 'Activar' }}
                                </button>
                            </form>

                            {{-- Eliminar --}}
                            <form action="{{ route('user.vehiculos.destroy', $rel->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este vehículo?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-1.5 text-xs rounded-lg 
                                        bg-red-100 text-red-700 border border-red-300 hover:bg-red-200 
                                        dark:bg-red-500/20 dark:border-red-500/30 dark:text-red-300 dark:hover:bg-red-600/30 transition-all">
                                    Eliminar
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
