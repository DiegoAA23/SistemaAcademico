<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingresar Profesor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <form action="#" method="post">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <x-labelWhite for="dni" :value="'ID:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="number" name="dni"
                                              value="{{ auth()->user()->periodo }}" required autofocus></x-inputWhite>
                            </div>

                          <div>
                                <x-labelWhite for="nombreDocente" :value="'Nombres:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="text" name="nombreDocente"
                                            value="{{ auth()->user()->clase1 }}" required maxlength="50" minlength="4" autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="apellidoDocente" :value="'Apellidos:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="text" name="apellidoDocente"
                                            value="{{ auth()->user()->clase1 }}" required maxlength="50" minlength="4" autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="especialidad" :value="'Especialidad:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="text" name="especialidad"
                                            value="{{ auth()->user()->clase1 }}" required maxlength="50" minlength="4" autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="correo" :value="'Correo Electrónico:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="email" name="correo"
                                            value="{{ auth()->user()->clase1 }}" required maxlength="50" minlength="4" autofocus></x-inputWhite>
                            </div>

                            <div>
                                <x-labelWhite for="telefono" :value="'Teléfono:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="number" name="telefono"
                                              value="{{ auth()->user()->periodo }}" required autofocus pattern="[0-9]{8}"></x-inputWhite>
                            </div>
                        </div>
                        

                        <div class="flex items-center justify-end mt-4">
                            <x-buttonWhite class="ml-3">
                                Ingresar Docente
                            </x-buttonWhite>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
