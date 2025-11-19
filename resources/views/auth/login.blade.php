<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - MotoInfo</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInUp .6s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0)
            }
        }
    </style>
</head>

<body class="h-full antialiased bg-gray-50 dark:bg-gray-950 transition-colors duration-500">

    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 relative overflow-hidden">

        <!-- Fondo degradado -->
        <div class="absolute inset-0 bg-gradient-to-br 
            from-gray-200 via-gray-100 to-white 
            dark:from-gray-900 dark:via-gray-800 dark:to-black">
        </div>

        <!-- Elementos decorativos -->
        <div class="absolute w-80 h-80 bg-orange-500/20 dark:bg-orange-600/20 blur-[150px] rounded-full -top-32 -left-20"></div>
        <div class="absolute w-80 h-80 bg-blue-500/20 dark:bg-blue-600/20 blur-[150px] rounded-full -bottom-32 -right-20"></div>

        <div class="relative w-full max-w-md space-y-8 fade-in">

            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center space-x-2 group">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-10 w-10 text-orange-600 dark:text-orange-500 group-hover:scale-110 transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 16a4 4 0 118 0m6-2a4 4 0 110 8m-3-6h3m-6-8l-4 8h2l3-6h4l1 2h3" />
                    </svg>
                    <div class="flex flex-col">
                        <span class="text-3xl font-extrabold text-gray-900 dark:text-white">
                            MOTO<span class="text-orange-600 dark:text-orange-500">INFO</span>
                        </span>
                        <small class="text-xs tracking-wide text-gray-500 dark:text-gray-400 uppercase">
                            Gestión inteligente de motocicletas
                        </small>
                    </div>
                </a>
            </div>

            <!-- Formulario -->
            <div class="backdrop-blur-xl bg-white/60 dark:bg-white/5 
                border border-gray-200 dark:border-white/10 
                rounded-2xl p-8 shadow-xl transition-all duration-500">

                @if (session('status'))
                <div class="mb-4 text-green-500 dark:text-green-400 text-sm">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Correo electrónico</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="block w-full pl-10 pr-3 py-3
           bg-slate-100 dark:bg-slate-800
           border border-slate-300 dark:border-slate-700
           text-gray-900 dark:text-gray-100
           placeholder-gray-500 dark:placeholder-gray-400
           tracking-widest
           caret-orange-500
           rounded-xl
           focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent
           transition-all duration-300"
                            placeholder="usuario@motoinfo.com">
                    </div>

                    <!-- Password -->
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="block w-full pl-10 pr-3 py-3
           bg-slate-100 dark:bg-slate-800
           border border-slate-300 dark:border-slate-700
           text-gray-900 dark:text-gray-100
           placeholder-gray-500 dark:placeholder-gray-400
           tracking-widest
           caret-orange-500
           rounded-xl
           focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent
           transition-all duration-300"
                        placeholder="••••••••" />


                    <!-- Opciones -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center space-x-2 text-gray-600 dark:text-gray-400 cursor-pointer">
                            <input type="checkbox" name="remember" class="accent-orange-500 w-4 h-4">
                            <span>Recordarme</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-orange-600 hover:underline hover:text-orange-700 
                                      dark:text-orange-400 dark:hover:text-orange-300">
                            ¿Olvidaste tu contraseña?
                        </a>
                        @endif
                    </div>

                    <!-- Botón -->
                    <button type="submit"
                        class="w-full px-6 py-3 rounded-xl font-semibold text-lg text-white
                               bg-gradient-to-r from-orange-500 to-orange-600
                               hover:from-orange-600 hover:to-orange-700
                               shadow-lg hover:shadow-orange-500/40 
                               transform transition-all duration-300 hover:-translate-y-0.5">
                        Acceder
                    </button>

                </form>

                @if (Route::has('register'))
                <div class="text-center pt-4">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        ¿No tienes cuenta?
                        <a href="{{ route('register') }}"
                            class="text-orange-600 hover:underline hover:text-orange-700
                                      dark:text-orange-400 dark:hover:text-orange-300">
                            Regístrate
                        </a>
                    </p>
                </div>
                @endif
            </div>

            <!-- Volver -->
            <div class="text-center">
                <a href="{{ url('/') }}"
                    class="text-sm text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition">
                    ← Volver al inicio
                </a>
            </div>
        </div>
    </div>

</body>

</html>