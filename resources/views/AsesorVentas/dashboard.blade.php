@extends('layouts.app')
@section('title','Asesor de Ventas - Dashboard')


@section('content')
<div class="min-h-screen py-16 px-8 relative overflow-hidden">
<div class="absolute inset-0 -z-10 bg-gradient-to-br from-gray-100 via-white to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-black"></div>


<div class="text-center mb-14">
<h1 class="text-5xl font-extrabold text-gray-900 dark:text-white mb-3 tracking-tight">
Bienvenido, {{ Auth::user()->name }}
</h1>
<p class="text-gray-600 dark:text-gray-400 text-lg max-w-2xl mx-auto">
Panel principal del asesor de ventas. Gestiona mecánicos, mantenimientos y repuestos.
</p>
</div>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 max-w-6xl mx-auto">


<!-- Mecánicos -->
<a href="{{ route('asesor.mecanicos.index') }}" class="group block">
<div class="relative rounded-3xl overflow-hidden bg-white/80 dark:bg-gray-900/70 border border-gray-200 dark:border-gray-700 p-8 shadow-lg hover:shadow-xl transition-all">
<div class="text-center">
<div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center rounded-2xl bg-blue-500/10 dark:bg-blue-400/20">
<i data-lucide="users" class="w-8 h-8 text-blue-600 dark:text-blue-400"></i>
</div>
<h2 class="text-5xl font-bold text-gray-900 dark:text-white">{{ $mecanicosCount }}</h2>
<p class="text-gray-700 dark:text-gray-400 mt-2">Mecánicos registrados</p>
</div>
</div>
</a>


<!-- Mantenimientos -->
<a href="{{ route('asesor.mantenimientos.index') }}" class="group block">
<div class="relative rounded-3xl overflow-hidden bg-white/80 dark:bg-gray-900/70 border border-gray-200 dark:border-gray-700 p-8 shadow-lg hover:shadow-xl transition-all">
<div class="text-center">
<div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center rounded-2xl bg-green-500/10 dark:bg-green-400/20">
<i data-lucide="wrench" class="w-8 h-8 text-green-600 dark:text-green-400"></i>
</div>
<h2 class="text-5xl font-bold text-gray-900 dark:text-white">{{ $mantenimientosCount }}</h2>
<p class="text-gray-700 dark:text-gray-400 mt-2">Mantenimientos registrados</p>
</div>
</div>
</a>


<!-- Repuestos -->
<a href="{{ route('asesor.repuestos.index') }}" class="group block">
<div class="relative rounded-3xl overflow-hidden bg-white/80 dark:bg-gray-900/70 border border-gray-200 dark:border-gray-700 p-8 shadow-lg hover:shadow-xl transition-all">
<div class="text-center">
<div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center rounded-2xl bg-purple-500/10 dark:bg-purple-400/20">
<i data-lucide="package" class="w-8 h-8 text-purple-600 dark:text-purple-400"></i>
</div>
<h2 class="text-5xl font-bold text-gray-900 dark:text-white">{{ $repuestosCount }}</h2>
<p class="text-gray-700 dark:text-gray-400 mt-2">Repuestos disponibles</p>
</div>
</div>
</a>


</div>
</div>


<script src="https://unpkg.com/lucide@latest"></script>
<script> lucide.createIcons(); </script>
@endsection