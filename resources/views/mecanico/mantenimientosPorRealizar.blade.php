@extends('layouts.app')
@section('title', 'Mecanico - Mantenimientos Por Realizar')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                <i data-lucide="clipboard-check" class="w-8 h-8 text-emerald-600"></i>
                Mantenimientos por Realizar
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Revisa los mantenimientos programados o pendientes por completar.
            </p>
        </div>

        {{-- Barra de filtros y búsqueda --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                {{-- Búsqueda --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i data-lucide="search" class="w-4 h-4 inline mr-1"></i>
                        Buscar por vehículo
                    </label>
                    <input type="text"
                        id="searchInput"
                        placeholder="Placa, modelo o marca..."
                        class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white">
                </div>

                {{-- Fecha desde --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i data-lucide="calendar" class="w-4 h-4 inline mr-1"></i>
                        Fecha desde
                    </label>
                    <input type="date"
                        id="dateFrom"
                        class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white">
                </div>

                {{-- Fecha hasta --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i data-lucide="calendar" class="w-4 h-4 inline mr-1"></i>
                        Fecha hasta
                    </label>
                    <input type="date"
                        id="dateTo"
                        class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white">
                </div>
            </div>

            {{-- Botón limpiar --}}
            <div class="flex items-center justify-end mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <button onclick="clearFilters()"
                    class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white flex items-center gap-2">
                    <i data-lucide="x-circle" class="w-4 h-4"></i>
                    Limpiar filtros
                </button>
            </div>
        </div>

        {{-- GRID 3x3 --}}
        @if ($mantenimientos->count() > 0)
        <div id="gridView" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($mantenimientos as $item)
            <div class="maintenance-item bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-200 dark:border-gray-700 overflow-hidden"
                data-placa="{{ strtolower($item->vehiculo->placa ?? '') }}"
                data-modelo="{{ strtolower($item->vehiculo->modelo ?? '') }}"
                data-fecha="{{ $item->created_at ? $item->created_at->format('Y-m-d') : '' }}">

                <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <i data-lucide="car" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">{{ $item->vehiculo->linea->nombre ?? 'N/A' }}</h3>
                                <h3 class="text-lg font-bold text-white">{{ $item->vehiculo->placa ?? 'N/A' }}</h3>
                                <p class="text-xs text-amber-100">{{ $item->vehiculo->modelo ?? 'Sin modelo' }}</p>
                            </div>
                        </div>
                        <i data-lucide="circle-alert" class="w-6 h-6 text-white"></i>
                    </div>
                </div>


                <div class="p-6 space-y-4">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-2">Observaciones</p>
                        <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-2">
                            {{ blank($item->observacion) ? 'Sin observación' : $item->observacion }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-2">
                            Fecha Programada
                        </p>

                        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <i data-lucide="calendar-check" class="w-4 h-4"></i>

                            <span>
                                {{ $item->fechaProgramada
                                ? \Carbon\Carbon::parse($item->fechaProgramada)->format('d/m/Y')
                                : 'Sin fecha'
                            }}
                            </span>
                        </div>
                    </div>


                    <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                        <button onclick="openModal({{ json_encode([
                            'id' => $item->id,
                            'placa' => $item->vehiculo->placa ?? 'N/A',
                            'linea' => $item->vehiculo->linea->nombre ?? 'N/A',
                            'modelo' => $item->vehiculo->modelo ?? 'Sin modelo',
                            'observacion' => $item->observacion ?? 'Sin observación',
                            'fechaProgramada' => $item->fechaProgramada ? \Carbon\Carbon::parse($item->fechaProgramada)->format('d/m/Y') : 'Sin fecha',
                            'fechaCreacion' => $item->created_at ? $item->created_at->format('d/m/Y H:i') : 'N/A'
                        ]) }})"
                            class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg transition-colors">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                            Ver Detalles
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Mensaje sin resultados --}}
        <div id="noResults" class="hidden bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
            <i data-lucide="search-x" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">No se encontraron resultados</h3>
            <p class="text-gray-600 dark:text-gray-400">Intenta ajustar los filtros de búsqueda</p>
        </div>

        @else

        {{-- Vacío --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border-2 border-dashed border-gray-300 dark:border-gray-600 p-20 text-center">
            <i data-lucide="inbox" class="w-16 h-16 text-gray-400 mx-auto mb-6"></i>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">
                No hay mantenimientos registrados
            </h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-lg mx-auto">
                Los mantenimientos completados aparecerán aquí para su revisión y seguimiento.
            </p>
        </div>

        @endif

    </div>
</div>

{{-- Modal de Detalles --}}
<div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
        {{-- Header del Modal --}}
        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 px-6 py-5 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                    <i data-lucide="file-text" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Detalles del Mantenimiento</h2>
                    <p class="text-sm text-emerald-100">Información completa del registro</p>
                </div>
            </div>
            <button onclick="closeModal()" class="text-white hover:bg-white/20 rounded-lg p-2 transition-colors">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>

        {{-- Contenido del Modal --}}
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-180px)]">
            <div class="space-y-6">
                {{-- Información del Vehículo --}}
                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-5 border border-gray-200 dark:border-gray-600">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                        <i data-lucide="car" class="w-5 h-5 text-emerald-600"></i>
                        Información del Vehículo
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-1">Placa</p>
                            <p id="modalPlaca" class="text-base font-bold text-gray-900 dark:text-white">-</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-1">Línea</p>
                            <p id="modalLinea" class="text-base font-bold text-gray-900 dark:text-white">-</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-1">Modelo</p>
                            <p id="modalModelo" class="text-base text-gray-700 dark:text-gray-300">-</p>
                        </div>
                    </div>
                </div>

                {{-- Detalles del Mantenimiento --}}
                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-5 border border-gray-200 dark:border-gray-600">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                        <i data-lucide="wrench" class="w-5 h-5 text-emerald-600"></i>
                        Detalles del Mantenimiento
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-1">Fecha Programada</p>
                            <div class="flex items-center gap-2">
                                <i data-lucide="calendar-check" class="w-4 h-4 text-emerald-600"></i>
                                <p id="modalFechaProgramada" class="text-base text-gray-900 dark:text-white font-medium">-</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-1">Fecha de Registro</p>
                            <div class="flex items-center gap-2">
                                <i data-lucide="clock" class="w-4 h-4 text-gray-600 dark:text-gray-400"></i>
                                <p id="modalFechaCreacion" class="text-base text-gray-700 dark:text-gray-300">-</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-2">Observaciones</p>
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                                <p id="modalObservacion" class="text-sm text-gray-700 dark:text-gray-300 whitespace-pre-wrap">-</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Conclusión Técnica del Mecánico --}}
                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-xl p-5 border-2 border-blue-200 dark:border-blue-700">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                        <i data-lucide="clipboard-check" class="w-5 h-5 text-blue-600"></i>
                        Conclusión Técnica
                    </h3>

                    <form id="conclusionForm" class="space-y-4">
                        <input type="hidden" id="mantenimientoId" value="">

                        {{-- Textarea para conclusión --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Ingrese su conclusión técnica
                            </label>
                            <textarea
                                id="conclusionText"
                                rows="4"
                                placeholder="Describa el trabajo realizado, partes reemplazadas, condición del vehículo..."
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white resize-none"></textarea>
                        </div>

                        {{-- Botones de control de audio --}}
                        <div class="flex items-center gap-3">
                            <button
                                type="button"
                                id="recordBtn"
                                onclick="toggleRecording()"
                                class="flex items-center gap-2 px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors">
                                <i data-lucide="mic" class="w-4 h-4"></i>
                                <span id="recordBtnText">Grabar Audio</span>
                            </button>

                            <div id="recordingIndicator" class="hidden flex items-center gap-2 text-red-600 dark:text-red-400 animate-pulse">
                                <div class="w-3 h-3 bg-red-600 rounded-full"></div>
                                <span class="text-sm font-medium">Grabando...</span>
                                <span id="recordingTime" class="text-sm">0:00</span>
                            </div>
                        </div>

                        {{-- Audio player (oculto inicialmente) --}}
                        <div id="audioPreview" class="hidden bg-white dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                            <div class="flex items-center gap-3">
                                <i data-lucide="volume-2" class="w-5 h-5 text-blue-600"></i>
                                <audio id="audioPlayer" controls class="flex-1 h-10"></audio>
                                <button
                                    type="button"
                                    onclick="clearAudio()"
                                    class="text-red-600 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Botón guardar --}}
                        <div class="flex justify-end pt-2">
                            <button
                                type="submit"
                                class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                                <i data-lucide="save" class="w-4 h-4"></i>
                                Guardar Conclusión
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Footer del Modal --}}
        <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4 flex items-center justify-between border-t border-gray-200 dark:border-gray-600">
            <button onclick="closeModal()"
                class="px-5 py-2.5 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-200 font-semibold rounded-lg transition-colors">
                Cerrar
            </button>
            <a id="modalVerCompleto" href="#"
                class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg transition-colors flex items-center gap-2">
                <i data-lucide="external-link" class="w-4 h-4"></i>
                Ver página completa
            </a>
        </div>
    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();

    // VARIABLES PARA GRABACIÓN DE AUDIO
    let mediaRecorder;
    let audioChunks = [];
    let recordingInterval;
    let recordingSeconds = 0;
    let audioBlob = null;

    // FUNCIONES DEL MODAL
    function openModal(data) {
        document.getElementById('modalPlaca').textContent = data.placa;
        document.getElementById('modalLinea').textContent = data.linea;
        document.getElementById('modalModelo').textContent = data.modelo;
        document.getElementById('modalObservacion').textContent = data.observacion;
        document.getElementById('modalFechaProgramada').textContent = data.fechaProgramada;
        document.getElementById('modalFechaCreacion').textContent = data.fechaCreacion;
        document.getElementById('modalVerCompleto').href = '/mantenimiento/' + data.id;
        document.getElementById('mantenimientoId').value = data.id;

        // Limpiar el formulario
        document.getElementById('conclusionText').value = '';
        clearAudio();

        document.getElementById('detailModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        // Reinicializar iconos de Lucide en el modal
        setTimeout(() => lucide.createIcons(), 100);
    }

    function closeModal() {
        document.getElementById('detailModal').classList.add('hidden');
        document.body.style.overflow = 'auto';

        // Detener grabación si está activa
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            stopRecording();
        }
    }

    // FUNCIONES DE GRABACIÓN DE AUDIO
    async function toggleRecording() {
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            stopRecording();
        } else {
            startRecording();
        }
    }

    async function startRecording() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({
                audio: true
            });
            mediaRecorder = new MediaRecorder(stream);
            audioChunks = [];
            recordingSeconds = 0;

            mediaRecorder.ondataavailable = (event) => {
                audioChunks.push(event.data);
            };

            mediaRecorder.onstop = async () => {
                audioBlob = new Blob(audioChunks, {
                    type: 'audio/wav'
                });

                const audioUrl = URL.createObjectURL(audioBlob);
                const audioPlayer = document.getElementById('audioPlayer');
                audioPlayer.src = audioUrl;

                document.getElementById('audioPreview').classList.remove('hidden');

                // Detener pistas
                stream.getTracks().forEach(track => track.stop());

                // Mostrar mensaje transcribiendo
                const originalText = document.getElementById('recordBtnText').textContent;
                document.getElementById('recordBtnText').textContent = 'Transcribiendo...';

                // Enviar audio al backend
                const formData = new FormData();
                formData.append('audio', audioBlob, 'audio.wav');
                const mantenimientoId = document.getElementById('mantenimientoId').value;
                formData.append('mantenimiento_id', mantenimientoId);

                try {
                    const response = await fetch('/mecanico/transcribirAudio', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (data.text) {
                        // Añadir lo transcrito al textarea
                        const textarea = document.getElementById('conclusionText');
                        textarea.value += (textarea.value ? "\n" : "") + data.text;
                    } else {
                        alert("Error al transcribir el audio");
                    }
                } catch (error) {
                    console.error(error);
                    alert("Error al transcribir el audio");
                }

                document.getElementById('recordBtnText').textContent = originalText;

                setTimeout(() => lucide.createIcons(), 100);
            };


            mediaRecorder.start();

            // Actualizar UI
            document.getElementById('recordBtn').classList.remove('bg-red-600', 'hover:bg-red-700');
            document.getElementById('recordBtn').classList.add('bg-gray-600', 'hover:bg-gray-700');
            document.getElementById('recordBtnText').textContent = 'Detener Grabación';
            document.getElementById('recordingIndicator').classList.remove('hidden');

            // Contador de tiempo
            recordingInterval = setInterval(() => {
                recordingSeconds++;
                const minutes = Math.floor(recordingSeconds / 60);
                const seconds = recordingSeconds % 60;
                document.getElementById('recordingTime').textContent =
                    `${minutes}:${seconds.toString().padStart(2, '0')}`;
            }, 1000);

        } catch (error) {
            alert('Error al acceder al micrófono. Por favor, verifica los permisos.');
            console.error('Error:', error);
        }
    }

    function stopRecording() {
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            mediaRecorder.stop();
            clearInterval(recordingInterval);

            // Restaurar UI
            document.getElementById('recordBtn').classList.remove('bg-gray-600', 'hover:bg-gray-700');
            document.getElementById('recordBtn').classList.add('bg-red-600', 'hover:bg-red-700');
            document.getElementById('recordBtnText').textContent = 'Grabar Audio';
            document.getElementById('recordingIndicator').classList.add('hidden');
        }
    }

    function clearAudio() {
        audioBlob = null;
        document.getElementById('audioPlayer').src = '';
        document.getElementById('audioPreview').classList.add('hidden');

        // Si está grabando, detener
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            stopRecording();
        }
    }

    // GUARDAR CONCLUSIÓN
    document.getElementById('conclusionForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const mantenimientoId = document.getElementById('mantenimientoId').value;
        const conclusionText = document.getElementById('conclusionText').value;

        if (!conclusionText.trim() && !audioBlob) {
            alert('Por favor ingrese una conclusión por texto o audio');
            return;
        }

        const formData = new FormData();
        formData.append('mantenimiento_id', mantenimientoId);
        formData.append('conclusion', conclusionText);

        // SOLO SE AGREGA EL AUDIO SI EXISTE
        if (audioBlob) {
            formData.append('audio', audioBlob, 'conclusion-audio.wav');
        }

        try {
            const response = await fetch('/mecanico/guardar', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });

            if (response.ok) {
                alert('Conclusión guardada exitosamente');
                closeModal();
            } else {
                alert('Error al guardar la conclusión');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error al guardar la conclusión');
        }
    });


    // Cerrar modal al hacer clic fuera de él
    document.getElementById('detailModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Cerrar modal con tecla ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    // FILTRO
    function filterMaintenances() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const dateFrom = document.getElementById('dateFrom').value;
        const dateTo = document.getElementById('dateTo').value;

        const items = document.querySelectorAll('.maintenance-item');
        let visibleCount = 0;

        items.forEach(item => {
            const placa = item.dataset.placa;
            const modelo = item.dataset.modelo;
            const fecha = item.dataset.fecha;

            let matchesSearch = !searchTerm || placa.includes(searchTerm) || modelo.includes(searchTerm);
            let matchesDateFrom = !dateFrom || fecha >= dateFrom;
            let matchesDateTo = !dateTo || fecha <= dateTo;

            if (matchesSearch && matchesDateFrom && matchesDateTo) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        const noResults = document.getElementById('noResults');
        if (visibleCount === 0) noResults.classList.remove('hidden');
        else noResults.classList.add('hidden');
    }

    function clearFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('dateFrom').value = '';
        document.getElementById('dateTo').value = '';
        filterMaintenances();
    }

    document.getElementById('searchInput').addEventListener('input', filterMaintenances);
    document.getElementById('dateFrom').addEventListener('change', filterMaintenances);
    document.getElementById('dateTo').addEventListener('change', filterMaintenances);
</script>
@endsection