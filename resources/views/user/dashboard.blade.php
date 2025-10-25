@extends('layouts.app')

@section('content')
@if (session('success'))
    <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 animate-fadeIn">
        <div class="relative bg-white rounded-2xl shadow-lg p-6 max-w-sm w-full text-center transform transition-all scale-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">✅ ¡Actualización exitosa!</h3>
            <p class="text-gray-600">{{ session('success') }}</p>
            <button type="button" class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="cerrarModal()">ACEPTAR</button>
        </div>
    </div>

    <script>
        setTimeout(() => { cerrarModal(); }, 2500);
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
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Mis Vehículos</h1>
        <div class="flex items-center justify-between">
            <p class="text-gray-500">
                <span class="font-semibold text-gray-700">{{ $totalVehiculos }}</span> vehículo(s) registrado(s)
            </p>
            @if($totalVehiculos > 0)
                <a href="{{ route('user.vehiculos.store') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Agregar Vehículo
                </a>
            @endif
        </div>
    </div>

    @if($userVehiculos->isEmpty())
        <!-- Empty State -->
        <div class="text-center bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-12 border border-blue-100">
            <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-3">No tienes vehículos registrados</h2>
            <p class="text-gray-600 mb-6 max-w-md mx-auto">Comienza agregando tu primer vehículo para gestionar documentos, mantenimientos y más.</p>
            <a href="{{ route('user.vehiculos.store') }}"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Registrar Mi Primer Vehículo
            </a>
        </div>
    @else
        <!-- Vehicle Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($userVehiculos as $rel)
                <div class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-blue-200">
                    <!-- Card Header with Gradient -->
                    <div class="h-32 bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black opacity-10"></div>
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold backdrop-blur-sm
                                {{ $rel->estado ? 'bg-green-500/90 text-white' : 'bg-gray-500/90 text-white' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $rel->estado ? 'bg-white' : 'bg-gray-300' }} animate-pulse"></span>
                                {{ $rel->estado ? 'Activo' : 'Inactivo' }}
                            </span>
                        </div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <svg class="w-12 h-12 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <!-- Placa destacada -->
                        <div class="mb-4">
                            <div class="inline-block bg-gray-900 text-white px-4 py-2 rounded-lg font-bold text-xl tracking-wider border-2 border-gray-700">
                                {{ $rel->vehiculo->placa ?? 'N/A' }}
                            </div>
                        </div>

                        <!-- Vehicle Details -->
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Modelo</p>
                                    <p class="text-sm text-gray-800 font-semibold">{{ $rel->vehiculo->modelo ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-purple-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Color</p>
                                    <p class="text-sm text-gray-800 font-semibold">{{ $rel->vehiculo->color->nombre ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer Actions -->
                    <div class="border-t border-gray-100 bg-gray-50 px-6 py-4">
                        <div class="flex items-center justify-between gap-2">
                            <!-- Toggle Estado -->
                            <form action="{{ route('user.vehiculos.update', $rel->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="estado" value="{{ $rel->estado ? 0 : 1 }}">
                                <button class="w-full flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium transition-colors
                                    {{ $rel->estado ? 'text-yellow-700 bg-yellow-50 hover:bg-yellow-100' : 'text-green-700 bg-green-50 hover:bg-green-100' }}">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                                    </svg>
                                    {{ $rel->estado ? 'Desactivar' : 'Activar' }}
                                </button>
                            </form>

                            <!-- Documentos -->
                            <a href="{{ route('user.documentos-vehiculos.index', $rel->vehiculo->id) }}" 
                               class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Docs
                            </a>

                            <!-- Eliminar -->
                            <form action="{{ route('user.vehiculos.destroy', $rel->id) }}" method="POST" 
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este vehículo?')" 
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button class="w-full flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
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