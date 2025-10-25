<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <!-- Left section -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 group">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-9 w-auto transition-transform group-hover:scale-105">
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-6">
                    @role('admin')
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Panel Admin') }}
                        </x-nav-link>
                    @endrole
                    @role('editor')
                        <x-nav-link :href="route('editor.dashboard')" :active="request()->routeIs('editor.dashboard')">
                            {{ __('Panel Editor') }}
                        </x-nav-link>
                    @endrole
                    @role('user')
                        <x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                            {{ __('Inicio') }}
                        </x-nav-link>
                    @endrole
                </div>
            </div>

            <!-- Right section -->
            <div class="hidden sm:flex items-center space-x-4">
                <!-- User Info Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100 focus:ring-2 focus:ring-indigo-500 transition-all duration-150">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" 
                                 alt="Avatar" class="h-8 w-8 rounded-full">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 text-xs text-gray-500 border-b">
                            Rol:
                            @if(Auth::user()->hasRole('admin'))
                                <span class="ml-1 px-2 py-0.5 bg-red-100 text-red-700 rounded text-[11px] font-medium">Admin</span>
                            @elseif(Auth::user()->hasRole('editor'))
                                <span class="ml-1 px-2 py-0.5 bg-blue-100 text-blue-700 rounded text-[11px] font-medium">Editor</span>
                            @else
                                <span class="ml-1 px-2 py-0.5 bg-green-100 text-green-700 rounded text-[11px] font-medium">Usuario</span>
                            @endif
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fa-regular fa-user mr-2 text-gray-400"></i> Perfil
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket mr-2 text-gray-400"></i> Cerrar sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="sm:hidden">
                <button @click="open = ! open"
                    class="p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-gray-200 bg-white">
        <div class="px-4 pt-4 pb-3 space-y-3">
            @role('admin')
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Panel Admin') }}
                </x-responsive-nav-link>
            @endrole
            @role('editor')
                <x-responsive-nav-link :href="route('editor.dashboard')" :active="request()->routeIs('editor.dashboard')">
                    {{ __('Panel Editor') }}
                </x-responsive-nav-link>
            @endrole
            @role('user')
                <x-responsive-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                    {{ __('Inicio') }}
                </x-responsive-nav-link>
            @endrole
        </div>

        <!-- Responsive User Info -->
        <div class="border-t border-gray-200 py-3 px-4 space-y-2 bg-gray-50">
            <div class="flex items-center space-x-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random"
                    class="h-9 w-9 rounded-full">
                <div>
                    <p class="font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Perfil') }}
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Cerrar sesión') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
