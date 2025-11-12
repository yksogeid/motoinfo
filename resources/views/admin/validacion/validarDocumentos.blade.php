@extends('layouts.app')
@section('title', 'Validar Documentos')

@section('content')
@if (session('success'))
<div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 dark:bg-opacity-60 z-50 animate-fadeIn">
    <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 max-w-sm w-full text-center transform transition-all scale-100">
        <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">¡Registro Actualizado!</h3>
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

<div x-data="{ modalOpen: false, documentoId: null, accion: '', tituloModal: '' }"
     class="min-h-screen relative overflow-hidden py-20 px-8 transition-colors duration-700">

    {{-- 🎨 FONDO --}}
    <div class="absolute inset-0 -z-10 transition-colors duration-700
        bg-gradient-to-br from-gray-100 via-gray-50 to-gray-200
        dark:from-gray-950 dark:via-gray-900 dark:to-black"></div>

    {{-- Textura --}}
    <div class="absolute inset-0 -z-10 opacity-[0.07] dark:opacity-[0.08]
        bg-[url('https://www.transparenttextures.com/patterns/smooth-wall.png')]
        bg-repeat"></div>

    {{-- HEADER --}}
    <div class="relative text-center mb-16">
        <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-3 tracking-tight">
            Validación de Documentos
        </h1>
        <p class="text-gray-600 dark:text-gray-400 text-lg max-w-2xl mx-auto">
            Revisa, valida o rechaza los documentos subidos por los usuarios.
        </p>
    </div>

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 max-w-7xl mx-auto">

        {{-- 🕓 EN ESPERA --}}
        <div>
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-3 text-yellow-600 dark:text-yellow-400">
                <i class="fa-solid fa-hourglass-half text-yellow-500"></i>
                En Espera
            </h2>

            <div class="grid grid-cols-1 gap-6">
                @forelse($documentos->where('id_estado_validacion', 1) as $doc)
                    <div class="rounded-3xl overflow-hidden border
                                bg-white/90 dark:bg-gray-900/70 border-gray-200 dark:border-gray-700
                                shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-700 backdrop-blur-md">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $doc->tipo_documento->nombre ?? 'Documento' }}
                                </h3>
                                <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 dark:bg-yellow-500/20 text-yellow-700 dark:text-yellow-400">
                                    En espera
                                </span>
                            </div>

                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                <i class="fa-solid fa-motorcycle mr-1 text-gray-400"></i>
                                <strong>Vehículo:</strong> {{ $doc->vehiculo->placa ?? '—' }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                <i class="fa-solid fa-calendar-days mr-1 text-gray-400"></i>
                                <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($doc->fechaSubida)->format('d/m/Y H:i') }}
                            </p>

                            @if($doc->urlArchivo)
                                <a href="{{ asset('storage/'.$doc->urlArchivo) }}" target="_blank"
                                   class="inline-flex items-center gap-2 text-blue-600 dark:text-blue-400 hover:underline mt-2">
                                    <i class="fa-solid fa-file-pdf"></i> Ver Documento
                                </a>
                            @endif

                            <div class="mt-5 flex justify-end gap-3">
                                {{-- Botón Rechazar --}}
                                <button 
                                    @click="modalOpen = true; documentoId = {{ $doc->id }}; accion = 'rechazar'; tituloModal = 'Rechazar Documento';"
                                    class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700 transition-all duration-300">
                                    <i class="fa-solid fa-xmark"></i> Rechazar
                                </button>

                                {{-- Botón Validar --}}
                                <button 
                                    @click="modalOpen = true; documentoId = {{ $doc->id }}; accion = 'validar'; tituloModal = 'Validar Documento';"
                                    class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition-all duration-300">
                                    <i class="fa-solid fa-clipboard-check"></i> Validar
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400 italic">No hay documentos en espera.</p>
                @endforelse
            </div>
        </div>

        {{-- ✅ VALIDADOS --}}
        <div>
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-3 text-green-600 dark:text-green-400">
                <i class="fa-solid fa-circle-check text-green-500"></i>
                Validados
            </h2>

            <div class="grid grid-cols-1 gap-6">
                @forelse($documentos->where('id_estado_validacion', 2) as $doc)
                    <div class="rounded-3xl overflow-hidden border bg-white/90 dark:bg-gray-900/70 border-gray-200 dark:border-gray-700 shadow-md hover:shadow-xl transition-all duration-500 backdrop-blur-md">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                {{ $doc->tipo_documento->nombre ?? 'Documento' }}
                            </h3>
                            <span class="px-3 py-1 text-sm rounded-full bg-green-100 dark:bg-green-500/20 text-green-700 dark:text-green-400">
                                Validado
                            </span>

                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <i class="fa-solid fa-motorcycle mr-1"></i> <strong>Vehículo:</strong> {{ $doc->vehiculo->placa ?? '—' }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fa-solid fa-user-shield mr-1"></i> <strong>Admin:</strong> {{ $doc->admin_aprobo->name ?? '—' }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fa-solid fa-calendar-check mr-1"></i>
                                <strong>Aprobado:</strong> {{ \Carbon\Carbon::parse($doc->fecha_aprobacion)->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400 italic">No hay documentos validados.</p>
                @endforelse
            </div>
        </div>

        {{-- ❌ RECHAZADOS --}}
        <div>
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-3 text-red-600 dark:text-red-400">
                <i class="fa-solid fa-xmark-circle text-red-500"></i>
                Rechazados
            </h2>

            <div class="grid grid-cols-1 gap-6">
                @forelse($documentos->where('id_estado_validacion', 3) as $doc)
                    <div class="rounded-3xl overflow-hidden border bg-white/90 dark:bg-gray-900/70 border-gray-200 dark:border-gray-700 shadow-md hover:shadow-xl transition-all duration-500 backdrop-blur-md">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                {{ $doc->tipo_documento->nombre ?? 'Documento' }}
                            </h3>
                            <span class="px-3 py-1 text-sm rounded-full bg-red-100 dark:bg-red-500/20 text-red-700 dark:text-red-400">
                                Rechazado
                            </span>

                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <i class="fa-solid fa-motorcycle mr-1"></i> <strong>Vehículo:</strong> {{ $doc->vehiculo->placa ?? '—' }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fa-solid fa-user-shield mr-1"></i> <strong>Admin:</strong> {{ $doc->admin_aprobo->name ?? '—' }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fa-solid fa-comment-dots mr-1"></i>
                                <strong>Motivo:</strong> {{ $doc->observacion ?? '—' }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400 italic">No hay documentos rechazados.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- 🪟 MODAL --}}
    <div x-show="modalOpen" 
         x-transition 
         class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 backdrop-blur-sm">
        <div @click.away="modalOpen = false"
             class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-md w-full shadow-xl">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4" x-text="tituloModal"></h3>

            <form method="POST" action="{{ route('documentos.validar') }}">
                @csrf
                <input type="hidden" name="documento_id" :value="documentoId">
                <input type="hidden" name="accion" :value="accion">
                
                <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Observación:
                </label>
                <textarea name="observacion" required rows="4"
                          class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900
                                 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 p-3"></textarea>

                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" @click="modalOpen = false"
                            class="px-4 py-2 bg-gray-300 dark:bg-gray-700 dark:text-gray-200 rounded-xl hover:bg-gray-400 transition-all">
                        Cancelar
                    </button>
                    <button type="submit"
                            :class="accion === 'validar' 
                                    ? 'bg-blue-600 hover:bg-blue-700' 
                                    : 'bg-red-600 hover:bg-red-700'"
                            class="px-5 py-2 text-white font-semibold rounded-xl transition-all">
                        <span x-text="accion === 'validar' ? 'Validar' : 'Rechazar'"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

{{-- FontAwesome --}}
<script src="https://kit.fontawesome.com/a2d9b6e6df.js" crossorigin="anonymous"></script>
{{-- Alpine.js --}}
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
