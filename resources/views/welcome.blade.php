<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MotoControl - Sistema de Gestión Integral</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-br from-slate-900 to-slate-800 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950 text-slate-100 min-h-screen">
        <!-- Header -->
        <header class="fixed w-full top-0 z-50 bg-slate-900/80 dark:bg-slate-950/80 backdrop-blur-lg border-b border-slate-700/50 dark:border-slate-800/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/30">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M11,6V12.4L16,15L16.8,13.8L12.5,11.6V6H11Z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold bg-gradient-to-r from-orange-500 to-orange-400 bg-clip-text text-transparent">MotoControl</span>
                    </div>

                    <!-- Navigation -->
                    @if (Route::has('login'))
                        <nav class="flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 text-sm font-medium text-slate-200 hover:text-white border border-slate-700 hover:border-orange-500 rounded-lg transition-all duration-300">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-medium text-slate-200 hover:text-white border border-transparent hover:border-slate-700 rounded-lg transition-all duration-300">
                                    Iniciar Sesión
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 rounded-lg shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 transition-all duration-300 hover:-translate-y-0.5">
                                        Registrarse
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold mb-6 bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 bg-clip-text text-transparent leading-tight">
                    Sistema Integral de Gestión para Motocicletas
                </h1>
                <p class="text-xl sm:text-2xl text-slate-300 dark:text-slate-400 max-w-3xl mx-auto mb-10 leading-relaxed">
                    Administra toda la información técnica y documental de tu motocicleta en un solo lugar. Mantenimientos, documentos legales, historial y mucho más.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('register') }}" class="px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 rounded-xl shadow-xl shadow-orange-500/30 hover:shadow-orange-500/50 transition-all duration-300 hover:-translate-y-1">
                        Comenzar Gratis
                    </a>
                    <a href="#features" class="px-8 py-4 text-lg font-semibold text-slate-200 hover:text-white border-2 border-slate-700 hover:border-orange-500 rounded-xl transition-all duration-300 hover:-translate-y-1">
                        Ver Características
                    </a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 px-4 sm:px-6 lg:px-8 bg-slate-800/50 dark:bg-slate-900/50">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Feature 1: Gestión Documental -->
                    <div class="group bg-slate-800/50 dark:bg-slate-900/50 backdrop-blur-sm border border-slate-700/50 dark:border-slate-800/50 hover:border-orange-500/50 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/20">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-orange-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Gestión Documental</h3>
                        <p class="text-slate-300 dark:text-slate-400 mb-4 leading-relaxed">Centraliza todos los documentos importantes de tu motocicleta</p>
                        <ul class="space-y-2">
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Tarjeta de propiedad</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>SOAT y seguros</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Revisión técnico-mecánica</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Multas y comparendos</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Feature 2: Control de Mantenimiento -->
                    <div class="group bg-slate-800/50 dark:bg-slate-900/50 backdrop-blur-sm border border-slate-700/50 dark:border-slate-800/50 hover:border-orange-500/50 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/20">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-orange-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Control de Mantenimiento</h3>
                        <p class="text-slate-300 dark:text-slate-400 mb-4 leading-relaxed">Lleva un registro detallado del mantenimiento de tu moto</p>
                        <ul class="space-y-2">
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Calendario de servicios</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Cambios de aceite y filtros</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Reemplazo de repuestos</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Alertas automáticas</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Feature 3: Historial Completo -->
                    <div class="group bg-slate-800/50 dark:bg-slate-900/50 backdrop-blur-sm border border-slate-700/50 dark:border-slate-800/50 hover:border-orange-500/50 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/20">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-orange-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Historial Completo</h3>
                        <p class="text-slate-300 dark:text-slate-400 mb-4 leading-relaxed">Accede al historial completo de tu motocicleta</p>
                        <ul class="space-y-2">
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Registro de reparaciones</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Gastos y costos</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Kilometraje histórico</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Exportar reportes</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Feature 4: Análisis y Estadísticas -->
                    <div class="group bg-slate-800/50 dark:bg-slate-900/50 backdrop-blur-sm border border-slate-700/50 dark:border-slate-800/50 hover:border-orange-500/50 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/20">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-orange-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Análisis y Estadísticas</h3>
                        <p class="text-slate-300 dark:text-slate-400 mb-4 leading-relaxed">Visualiza el rendimiento y costos de tu motocicleta</p>
                        <ul class="space-y-2">
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Consumo de combustible</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Costos operativos</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Rendimiento por km</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Gráficos interactivos</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Feature 5: Notificaciones Inteligentes -->
                    <div class="group bg-slate-800/50 dark:bg-slate-900/50 backdrop-blur-sm border border-slate-700/50 dark:border-slate-800/50 hover:border-orange-500/50 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/20">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-orange-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Notificaciones Inteligentes</h3>
                        <p class="text-slate-300 dark:text-slate-400 mb-4 leading-relaxed">Recibe alertas importantes sobre tu motocicleta</p>
                        <ul class="space-y-2">
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Vencimiento de documentos</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Próximos mantenimientos</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Recordatorios personalizados</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Email y notificaciones push</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Feature 6: Seguridad y Privacidad -->
                    <div class="group bg-slate-800/50 dark:bg-slate-900/50 backdrop-blur-sm border border-slate-700/50 dark:border-slate-800/50 hover:border-orange-500/50 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-orange-500/20">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-orange-500/30 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Seguridad y Privacidad</h3>
                        <p class="text-slate-300 dark:text-slate-400 mb-4 leading-relaxed">Tus datos están protegidos con la mejor tecnología</p>
                        <ul class="space-y-2">
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Cifrado de extremo a extremo</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Backup automático</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Acceso multi-dispositivo</span>
                            </li>
                            <li class="flex items-center text-slate-400 dark:text-slate-500">
                                <span class="text-orange-500 font-bold mr-3">✓</span>
                                <span>Control de privacidad</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                <div class="relative bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-12 overflow-hidden shadow-2xl">
                    <!-- Pattern overlay -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.5) 35px, rgba(255,255,255,.5) 70px);"></div>
                    </div>
                    
                    <div class="relative z-10 text-center">
                        <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">¿Listo para gestionar tu motocicleta?</h2>
                        <p class="text-xl text-white/90 mb-8">Únete a miles de motociclistas que ya confían en MotoControl</p>
                        <a href="{{ route('register') }}" class="inline-block px-10 py-4 text-lg font-bold text-orange-600 bg-white hover:bg-slate-100 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                            Crear Cuenta Gratis
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-8 px-4 border-t border-slate-700/50 dark:border-slate-800/50">
            <div class="max-w-7xl mx-auto text-center">
                <p class="text-slate-400 dark:text-slate-500">&copy; {{ date('Y') }} MotoControl. Todos los derechos reservados. | Sistema de Gestión Integral para Motocicletas</p>
            </div>
        </footer>

    </body>
</html>