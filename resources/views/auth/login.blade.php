<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - MotoControl</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-800 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            
            <!-- Logo y Header -->
            <div class="text-center">
                <div class="flex justify-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-xl shadow-orange-500/30">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M11,6V12.4L16,15L16.8,13.8L12.5,11.6V6H11Z"/>
                        </svg>
                    </div>
                </div>
                <h2 class="mt-6 text-4xl font-bold bg-gradient-to-r from-orange-400 to-orange-600 bg-clip-text text-transparent">
                    MotoControl
                </h2>
                <p class="mt-2 text-lg text-slate-300 dark:text-slate-400">
                    Inicia sesión en tu cuenta
                </p>
            </div>

            <!-- Formulario -->
            <div class="bg-slate-800/50 dark:bg-slate-900/50 backdrop-blur-sm border border-slate-700/50 dark:border-slate-800/50 rounded-2xl shadow-2xl p-8">
                
                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-200 dark:text-slate-300 mb-2">
                            Correo Electrónico
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required 
                                autofocus 
                                autocomplete="username"
                                class="block w-full pl-10 pr-3 py-3 bg-slate-700/50 dark:bg-slate-800/50 border border-slate-600 dark:border-slate-700 text-slate-100 placeholder-slate-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300"
                                placeholder="tu@email.com"
                            />
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-200 dark:text-slate-300 mb-2">
                            Contraseña
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input 
                                id="password" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="current-password"
                                class="block w-full pl-10 pr-3 py-3 bg-slate-700/50 dark:bg-slate-800/50 border border-slate-600 dark:border-slate-700 text-slate-100 placeholder-slate-400 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300"
                                placeholder="••••••••"
                            />
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me y Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center group cursor-pointer">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                name="remember"
                                class="w-4 h-4 rounded border-slate-600 bg-slate-700/50 text-orange-500 focus:ring-2 focus:ring-orange-500 focus:ring-offset-0 transition-all duration-300"
                            >
                            <span class="ml-2 text-sm text-slate-300 dark:text-slate-400 group-hover:text-slate-200 transition-colors duration-300">
                                Recordarme
                            </span>
                        </label>

                        @if (Route::has('password.request'))
                            <a 
                                href="{{ route('password.request') }}" 
                                class="text-sm font-medium text-orange-400 hover:text-orange-300 transition-colors duration-300"
                            >
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit"
                            class="w-full flex justify-center items-center px-6 py-3 text-base font-semibold text-white bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 rounded-xl shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-slate-900 transition-all duration-300 hover:-translate-y-0.5"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Iniciar Sesión
                        </button>
                    </div>

                    <!-- Register Link -->
                    @if (Route::has('register'))
                        <div class="text-center pt-4 border-t border-slate-700/50 dark:border-slate-800/50">
                            <p class="text-sm text-slate-400 dark:text-slate-500">
                                ¿No tienes una cuenta?
                                <a 
                                    href="{{ route('register') }}" 
                                    class="font-semibold text-orange-400 hover:text-orange-300 transition-colors duration-300 ml-1"
                                >
                                    Regístrate aquí
                                </a>
                            </p>
                        </div>
                    @endif

                </form>
            </div>

            <!-- Back to Home -->
            <div class="text-center">
                <a 
                    href="{{ url('/') }}" 
                    class="inline-flex items-center text-sm font-medium text-slate-400 hover:text-slate-300 transition-colors duration-300"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Volver al inicio
                </a>
            </div>

        </div>
    </div>
</body>
</html>