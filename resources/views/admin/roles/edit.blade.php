@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-8">
    {{-- Título --}}
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-500 dark:text-yellow-400" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 17l-5-5m0 0l5-5m-5 5h12" />
            </svg>
            Editar Rol
        </h1>
        <a href="{{ route('admin.roles.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700 text-sm font-semibold rounded-lg transition">
            ⬅ Volver
        </a>
    </div>

    {{-- Tarjeta de edición --}}
    <div class="bg-white dark:bg-gray-900 shadow-lg rounded-xl p-8 border border-gray-100 dark:border-gray-700">
        <form method="POST" action="{{ route('admin.roles.update', $role) }}" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Nombre del rol --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nombre del rol</label>
                <input type="text" id="name" name="name"
                       class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:border-yellow-500 focus:ring focus:ring-yellow-200 dark:focus:ring-yellow-700"
                       value="{{ old('name', $role->name) }}" required>
                @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Permisos --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Permisos asignados</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach($permissions as $perm)
                        <label class="flex items-center space-x-2 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <input type="checkbox" name="permissions[]" value="{{ $perm->id }}"
                                   class="rounded text-yellow-500 focus:ring-yellow-400 dark:focus:ring-yellow-600"
                                   {{ in_array($perm->id, $rolePermissions) ? 'checked' : '' }}>
                            <span class="text-gray-700 dark:text-gray-200 text-sm font-medium">{{ $perm->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('permissions')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.roles.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 text-sm font-semibold rounded-lg transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded-lg shadow-sm transition">
                    🔄 Actualizar Rol
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
