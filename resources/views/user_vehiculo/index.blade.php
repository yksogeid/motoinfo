@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4">

    <h1 class="text-3xl font-bold text-gray-700 mb-6">Mis Vehículos</h1>

    {{-- Mostrar ID o nombre del usuario --}}
    <h3 class="text-gray-500 mb-8">Usuario ID: {{ $userLogueado->id }} — {{ $userLogueado->name ?? '' }}</h3>

    {{-- Verificar si tiene vehículos --}}
    @if($userVehiculos->isEmpty())
        <div class="text-center bg-white shadow-md rounded-lg p-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">No tienes vehículos registrados 🚗</h2>
            <p class="text-gray-500 mb-6">Agrega tu primer vehículo para empezar a gestionarlo.</p>
            <a href="{{ route('user.vehiculos.store') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
               Registrar Vehículo
            </a>
        </div>
    @else
        {{-- Grid de tarjetas --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($userVehiculos as $rel)
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-5">
                        
                        <p class="text-gray-600 mb-1">
                            <span class="font-semibold">Placa:</span> {{ $rel->vehiculo->placa ?? 'N/A' }}
                        </p>
                        <p class="text-gray-600 mb-1">
                            <span class="font-semibold">Modelo:</span> {{ $rel->vehiculo->modelo ?? 'N/A' }}
                        </p>
                        <p class="text-gray-600 mb-3">
                            <span class="font-semibold">Color:</span> {{ $rel->vehiculo->color->nombre ?? 'N/A' }}
                        </p>

                        {{-- Estado --}}
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-medium 
                            {{ $rel->estado ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $rel->estado ? 'Activo' : 'Inactivo' }}
                        </span>
                    </div>

                    {{-- Acciones --}}
                    <div class="bg-gray-50 px-5 py-3 flex justify-between">
                        {{-- Cambiar estado --}}
                        <form action="{{ route('user.vehiculos.update', $rel->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="estado" value="{{ $rel->estado ? 0 : 1 }}">
                            <button class="text-yellow-600 hover:text-yellow-800 font-semibold">
                                {{ $rel->estado ? 'Desactivar' : 'Activar' }}
                            </button>
                        </form>

                        {{-- Eliminar --}}
                        <form action="{{ route('user.vehiculos.destroy', $rel->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este vehículo?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800 font-semibold">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
