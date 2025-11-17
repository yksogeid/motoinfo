<nav
    x-data="{ open: false }"
    class="sticky top-0 z-50 backdrop-blur-lg border-b shadow-sm transition-all duration-300
           bg-white/70 border-gray-200 dark:bg-gray-900/80 dark:border-gray-800">

    <!-- Primary Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Left section -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}"
                    class="flex items-center space-x-2 group select-none">

                    <!-- Ícono SVG del logo -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8 text-blue-600 group-hover:text-orange-500 transition-colors"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <!-- Silueta moto simplificada -->
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 16a4 4 0 118 0m6-2a4 4 0 110 8m-3-6h3m-6-8l-4 8h2l3-6h4l1 2h3" />
                    </svg>

                    <!-- Texto del logo -->
                    <div class="flex flex-col leading-tight">
                        <span class="text-xl font-extrabold text-gray-900 dark:text-white tracking-tight">
                            MOTO<span class="text-orange-500">INFO</span>
                        </span>
                        <span class="text-[0.7rem] uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            Gestiona tu motocicleta
                        </span>
                    </div>
                </a>

                <!-- Links -->
                <div class="hidden sm:flex space-x-6">
                    @role('admin')
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="dark:text-gray-200">
                        {{ __('Panel Admin') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.index')" class="dark:text-gray-200">
                        {{ __('Gestionar Roles') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.validardocumentos')" :active="request()->routeIs('admin.validardocumentos')" class="dark:text-gray-200">
                        {{ __('Validar Documentos') }}
                    </x-nav-link>
                    @endrole
                    @role('editor')
                    <x-nav-link :href="route('editor.dashboard')" :active="request()->routeIs('editor.dashboard')" class="dark:text-gray-200">
                        {{ __('Panel Editor') }}
                    </x-nav-link>
                    @endrole
                    @role('user')
                    <x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')" class="dark:text-gray-200">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    @endrole
                     @role('mecanico')
                    <x-nav-link :href="route('mecanico.dashboard')" :active="request()->routeIs('user.dashboard')" class="dark:text-gray-200">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('mecanico.misMantenimientos')" :active="request()->routeIs('mecanico.misMantenimientos')" class="dark:text-gray-200">
                        {{ __('Realizados') }}
                    </x-nav-link>
                    <x-nav-link :href="route('mecanico.mantenimientosPorRealizar')" :active="request()->routeIs('mecanico.mantenimientosPorRealizar')" class="dark:text-gray-200">
                        {{ __('Por realizar') }}
                    </x-nav-link>
                    @endrole
                </div>
            </div>

            <!-- Right section -->
            <div class="hidden sm:flex items-center space-x-4">
                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium 
                                   text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800
                                   focus:ring-2 focus:ring-blue-500 transition-all duration-150">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random"
                                alt="Avatar" class="h-8 w-8 rounded-full ring-2 ring-gray-300 dark:ring-gray-700">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Rol del usuario -->
@php
    // Detectar el rol activo desde la sesión o cargar el primero asignado
    $currentRole = session('selected_role') ?? Auth::user()->roles()->first()->name;

    // Valores estéticos (colores por rol)
    $roleStyles = [
        'admin'        => ['bg' => 'bg-red-100 dark:bg-red-900/40', 'text' => 'text-red-700 dark:text-red-300'],
        'mecanico'     => ['bg' => 'bg-blue-100 dark:bg-blue-900/40', 'text' => 'text-blue-700 dark:text-blue-300'],
        'editor'       => ['bg' => 'bg-yellow-100 dark:bg-yellow-900/40', 'text' => 'text-yellow-700 dark:text-yellow-300'],
        'asesorVentas' => ['bg' => 'bg-purple-100 dark:bg-purple-900/40', 'text' => 'text-purple-700 dark:text-purple-300'],
        'user'         => ['bg' => 'bg-green-100 dark:bg-green-900/40', 'text' => 'text-green-700 dark:text-green-300'],
    ];

    $style = $roleStyles[$currentRole] ?? $roleStyles['user'];
@endphp


<div class="px-4 py-2 text-xs text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">
    Rol:
    <span class="ml-1 px-2 py-0.5 rounded text-[11px] font-medium {{ $style['bg'] }} {{ $style['text'] }}">
        {{ ucfirst($currentRole) }}
    </span>
</div>


                        <!-- Enlace Perfil -->
                        <x-dropdown-link
                            :href="route('profile.edit')"
                            class="flex items-center dark:hover:bg-gray-800 hover:bg-gray-100 transition-all duration-200">
                            <i class="fa-regular fa-user mr-2 text-gray-400 dark:text-gray-500 group-hover:text-gray-600 dark:group-hover:text-gray-300 transition"></i>
                            Perfil
                        </x-dropdown-link>

                        <!-- Cerrar sesión -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center dark:hover:bg-gray-800 hover:bg-gray-100 transition-all duration-200">
                                <i class="fa-solid fa-right-from-bracket mr-2 text-gray-400 dark:text-gray-500 group-hover:text-gray-600 dark:group-hover:text-gray-300 transition"></i>
                                Cerrar sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>

                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="sm:hidden">
                <button @click="open = ! open"
                    class="p-2 rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/95 shadow-lg transition-all duration-300">

        <div class="px-4 pt-4 pb-3 space-y-3">
            @role('admin')
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="dark:text-gray-200">
                {{ __('Panel Admin') }}
            </x-responsive-nav-link>
            @endrole
            @role('editor')
            <x-responsive-nav-link :href="route('editor.dashboard')" :active="request()->routeIs('editor.dashboard')" class="dark:text-gray-200">
                {{ __('Panel Editor') }}
            </x-responsive-nav-link>
            @endrole
            @role('user')
            <x-responsive-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')" class="dark:text-gray-200">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            @endrole
        </div>

        <!-- Responsive User -->
        <div class="border-t border-gray-200 dark:border-gray-800 py-3 px-4 space-y-2 bg-gray-50 dark:bg-gray-800/70">
            <div class="flex items-center space-x-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random"
                    class="h-9 w-9 rounded-full ring-2 ring-gray-300 dark:ring-gray-700">
                <div>
                    <p class="font-semibold text-gray-800 dark:text-gray-100">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <x-responsive-nav-link :href="route('profile.edit')" class="dark:text-gray-200">
                {{ __('Perfil') }}
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="dark:text-gray-200">
                    {{ __('Cerrar sesión') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>