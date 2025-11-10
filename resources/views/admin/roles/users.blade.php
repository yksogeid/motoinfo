@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8 text-gray-900 dark:text-gray-100">
    {{-- Título --}}
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold flex items-center gap-2">
            👥 Usuarios del Rol: 
            <span class="text-blue-600 dark:text-blue-400">{{ $role->name }}</span>
        </h1>
        <a href="{{ route('admin.roles.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-semibold rounded-lg transition">
            ⬅ Volver
        </a>
    </div>

    {{-- Mensaje --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario para agregar usuario --}}
    <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-6 mb-8 border border-gray-100 dark:border-gray-700">
        <form method="POST" action="{{ route('admin.roles.users.attach', $role) }}" class="flex flex-col md:flex-row items-center gap-4">
            @csrf
            <div class="flex-1 w-full">
                <label class="block text-sm font-medium mb-2">Agregar usuario al rol</label>
                <select name="user_id"
                        class="w-full border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Seleccione un usuario...</option>
                    @foreach($availableUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm transition">
                ➕ Asignar
            </button>
        </form>
    </div>

    {{-- Lista de usuarios --}}
    <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-6 border border-gray-100 dark:border-gray-700">
        <h2 class="text-lg font-semibold mb-4">Usuarios con este rol</h2>
        @if($users->isEmpty())
            <p class="text-gray-600 dark:text-gray-400">No hay usuarios con este rol actualmente.</p>
        @else
            <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                        <tr>
                            <th class="py-2 px-3 text-left">Nombre</th>
                            <th class="py-2 px-3 text-left">Correo</th>
                            <th class="py-2 px-3 text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                <td class="py-2 px-3">{{ $user->name }}</td>
                                <td class="py-2 px-3">{{ $user->email }}</td>
                                <td class="py-2 px-3 text-center">
                                    <form action="{{ route('admin.roles.users.detach', [$role, $user]) }}" method="POST"
                                          onsubmit="return confirm('¿Quitar este usuario del rol?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 font-medium transition">
                                            ✖ Quitar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
