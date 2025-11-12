@extends('layouts.app')
@section('title', 'Registrar Vehículo')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-100 via-white to-gray-100 dark:from-gray-900 dark:via-gray-950 dark:to-gray-900 py-12 px-4 transition-colors duration-300">
    <div
        class="max-w-5xl mx-auto bg-white/90 dark:bg-gray-800/80 backdrop-blur-lg shadow-2xl rounded-3xl p-10 transition-all duration-300 hover:scale-[1.01]">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100 tracking-tight">Registrar Vehículo</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Completa la información del nuevo vehículo para añadirlo al sistema.</p>
            </div>
            <div class="flex items-center justify-center bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 p-3 rounded-full shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m2 0a2 2 0 012 2v4a2 2 0 01-2 2h-2v-2a2 2 0 00-2-2H9a2 2 0 00-2 2v2H5a2 2 0 01-2-2v-4a2 2 0 012-2m0 0a2 2 0 012-2h10a2 2 0 012 2" />
                </svg>
            </div>
        </div>

        <!-- Success message -->
        @if (session('success'))
        <div
            class="flex items-center p-4 mb-6 text-green-800 dark:text-green-100 bg-green-100 dark:bg-green-800/60 border border-green-300 dark:border-green-700 rounded-xl shadow-sm transition">
            <svg class="w-5 h-5 mr-2 text-green-600 dark:text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('vehiculos.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- Panel Información Básica -->
                <div class="bg-gray-50 dark:bg-gray-700/50 p-6 rounded-2xl shadow-inner space-y-6 transition-colors duration-300">
                    <h3 class="text-xl font-bold text-gray-700 dark:text-gray-100 mb-4">Información Básica</h3>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200 mb-1">Nombre del Vehículo</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            placeholder="Ej: Yamaha MT-09">
                        @error('nombre') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block font-medium text-gray-700 dark:text-gray-200 mb-1">Marca</label>
                            <select name="marca_id"
                                class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Seleccione marca...</option>
                                @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                @endforeach
                            </select>
                            @error('marca_id') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700 dark:text-gray-200 mb-1">Línea Comercial</label>
                            <select name="linea_id"
                                class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Seleccione línea...</option>
                                @foreach($lineas as $linea)
                                <option value="{{ $linea->id }}">{{ $linea->nombre }}</option>
                                @endforeach
                            </select>
                            @error('linea_id') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block font-medium text-gray-700 dark:text-gray-200 mb-1">Color</label>
                            <select name="color_id"
                                class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Seleccione color...</option>
                                @foreach($colores as $color)
                                <option value="{{ $color->id }}">{{ $color->nombre }}</option>
                                @endforeach
                            </select>
                            @error('color_id') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700 dark:text-gray-200 mb-1">Tipo</label>
                            <select name="tipo_id"
                                class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Seleccione tipo...</option>
                                @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                            @error('tipo_id') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div>
                            <label class="block font-medium text-gray-700 dark:text-gray-200 mb-1">Cilindraje (cc)</label>
                            <input type="number" name="cilindraje" value="{{ old('cilindraje') }}"
                                class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('cilindraje') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700 dark:text-gray-200 mb-1">Modelo</label>
                            <input type="number" name="modelo" value="{{ old('modelo') }}"
                                class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('modelo') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700 dark:text-gray-200 mb-1">Combustible</label>
                            <input type="text" name="combustible" value="{{ old('combustible') }}"
                                class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Ej: Gasolina, Diesel...">
                            @error('combustible') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block font-medium text-gray-700 dark:text-gray-200 mb-1">Número de Pasajeros</label>
                            <input type="number" name="numeropasajero" value="{{ old('numeropasajero') }}"
                                class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('numeropasajero') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700 dark:text-gray-200 mb-1">Placa</label>
                            <input type="text" name="placa" value="{{ old('placa') }}"
                                class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-xl px-4 py-2.5 uppercase focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Ej: ABC123">
                            @error('placa') <small class="text-red-500">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

            </div>

            <!-- Submit button -->
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3 rounded-xl font-semibold shadow-md hover:shadow-lg hover:from-blue-700 hover:to-indigo-700 transform hover:-translate-y-0.5 transition-all">
                    Guardar Vehículo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection