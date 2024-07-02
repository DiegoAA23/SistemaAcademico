<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl mt-6 mb-2 text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignar Calificación') }}
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
                                <label for="comboboxClases" class="block text-sm font-medium text-white">Clase:</label>
                                <select id="comboboxClases" name="comboboxClases" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach ($lista as $lt)
                                    <option>{{ $lt->nombre_clase}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="comboboxEstudiantes" class="block text-sm font-medium text-white">Estudiante:</label>
                                <select id="comboboxEstudiantes" name="comboboxEstudiantes" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach ($list as $it)
                                    <option>{{ $it->nombre}} {{$it->apellido}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div>
                                <x-labelWhite for="nota" :value="'Nota:'"></x-labelWhite>
                                <x-inputWhite class="block mt-1 w-full" type="number" name="nota"
                                              value="{{ auth()->user()->nota }}" required min="0" max="100" autofocus></x-inputWhite>
                            </div>
                        </div>
                        

                        <div class="flex items-center justify-end mt-4">
                            <x-buttonWhite class="ml-3">
                                Asignar Calificación
                            </x-buttonWhite>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
