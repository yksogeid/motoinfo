@extends('layouts.app')
@section('title', 'Mecanico - Mantenimientos Realizados')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                <i data-lucide="clipboard-check" class="w-8 h-8 text-emerald-600"></i>
                Historial de Mantenimientos
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Revisa todos los mantenimientos completados y su información detallada
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

                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <i data-lucide="car" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">{{ $item->vehiculo->placa ?? 'N/A' }}</h3>
                                <p class="text-xs text-emerald-100">{{ $item->vehiculo->modelo ?? 'Sin modelo' }}</p>
                            </div>
                        </div>
                        <i data-lucide="check-circle" class="w-6 h-6 text-white"></i>
                    </div>
                </div>

                <div class="p-6 space-y-4">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-2">Observaciones</p>
                        <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-2">
                            {{ blank($item->observacion) ? 'Sin observación' : $item->observacion }}
                        </p>
                    </div>

                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i data-lucide="calendar-check" class="w-4 h-4"></i>
                        <span>{{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : 'Sin fecha' }}</span>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                        <a href="{{ url('mantenimiento/'.$item->id) }}"
                            class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg transition-colors">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                            Ver Detalles
                        </a>
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
                No hay mantenimientos completados
            </h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-lg mx-auto">
                Los mantenimientos completados aparecerán aquí para su revisión y seguimiento.
            </p>
        </div>

        @endif

    </div>
</div>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();

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