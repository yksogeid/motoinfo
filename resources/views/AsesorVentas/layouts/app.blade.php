{{-- resources/views/asesorVentas/layouts/app.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen py-16 px-8 relative overflow-hidden animate-fadeIn">

    {{-- Fondo --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-gray-100 via-white to-gray-200 
                dark:from-gray-900 dark:via-gray-800 dark:to-black"></div>

    {{-- Contenedor dinámico para vistas internas --}}
    <div class="max-w-7xl mx-auto">
        @yield('asesor-content')
    </div>

</div>

{{-- Icons library --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script> lucide.createIcons(); </script>
@endsection
