<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Horarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <form action="#" method="post" onsubmit="return validarFormulario()">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="comboboxclase" class="block text-sm font-medium text-white">Selecciona la Clase:</label>
                                <select id="comboboxclase" name="comboboxclase" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option>Clase 1</option>
                                    <option>Clase 2</option>
                                    <option>Clase 3</option>
                                </select>
                            </div>
                          
                            <div>
                                <x-labelWhite for="aula" :value="'Aula:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="text" name="aula"
                                            value="{{ auth()->user()->aula }}" required maxlength="50" minlength="4" autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="dias" :value="'Dias(LMMJV):'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="text" name="dias"
                                            value="{{ auth()->user()->dias }}" required maxlength="6" minlength="1" autofocus></x-inputWhite>
                            </div>
                        
                            <div>
                            <label for="fechaInicio" class="block text-sm font-medium text-white">Selecciona Fecha de Inicio:</label>
                            <input id="fechaInicio" name="fechaInicio" type="date" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            </div>

                            <div>
                             <label for="horaInicio" class="block text-sm font-medium text-white">Hora de Inicio:</label>
                             <input id="horaInicio" name="horaInicio" type="time" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            </div>

                            <div>
                                <label for="fechaFin" class="block text-sm font-medium text-white">Selecciona Fecha de Fin:</label>
                                <input id="fechaFin" name="fechaFin" type="date" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            </div>

                            <div>
                                <label for="horaFin" class="block text-sm font-medium text-white">Hora de Fin:</label>
                                <input id="horaFin" name="horaFin" type="time" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-buttonWhite class="ml-3">
                                Ingresar Horario
                            </x-buttonWhite>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validarFormulario() {
            var fechaInicio = document.getElementById('fechaInicio').value;
            var horaInicio = document.getElementById('horaInicio').value;
            var fechaFin = document.getElementById('fechaFin').value;
            var horaFin = document.getElementById('horaFin').value;

            var fechaActual = new Date();
            var fechaActualFormato = fechaActual.getFullYear() + '-' + ('0' + (fechaActual.getMonth() + 1)).slice(-2) + '-' + ('0' + fechaActual.getDate()).slice(-2);
            var horaActual = ('0' + fechaActual.getHours()).slice(-2) + ':' + ('0' + fechaActual.getMinutes()).slice(-2);

            if (fechaInicio < fechaActualFormato) {
                alert('La fecha de inicio no puede ser anterior a la fecha actual.');
                return false;
            }

            if (fechaInicio == fechaActualFormato && horaInicio < horaActual) {
                alert('La hora de inicio no puede ser anterior a la hora actual.');
                return false;
            }

            if (fechaFin < fechaInicio) {
                alert('La fecha de fin no puede ser anterior a la fecha de inicio.');
                return false;
            }

            if (fechaFin == fechaInicio && horaFin <= horaInicio) {
                alert('La hora de fin debe ser mayor que la hora de inicio.');
                return false;
            }

            return true;
        }
    </script>
</x-app-layout>
