<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingresar Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <form method="POST" action="{{ route('estudiantesC.store') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <x-labelWhite for="id_estudiante" :value="'ID:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="number" name="id_estudiante"
                                              required autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="nombre" :value="'Nombres:'" />
                                <x-inputWhite class="block mt-1 w-full" type="text" name="nombre" value="{{ old('nombre') }}" required maxlength="50" minlength="3" autofocus />
                            </div>

                            <div>
                                <x-labelWhite for="apellido" :value="'Apellidos:'" />
                                <x-inputWhite class="block mt-1 w-full" type="text" name="apellido" value="{{ old('apellido') }}" required maxlength="50" minlength="3" autofocus />
                            </div>

                            <div>
                                <label for="fecha_de_nacimiento" class="block text-sm font-medium text-white">Fecha de Nacimiento:</label>
                                <input id="fecha_de_nacimiento" name="fecha_de_nacimiento" type="date" value="{{ old('fecha_de_nacimiento') }}" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            </div>

                            <div>
                                <x-labelWhite for="genero" :value="'Género:'" />
                                <select name="genero" id="genero" class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:border-gray-500 dark:focus:border-gray-400">
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                            </div>

                            <div>
                                <x-labelWhite for="direccion" :value="'Dirección:'" />
                                <x-inputWhite class="block mt-1 w-full" type="text" name="direccion" value="{{ old('direccion') }}" required maxlength="100" minlength="3" autofocus />
                            </div>

                            <div>
                                <x-labelWhite for="telefono" :value="'Teléfono:'" />
                                <x-inputWhite class="block mt-1 w-full" type="number" name="telefono" value="{{ old('telefono') }}" required autofocus />
                            </div>

                            <div>
                                <x-labelWhite for="correo_electronico" :value="'Correo Electrónico:'" />
                                <x-inputWhite class="block mt-1 w-full" type="email" name="correo_electronico" value="{{ old('correo_electronico') }}" required maxlength="50" minlength="4" autofocus />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-buttonWhite type="submit">
                                Registrar
                            </x-buttonWhite>
                            <pre> </pre>
                            <!-- Botón de cancelar -->
                            <x-buttonOscuro route="estudianteView">
                                Cancelar
                            </x-buttonOscuro>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>