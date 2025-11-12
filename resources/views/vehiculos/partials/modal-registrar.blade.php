<div id="modalRegistrarVehiculo"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm animate-fadeIn">

    <div class="relative bg-white dark:bg-gray-800 rounded-3xl shadow-2xl w-full max-w-4xl mx-4 overflow-hidden transform transition-all scale-100">
        <!-- HEADER -->
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-blue-600 to-indigo-600">
            <h2 class="text-2xl font-bold text-white">Registrar Vehículo</h2>
            <button type="button"
                class="text-white hover:text-gray-200 text-2xl font-bold"
                onclick="document.getElementById('modalRegistrarVehiculo').classList.add('hidden')">&times;</button>
        </div>

        <!-- FORMULARIO -->
        <form action="{{ route('vehiculos.store') }}" method="POST" class="px-8 py-6 space-y-6 overflow-y-auto max-h-[75vh]" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input name="nombre" label="Nombre del Vehículo" placeholder="Ej: Yamaha MT-09" />
                <select name="marca_id" label="Marca" :options="$marcas" />
                <select name="linea_id" label="Línea Comercial" :options="$lineas" />
                <select name="color_id" label="Color" :options="$colores" />
                <select name="tipo_id" label="Tipo" :options="$tipos" />
                <input name="cilindraje" label="Cilindraje (cc)" type="number" />
                <input name="modelo" label="Modelo" type="number" />
                <input name="combustible" label="Combustible" placeholder="Ej: Gasolina, Diesel..." />
                <input name="numeropasajero" label="Número de Pasajeros" type="number" />
                <input name="placa" label="Placa" placeholder="Ej: ABC123" class="uppercase" />
            </div>

            <!-- BOTONES -->
            <div class="flex justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                <button type="button"
                    class="px-6 py-2.5 rounded-xl font-semibold border border-gray-400 dark:border-gray-600 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition"
                    onclick="document.getElementById('modalRegistrarVehiculo').classList.add('hidden')">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl font-semibold text-white bg-blue-600 hover:bg-blue-700 shadow-md hover:shadow-lg transition">
                    Guardar Vehículo
                </button>
            </div>
        </form>
    </div>
</div>