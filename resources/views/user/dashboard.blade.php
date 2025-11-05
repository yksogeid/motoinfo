@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
   @if (session('success'))
    <div id="successModal"
         class="fixed inset-0 flex items-center justify-center bg-black/40 dark:bg-black/60 z-50 animate-fadeIn">
        <div
            class="relative bg-white dark:bg-gray-900 rounded-2xl shadow-2xl p-6 max-w-sm w-full text-center 
                   transform transition-all scale-100 border border-gray-200 dark:border-gray-700">

            <!-- Ícono -->
            <div class="mx-auto mb-3 w-14 h-14 rounded-full flex items-center justify-center
                        bg-green-100 text-green-600 dark:bg-green-900/40 dark:text-green-300 shadow-inner">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <!-- Título -->
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">
                {{ session('titulo') }}
            </h3>

            <!-- Mensaje -->
            <p class="text-gray-600 dark:text-gray-300">
                {{ session('success') }}
            </p>

            <!-- Botón -->
            <button type="button"
                class="mt-6 bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600
                       text-white font-semibold py-2 px-5 rounded-lg shadow-md transition-all duration-200
                       hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-500"
                onclick="cerrarModal()">
                ACEPTAR
            </button>

            <!-- Cierre automático -->
            <script>
                setTimeout(() => { cerrarModal(); }, 2500);
                function cerrarModal() {
                    const modal = document.getElementById('successModal');
                    if (modal) {
                        modal.classList.add('opacity-0', 'scale-90', 'transition-all', 'duration-300');
                        setTimeout(() => modal.remove(), 300);
                    }
                }
            </script>
        </div>
    </div>
@endif


    <div class="max-w-7xl mx-auto py-8 px-4">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2 dark:text-white">Mis Vehículos</h1>
            <div class="flex items-center justify-between">
                <p class="text-gray-500 dark:text-gray-400">
                    <span class="font-semibold text-gray-700 dark:text-gray-200">{{ $totalVehiculos }}</span> vehículo(s) registrado(s)
                </p>
                @if($totalVehiculos > 0)
                    <a href="{{ route('vehiculos.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-3">No tienes vehículos registrados</h2>
                <p class="text-gray-600 mb-6 max-w-md mx-auto">Comienza agregando tu primer vehículo para gestionar documentos,
                    mantenimientos y más.</p>
                <a href="#"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Registrar Mi Primer Vehículo
                </a>
            </div>
        @else
            <!-- Vehicle Cards Grid -->
            <!-- Vehicle Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($userVehiculos as $rel)
        <div
            class="group rounded-xl border transition-all duration-300 overflow-hidden
                   bg-white border-gray-200 shadow-sm hover:shadow-xl
                   dark:bg-gray-900 dark:border-gray-700 dark:hover:border-blue-500">

            <!-- Header -->
            <div class="h-32 relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-700 dark:from-blue-800 dark:via-indigo-800 dark:to-purple-900">
                <div class="absolute inset-0 bg-black/20 dark:bg-black/40"></div>

                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold
                        backdrop-blur-sm border
                        {{ $rel->estado ? 'bg-green-600/80 border-green-700 text-white' : 'bg-gray-600/70 border-gray-700 text-gray-100' }}">
                        <span class="w-2 h-2 rounded-full {{ $rel->estado ? 'bg-white' : 'bg-gray-300' }} animate-pulse"></span>
                        {{ $rel->estado ? 'Activo' : 'Inactivo' }}
                    </span>
                </div>

                <div class="absolute bottom-4 left-4 text-white opacity-80">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>

            <!-- Body -->
            <div class="p-6">
                <div class="flex justify-center mb-4">
                    <div class="inline-block bg-yellow-400 text-black font-bold text-xl tracking-wider px-6 py-3 rounded-md border-4 border-gray-900 text-center shadow-md dark:border-gray-200 dark:shadow-gray-700">
                        <div>{{ $rel->vehiculo->placa ?? 'N/A' }}</div>
                        <div class="text-xs font-semibold tracking-wide -mt-1 uppercase text-gray-800 dark:text-gray-900">Colombia</div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                            <svg class="w-4 h-4 text-blue-700 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Modelo</p>
                            <p class="text-sm text-gray-900 dark:text-gray-100 font-semibold">{{ $rel->vehiculo->modelo ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 flex items-center justify-center rounded-lg bg-purple-100 dark:bg-purple-900/30">
                            <svg class="w-4 h-4 text-purple-700 dark:text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-600 dark:text-gray-400 font-medium">Color</p>
                            <p class="text-sm text-gray-900 dark:text-gray-100 font-semibold">{{ $rel->vehiculo->color->nombre ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="border-t bg-gray-50 dark:bg-gray-800 dark:border-gray-700 px-6 py-4">
                <div class="flex items-center justify-between gap-2">
                    <!-- Estado -->
                    <form action="{{ route('user.vehiculos.update', $rel->id) }}" method="POST" class="flex-1">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="estado" value="{{ $rel->estado ? 0 : 1 }}">
                        <button
                            class="w-full flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium transition-all
                                   {{ $rel->estado 
                                       ? 'text-yellow-800 bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900/40 dark:text-yellow-300 dark:hover:bg-yellow-800/50' 
                                       : 'text-green-800 bg-green-100 hover:bg-green-200 dark:bg-green-900/40 dark:text-green-300 dark:hover:bg-green-800/50' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                            {{ $rel->estado ? 'Desactivar' : 'Activar' }}
                        </button>
                    </form>

                    <!-- Docs -->
                    <a href="{{ route('user.documentos-vehiculos.index', $rel->vehiculo->id) }}"
                       class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium
                              text-blue-800 bg-blue-100 hover:bg-blue-200
                              dark:text-blue-300 dark:bg-blue-900/40 dark:hover:bg-blue-800/60 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Docs
                    </a>

                    <!-- Eliminar -->
                    <form action="{{ route('user.vehiculos.destroy', $rel->id) }}" method="POST"
                          onsubmit="return confirm('¿Seguro que deseas eliminar este vehículo?')" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button
                            class="w-full flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg text-sm font-medium
                                   text-red-800 bg-red-100 hover:bg-red-200
                                   dark:text-red-300 dark:bg-red-900/40 dark:hover:bg-red-800/60 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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

