<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Bienvenido, Administrador!</h3>
                    <p class="mb-4">Tienes acceso completo al sistema.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                        <div class="bg-blue-100 p-6 rounded-lg">
                            <h4 class="font-bold text-lg mb-2">Gestión de Usuarios</h4>
                            <p class="text-sm">Administra todos los usuarios del sistema</p>
                        </div>
                        <div class="bg-green-100 p-6 rounded-lg">
                            <h4 class="font-bold text-lg mb-2">Contenido</h4>
                            <p class="text-sm">Crear, editar y eliminar contenido</p>
                        </div>
                        <div class="bg-purple-100 p-6 rounded-lg">
                            <h4 class="font-bold text-lg mb-2">Configuración</h4>
                            <p class="text-sm">Ajustes generales del sistema</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>