@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-8 text-gray-900 dark:text-gray-100">
    {{-- Encabezado --}}
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 7h18M3 12h18M3 17h18" />
            </svg>
            Gestión de Roles
        </h1>
        <a href="{{ route('admin.roles.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm transition">
            ➕ Nuevo Rol
        </a>
    </div>

    {{-- Tabla de roles --}}
    <div class="bg-white dark:bg-gray-900 shadow-lg rounded-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">Permisos</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @foreach ($roles as $role)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ $role->id }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-gray-100">{{ $role->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                            @if($role->permissions->count() > 0)
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($role->permissions as $perm)
                                        <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 rounded text-xs">{{ $perm->name }}</span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-400 italic">Sin permisos</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right text-sm flex justify-end gap-2">
                            {{-- Botón Usuarios --}}
                            <a href="{{ route('admin.roles.users.index', $role->id) }}"
                               class="inline-flex items-center px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold rounded-lg transition">
                                👥 Usuarios
                            </a>

                            {{-- Botón Editar --}}
                            <a href="{{ route('admin.roles.edit', $role->id) }}"
                               class="inline-flex items-center px-3 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-semibold rounded-lg transition">
                                ✏️ Editar
                            </a>

                            {{-- Botón Eliminar (SweetAlert2) --}}
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="inline delete-role-form">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                        class="delete-role-btn inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-lg transition"
                                        data-role-name="{{ $role->name }}">
                                    🗑 Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($roles->isEmpty())
            <p class="p-6 text-center text-gray-500 dark:text-gray-400">No hay roles registrados aún.</p>
        @endif
    </div>
</div>

{{-- Script de SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete-role-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const form = button.closest('.delete-role-form');
            const roleName = button.dataset.roleName;

            Swal.fire({
                title: `¿Eliminar el rol "${roleName}"?`,
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e02424',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#fff',
                color: document.documentElement.classList.contains('dark') ? '#f3f4f6' : '#111827',
                iconColor: '#facc15'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection
