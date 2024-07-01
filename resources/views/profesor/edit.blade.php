<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Actualizar Profesor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <form method="POST" action="{{ route('profesoresC.update', $profesore->id_profesor) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-6">
                        <div>
                                <x-labelWhite for="nombre" :value="'Nombres:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="text" name="nombre"
                                    value="{{ old('nombre', $profesore->nombre) }}" required maxlength="50" minlength="3" autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="apellido" :value="'Apellidos:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="text" name="apellido"
                                    value="{{ old('apellido', $profesore->apellido) }}" required maxlength="50" minlength="3" autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="especialidad" :value="'Especialidad:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="text" name="especialidad"
                                    value="{{ old('especialidad', $profesore->especialidad) }}" required maxlength="50" minlength="4" autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="correo_electronico" :value="'Correo Electrónico:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="email" name="correo_electronico"
                                    value="{{ old('correo_electronico', $profesore->correo_electronico) }}" required maxlength="50" minlength="4" autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="telefono" :value="'Teléfono:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="number" name="telefono"
                                    value="{{ old('telefono', $profesore->telefono) }}" required autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="estado" :value="'Estado:'" />
                                <select name="estado_id" id="estado_id" class="block mt-1 w-full rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:border-gray-500 dark:focus:border-gray-400">
                                    <option value="1" {{ $profesore->estado_id == 1 ? 'selected' : '' }}>Activo</option>
                                    <option value="2" {{ $profesore->estado_id == 2 ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                        </div>
                        

                        <div class="flex items-center justify-end mt-4">
                            <x-buttonWhite type="submit">
                                Actualizar
                            </x-buttonWhite>
                            <pre> </pre>
                            <!-- Botón de cancelar -->
                            <x-buttonOscuro route="profesorView">
                                Cancelar
                            </x-buttonOscuro>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
