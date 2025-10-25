@extends('layouts.app')

@section('content')
@if (session('success'))
    <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 dark:bg-opacity-60 z-50 animate-fadeIn">
        <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 max-w-sm w-full text-center transform transition-all scale-100">
            <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">¡Actualización exitosa!</h3>
            <p class="text-gray-600 dark:text-gray-300">{{ session('success') }}</p>
            <button type="button"
                class="mt-6 bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-colors"
                onclick="cerrarModal()">ACEPTAR</button>
        </div>
    </div>

    <script>
        setTimeout(() => cerrarModal(), 2500);
        function cerrarModal() {
            const modal = document.getElementById('successModal');
            if (modal) {
                modal.classList.add('opacity-0', 'scale-90');
                setTimeout(() => modal.remove(), 300);
            }
        }
    </script>
@endif

<div class="max-w-7xl mx-auto py-8 px-4">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-2 flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    Documentos del Vehículo
                </h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    Gestiona y visualiza todos los documentos asociados a este vehículo
                </p>
            </div>
            
            <button class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center gap-2 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Subir Documento
            </button>
        </div>

        <!-- Stats Cards -->
       @if (!empty($documentoVehiculos) && count($documentoVehiculos) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">

        {{-- Total Documentos --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $documentoVehiculos->count() }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Documentos</p>
                </div>
            </div>
        </div>

        {{-- Aprobados --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $documentoVehiculos->filter(fn($d) => $d->estado_validacion?->nombre === 'Aprobado')->count() }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Aprobados</p>
                </div>
            </div>
        </div>

        {{-- Pendientes --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $documentoVehiculos->filter(fn($d) => $d->estado_validacion?->nombre === 'En espera')->count() }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Pendientes</p>
                </div>
            </div>
        </div>

        {{-- Rechazados --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $documentoVehiculos->filter(fn($d) => $d->estado_validacion?->nombre === 'Rechazado')->count() }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Rechazados</p>
                </div>
            </div>
        </div>

    </div>
@endif

    </div>

    <!-- Documents Grid -->
    @if (!empty($documentoVehiculos) && count($documentoVehiculos) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @foreach ($documentoVehiculos as $doc)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg dark:shadow-gray-900/50 transition-all border border-gray-200 dark:border-gray-700 overflow-hidden group">
                    <!-- Header del documento -->
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-white dark:bg-gray-900 rounded-lg flex items-center justify-center shadow-sm">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">Documento #{{ $doc->id }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tipo: {{ $doc->tipo_documento_id }}</p>
                                </div>
                            </div>
                            
                            @php
    $estado = $doc->estado_validacion->nombre ?? 'Desconocido';
    $colorClase = match ($estado) {
        'Activo' => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
        'Rechazado' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
        'En espera' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400',
        default => 'bg-gray-100 text-gray-700 dark:bg-gray-800/30 dark:text-gray-400',
    };
    $puntoColor = match ($estado) {
        'Aprobado' => 'bg-green-500',
        'Rechazado' => 'bg-red-500',
        'En espera' => 'bg-yellow-500',
        default => 'bg-gray-400',
    };
@endphp

<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold {{ $colorClase }}">
    <span class="w-2 h-2 rounded-full {{ $puntoColor }} animate-pulse"></span>
    {{ $estado }}
</span>

                        </div>
                    </div>

                    <!-- Cuerpo del documento -->
                    <div class="p-6 space-y-4">
                        <!-- Información principal -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Fecha de Subida
                                </p>
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                    {{ \Carbon\Carbon::parse($doc->fechaSubida)->format('d/m/Y') }}
                                </p>
                                <p class="text-xs text-gray-400 dark:text-gray-500">
                                    {{ \Carbon\Carbon::parse($doc->fechaSubida)->format('H:i') }}
                                </p>
                            </div>

                            <div class="space-y-1">
                                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                    ID Vehículo
                                </p>
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                    #{{ $doc->vehiculo_id }}
                                </p>
                            </div>
                        </div>

                        <!-- Info de aprobación -->
                        @if (!empty($doc->id_admin_aprobo))
                        @php
    $estado = $doc->estado_validacion->nombre ?? 'Desconocido';

    // Determinar colores según el estado
    $bgColor = match ($estado) {
        'Aprobado' => 'bg-green-50 dark:bg-green-900/20 border-green-100 dark:border-green-800',
        'En espera' => 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-100 dark:border-yellow-800',
        'Rechazado' => 'bg-red-50 dark:bg-red-900/20 border-red-100 dark:border-red-800',
        default => 'bg-gray-50 dark:bg-gray-900/20 border-gray-100 dark:border-gray-800',
    };

    $iconColor = match ($estado) {
        'Aprobado' => 'text-green-600 dark:text-green-400',
        'En espera' => 'text-yellow-600 dark:text-yellow-400',
        'Rechazado' => 'text-red-600 dark:text-red-400',
        default => 'text-gray-600 dark:text-gray-400',
    };
@endphp

<div class="rounded-lg p-3 border {{ $bgColor }}">
    <div class="flex items-start gap-2">
        <!-- Ícono de estado -->
        <svg class="w-5 h-5 {{ $iconColor }} mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            @if ($estado === 'Aprobado')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            @elseif ($estado === 'En espera')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            @elseif ($estado === 'Rechazado')
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            @else
                <circle cx="12" cy="12" r="10" stroke-width="2" />
            @endif
        </svg>

        <!-- Contenido -->
        <div class="flex-1">
            <p class="text-xs font-medium mb-1 {{ $iconColor }}">
                {{ $estado }}
            </p>
            <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                {{ $doc->admin_aprobo?->name ?? 'N/A' }}
                

            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                {{ $doc->fecha_aprobacion
                    ? \Carbon\Carbon::parse($doc->fecha_aprobacion)->format('d/m/Y H:i')
                    : 'Sin fecha' }}
            </p>
                   <!-- Observación -->
                        @if($doc->observacion)
                        <br>
                            <p class="text-xs text-blue-600 dark:text-blue-400 font-medium mb-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Observación
                            </p>
                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $doc->observacion }}</p>
                        @endif
        </div>
    </div>
</div>

                        @endif

                        <!-- Botón de ver archivo -->
                        <a href="#" target="_blank" 
                           class="flex items-center justify-center gap-2 w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 dark:from-blue-500 dark:to-indigo-500 dark:hover:from-blue-600 dark:hover:to-indigo-600 text-white py-3 rounded-lg font-medium transition-all group-hover:shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Ver Documento
                        </a>
                    </div>

                    <!-- Footer con acciones -->
                    <div class="bg-gray-50 dark:bg-gray-900/50 px-6 py-3 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
                        <button class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium flex items-center gap-1 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Descargar
                        </button>
                        
                        <button class="text-sm text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 font-medium flex items-center gap-1 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Eliminar
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 rounded-2xl p-12 border-2 border-dashed border-gray-300 dark:border-gray-600">
            <div class="w-24 h-24 bg-gray-200 dark:bg-gray-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-3">No hay documentos registrados</h2>
            <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">
                Este vehículo aún no tiene documentos asociados. Comienza subiendo el primer documento.
            </p>
            <button class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-8 py-3 rounded-lg font-medium transition-colors shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Subir Primer Documento
            </button>
        </div>
    @endif
</div>

@endsection