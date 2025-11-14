<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MotoInfo — Plataforma Profesional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900" rel="stylesheet" />
    <style>
        * { font-family: 'Inter', sans-serif; }
        .gradient-mesh {
            background: 
                radial-gradient(at 0% 0%, rgba(249, 115, 22, 0.1) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(59, 130, 246, 0.1) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(249, 115, 22, 0.1) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(59, 130, 246, 0.1) 0px, transparent 50%);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
        }
    </style>
</head>
<body class="bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-50 antialiased">

    <!-- NAVBAR -->
    <header class="fixed top-0 w-full z-50 bg-white/70 dark:bg-slate-950/70 backdrop-blur-2xl border-b border-slate-200/50 dark:border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- LOGO -->
                <a href="/"
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

                <!-- NAVIGATION -->
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="#funciones" class="px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-orange-600 dark:hover:text-orange-500 hover:bg-slate-100 dark:hover:bg-slate-900 rounded-lg transition-all">Funciones</a>
                    <a href="#beneficios" class="px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-orange-600 dark:hover:text-orange-500 hover:bg-slate-100 dark:hover:bg-slate-900 rounded-lg transition-all">Beneficios</a>
                    <a href="#planes" class="px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-orange-600 dark:hover:text-orange-500 hover:bg-slate-100 dark:hover:bg-slate-900 rounded-lg transition-all">Planes</a>
                </nav>

                <!-- AUTH BUTTONS -->
                <div class="flex items-center space-x-3">
                    <a href="login" class="px-5 py-2.5 text-sm font-semibold text-slate-700 dark:text-slate-300 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Ingresar</a>
                    <a href="register" class="px-6 py-2.5 bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-700 hover:to-orange-600 text-white text-sm font-semibold rounded-xl shadow-lg shadow-orange-500/25 hover:shadow-xl hover:shadow-orange-500/30 transition-all duration-300">Registrarse</a>
                </div>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="relative pt-32 pb-20 sm:pt-40 sm:pb-28 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 gradient-mesh"></div>
        <div class="absolute top-1/4 left-10 w-72 h-72 bg-orange-500/10 dark:bg-orange-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-10 w-96 h-96 bg-blue-500/10 dark:bg-blue-500/5 rounded-full blur-3xl"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Badge -->
                <div class="inline-flex items-center space-x-2 bg-orange-50 dark:bg-orange-950/30 border border-orange-200 dark:border-orange-900/50 rounded-full px-4 py-1.5 mb-8">
                    <span class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></span>
                    <span class="text-xs font-semibold text-orange-700 dark:text-orange-400 uppercase tracking-wider">Plataforma Profesional</span>
                </div>

                <!-- Main Heading -->
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black leading-tight mb-6">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 dark:from-slate-50 dark:via-slate-200 dark:to-slate-50">
                        Tu Moto, Siempre
                    </span>
                    <br/>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-600 via-orange-500 to-orange-600">
                        Bajo Control
                    </span>
                </h1>

                <!-- Description -->
                <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-400 max-w-2xl mx-auto mb-10 leading-relaxed">
                    Centraliza documentos, mantenimiento, historial y análisis de tu motocicleta en una plataforma profesional diseñada para riders exigentes.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
                    <a href="#" class="group relative px-8 py-4 bg-gradient-to-r from-orange-600 to-orange-500 text-white rounded-xl font-bold text-base shadow-xl shadow-orange-500/25 hover:shadow-2xl hover:shadow-orange-500/30 hover:scale-105 transition-all duration-300">
                        <span class="relative z-10">Comenzar Gratis</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-700 to-orange-600 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </a>
                    <a href="#funciones" class="px-8 py-4 bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 text-slate-900 dark:text-slate-50 rounded-xl font-bold text-base hover:border-orange-500 dark:hover:border-orange-500 hover:text-orange-600 dark:hover:text-orange-500 transition-all duration-300">
                        Ver Funciones
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto pt-8 border-t border-slate-200 dark:border-slate-800">
                    <div>
                        <div class="text-3xl font-black text-orange-600 dark:text-orange-500">5K+</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400 font-medium">Usuarios Activos</div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-orange-600 dark:text-orange-500">50K+</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400 font-medium">Mantenimientos</div>
                    </div>
                    <div>
                        <div class="text-3xl font-black text-orange-600 dark:text-orange-500">99.9%</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400 font-medium">Disponibilidad</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FUNCIONES -->
    <section id="funciones" class="py-20 sm:py-28 px-4 sm:px-6 lg:px-8 bg-slate-50 dark:bg-slate-900/50">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="text-sm font-bold text-orange-600 dark:text-orange-500 uppercase tracking-widest">Características</span>
                <h2 class="text-4xl sm:text-5xl font-black mt-3 mb-4">Funciones Principales</h2>
                <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                    Todo lo que necesitas para mantener tu motocicleta en perfectas condiciones
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Feature Card 1 -->
                <div class="card-hover group relative p-8 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-orange-500/10">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-orange-600 to-orange-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="w-14 h-14 bg-orange-100 dark:bg-orange-950/30 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-orange-600 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold mb-3 text-slate-900 dark:text-slate-50">Documentos Digitales</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        SOAT, tecnicomecánica, tarjeta de propiedad y todos tus documentos importantes en un solo lugar seguro y accesible.
                    </p>
                </div>

                <!-- Feature Card 2 -->
                <div class="card-hover group relative p-8 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-orange-500/10">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-orange-600 to-orange-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="w-14 h-14 bg-orange-100 dark:bg-orange-950/30 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-orange-600 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold mb-3 text-slate-900 dark:text-slate-50">Mantenimientos Programados</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Registra servicios, kilometraje y repuestos. Recibe alertas automáticas para no olvidar ningún mantenimiento crítico.
                    </p>
                </div>

                <!-- Feature Card 3 -->
                <div class="card-hover group relative p-8 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-orange-500/10">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-orange-600 to-orange-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="w-14 h-14 bg-orange-100 dark:bg-orange-950/30 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-orange-600 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold mb-3 text-slate-900 dark:text-slate-50">Historial Completo</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Consulta todas las reparaciones, gastos y evolución de tu motocicleta. Analítica detallada para tomar mejores decisiones.
                    </p>
                </div>

                <!-- Feature Card 4 -->
                <div class="card-hover group relative p-8 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-orange-500/10">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-orange-600 to-orange-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="w-14 h-14 bg-orange-100 dark:bg-orange-950/30 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-orange-600 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold mb-3 text-slate-900 dark:text-slate-50">Alertas Inteligentes</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Notificaciones automáticas para vencimientos de documentos, próximos mantenimientos y recordatorios personalizados.
                    </p>
                </div>

                <!-- Feature Card 5 -->
                <div class="card-hover group relative p-8 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-orange-500/10">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-orange-600 to-orange-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="w-14 h-14 bg-orange-100 dark:bg-orange-950/30 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-orange-600 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold mb-3 text-slate-900 dark:text-slate-50">Control de Gastos</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Monitorea todos los gastos relacionados con tu moto. Gráficos y reportes para visualizar el costo real de propiedad.
                    </p>
                </div>

                <!-- Feature Card 6 -->
                <div class="card-hover group relative p-8 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-orange-500/10">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-orange-600 to-orange-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="w-14 h-14 bg-orange-100 dark:bg-orange-950/30 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-orange-600 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold mb-3 text-slate-900 dark:text-slate-50">Seguridad Total</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Tus datos protegidos con encriptación de nivel bancario. Copias de seguridad automáticas y acceso desde cualquier dispositivo.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- BENEFICIOS -->
    <section id="beneficios" class="py-20 sm:py-28 px-4 sm:px-6 lg:px-8 bg-white dark:bg-slate-950">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="text-sm font-bold text-orange-600 dark:text-orange-500 uppercase tracking-widest">Ventajas</span>
                <h2 class="text-4xl sm:text-5xl font-black mt-3 mb-4">¿Por qué elegir MotoInfo?</h2>
                <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                    Más que una app, es tu copiloto digital para mantener tu moto en óptimas condiciones
                </p>
            </div>

            <!-- Benefits Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                
                <!-- Benefit 1 -->
                <div class="relative p-8 lg:p-10 bg-gradient-to-br from-orange-50 to-white dark:from-orange-950/20 dark:to-slate-900 border border-orange-200 dark:border-orange-900/30 rounded-3xl overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-orange-500/10 dark:bg-orange-500/5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 dark:bg-orange-950/50 rounded-2xl mb-6">
                            <svg class="w-8 h-8 text-orange-600 dark:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 text-slate-900 dark:text-slate-50">Ahorra tiempo y dinero</h3>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-4">
                            Prevén averías costosas con mantenimientos a tiempo. Nuestros usuarios reportan hasta un 40% de ahorro en reparaciones al mantener su moto correctamente.
                        </p>
                        <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-orange-600 dark:text-orange-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Recordatorios automáticos de mantenimiento</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-orange-600 dark:text-orange-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Optimiza el presupuesto de tu moto</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-orange-600 dark:text-orange-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Evita multas por documentos vencidos</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Benefit 2 -->
                <div class="relative p-8 lg:p-10 bg-gradient-to-br from-blue-50 to-white dark:from-blue-950/20 dark:to-slate-900 border border-blue-200 dark:border-blue-900/30 rounded-3xl overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 dark:bg-blue-500/5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 dark:bg-blue-950/50 rounded-2xl mb-6">
                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 text-slate-900 dark:text-slate-50">Máxima seguridad</h3>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-4">
                            Tus documentos y datos protegidos con tecnología de encriptación bancaria. Accede desde cualquier dispositivo con total tranquilidad.
                        </p>
                        <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Encriptación SSL de 256 bits</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Copias de seguridad automáticas diarias</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Cumplimiento GDPR y protección de datos</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Benefit 3 -->
                <div class="relative p-8 lg:p-10 bg-gradient-to-br from-purple-50 to-white dark:from-purple-950/20 dark:to-slate-900 border border-purple-200 dark:border-purple-900/30 rounded-3xl overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/10 dark:bg-purple-500/5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-100 dark:bg-purple-950/50 rounded-2xl mb-6">
                            <svg class="w-8 h-8 text-purple-600 dark:text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 text-slate-900 dark:text-slate-50">Acceso multiplataforma</h3>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-4">
                            Gestiona tu moto desde tu móvil, tablet o computadora. Sincronización en tiempo real y disponible cuando lo necesites.
                        </p>
                        <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Apps nativas para iOS y Android</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Versión web responsive</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Sincronización instantánea en la nube</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Benefit 4 -->
                <div class="relative p-8 lg:p-10 bg-gradient-to-br from-emerald-50 to-white dark:from-emerald-950/20 dark:to-slate-900 border border-emerald-200 dark:border-emerald-900/30 rounded-3xl overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 dark:bg-emerald-500/5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-emerald-100 dark:bg-emerald-950/50 rounded-2xl mb-6">
                            <svg class="w-8 h-8 text-emerald-600 dark:text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 text-slate-900 dark:text-slate-50">Reportes inteligentes</h3>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-4">
                            Visualiza tendencias, costos y estadísticas de tu moto. Toma decisiones informadas con datos reales y análisis predictivos.
                        </p>
                        <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Gráficos de costos y consumo</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Predicción de próximos mantenimientos</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Exportación de datos en PDF y Excel</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- PLANES -->
    <section id="planes" class="py-20 sm:py-28 px-4 sm:px-6 lg:px-8 bg-slate-50 dark:bg-slate-900/50">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="text-sm font-bold text-orange-600 dark:text-orange-500 uppercase tracking-widest">Precios</span>
                <h2 class="text-4xl sm:text-5xl font-black mt-3 mb-4">Elige tu plan ideal</h2>
                <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                    Sin compromisos. Cancela cuando quieras. Prueba gratuita de 30 días en todos los planes.
                </p>
            </div>

            <!-- Pricing Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                
                <!-- Plan Básico -->
                <div class="relative p-8 bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 rounded-3xl hover:shadow-xl transition-all duration-300">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-50 mb-2">Básico</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm">Perfecto para comenzar</p>
                    </div>
                    
                    <div class="mb-6">
                        <div class="flex items-baseline">
                            <span class="text-5xl font-black text-slate-900 dark:text-slate-50">$0</span>
                            <span class="text-slate-600 dark:text-slate-400 ml-2">/mes</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-2">Gratis por siempre</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">1 motocicleta</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">Gestión de documentos básica</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">Historial de mantenimientos</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">Alertas por email</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">Soporte por email</span>
                        </li>
                    </ul>

                    <a href="#" class="block w-full py-3 px-6 text-center bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-50 rounded-xl font-semibold hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
                        Comenzar gratis
                    </a>
                </div>

                <!-- Plan Pro (Destacado) -->
                <div class="relative p-8 bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl shadow-2xl shadow-orange-500/25 transform lg:scale-105">
                    <!-- Badge -->
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="inline-block bg-white text-orange-600 text-xs font-bold uppercase tracking-wider px-4 py-1.5 rounded-full shadow-lg">
                            Más Popular
                        </span>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-white mb-2">Pro</h3>
                        <p class="text-orange-100 text-sm">Para riders exigentes</p>
                    </div>
                    
                    <div class="mb-6">
                        <div class="flex items-baseline">
                            <span class="text-5xl font-black text-white">$9.99</span>
                            <span class="text-orange-100 ml-2">/mes</span>
                        </div>
                        <p class="text-sm text-orange-100 mt-2">Facturación mensual</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-white flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-white text-sm font-medium">Alertas push y SMS</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-white flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-white text-sm font-medium">Reportes avanzados y estadísticas</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-white flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-white text-sm font-medium">Exportación de datos</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-white flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-white text-sm font-medium">Soporte prioritario 24/7</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-white flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-white text-sm font-medium">Acceso a beta features</span>
                        </li>
                    </ul>

                    <a href="#" class="block w-full py-3 px-6 text-center bg-white text-orange-600 rounded-xl font-bold hover:bg-orange-50 transition-all shadow-xl">
                        Empezar prueba gratuita
                    </a>
                </div>

                <!-- Plan Empresarial -->
                <div class="relative p-8 bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 rounded-3xl hover:shadow-xl transition-all duration-300">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-50 mb-2">Empresarial</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm">Para flotas y talleres</p>
                    </div>
                    
                    <div class="mb-6">
                        <div class="flex items-baseline">
                            <span class="text-5xl font-black text-slate-900 dark:text-slate-50">$49</span>
                            <span class="text-slate-600 dark:text-slate-400 ml-2">/mes</span>
                        </div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-2">Facturación anual disponible</p>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">Motos ilimitadas</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">Usuarios y permisos múltiples</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">API personalizada</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">Integraciones avanzadas</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">Gestor de cuenta dedicado</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-600 dark:text-slate-400 text-sm">SLA garantizado 99.9%</span>
                        </li>
                    </ul>

                    <a href="#" class="block w-full py-3 px-6 text-center bg-gradient-to-r from-orange-600 to-orange-500 text-white rounded-xl font-semibold hover:from-orange-700 hover:to-orange-600 transition-all shadow-lg shadow-orange-500/25">
                        Contactar ventas
                    </a>
                </div>

            </div>

            <!-- Pricing Note -->
            <div class="mt-12 text-center">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Todos los planes incluyen 30 días de prueba gratuita. Sin tarjeta de crédito requerida. 
                    <a href="#" class="text-orange-600 dark:text-orange-500 hover:underline font-medium">Ver comparación completa</a>
                </p>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
   <!-- CTA SECTION -->
<section class="relative py-20 sm:py-28 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-br from-orange-600 via-orange-500 to-orange-600">
    <!-- Pattern Overlay -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0djItaDJ2LTJoLTJ6bTAgNGgtMnYyaDJ2LTJ6bTAgMnYyaDJ2LTJoLTJ6bTItMmgydjJoLTJ2LTJ6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-30"></div>
    
    <div class="relative max-w-5xl mx-auto text-center text-white">
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black mb-6 leading-tight">
            ¿Listo para tomar el control?
        </h2>
        <p class="text-lg sm:text-xl mb-10 opacity-95 max-w-2xl mx-auto leading-relaxed">
            Únete a miles de motociclistas que ya confían en MotoInfo para gestionar su pasión sobre dos ruedas.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
            <a href="#" class="group relative px-10 py-4 bg-white text-orange-600 rounded-xl font-bold text-lg shadow-2xl hover:scale-105 transition-all duration-300">
                <span class="relative z-10">Crear mi cuenta</span>
            </a>
            <a href="#" class="px-10 py-4 bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white rounded-xl font-bold text-lg hover:bg-white/20 hover:border-white/50 transition-all duration-300">
                Ver demo
            </a>
        </div>

        <!-- Trust Indicators -->
        <div class="flex flex-wrap justify-center gap-6 text-sm opacity-90">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Sin tarjeta de crédito</span>
            </div>
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Prueba gratuita 30 días</span>
            </div>
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Cancela cuando quieras</span>
            </div>
        </div>
    </div>
</section>

    <!-- FOOTER -->
    <footer class="py-12 px-4 sm:px-6 lg:px-8 bg-slate-50 dark:bg-slate-900/50 border-t border-slate-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                
                <!-- Brand Column -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-600 dark:text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 16a4 4 0 118 0m6-2a4 4 0 110 8m-3-6h3m-6-8l-4 8h2l3-6h4l1 2h3" />
                        </svg>
                        <span class="text-xl font-black">MOTO<span class="text-orange-600 dark:text-orange-500">INFO</span></span>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed max-w-md">
                        La plataforma profesional de gestión para motociclistas. Mantén tu moto en perfectas condiciones con nuestra tecnología inteligente.
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="w-10 h-10 bg-slate-200 dark:bg-slate-800 rounded-lg flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-orange-500 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-200 dark:bg-slate-800 rounded-lg flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-orange-500 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-200 dark:bg-slate-800 rounded-lg flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-orange-500 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm4.441 16.892c-2.102.144-6.784.144-8.883 0C5.282 16.736 5.017 15.622 5 12c.017-3.629.285-4.736 2.558-4.892 2.099-.144 6.782-.144 8.883 0C18.718 7.264 18.982 8.378 19 12c-.018 3.629-.285 4.736-2.559 4.892zM10 9.658l4.917 2.338L10 14.342V9.658z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Product Column -->
                <div>
                    <h3 class="font-bold text-slate-900 dark:text-slate-50 mb-4">Producto</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Funciones</a></li>
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Precios</a></li>
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Actualizaciones</a></li>
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Roadmap</a></li>
                    </ul>
                </div>

                <!-- Company Column -->
                <div>
                    <h3 class="font-bold text-slate-900 dark:text-slate-50 mb-4">Empresa</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Acerca de</a></li>
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Blog</a></li>
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Contacto</a></li>
                        <li><a href="#" class="text-slate-600 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Soporte</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 border-t border-slate-200 dark:border-slate-800 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    © 2025 MotoInfo. Todos los derechos reservados.
                </p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-slate-500 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Privacidad</a>
                    <a href="#" class="text-slate-500 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Términos</a>
                    <a href="#" class="text-slate-500 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors">Cookies</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>