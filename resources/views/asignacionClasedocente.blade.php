
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignar clase a docente') }}
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
                                <label for="comboboxClase" class="block text-sm font-medium text-white">Selecciona una
                                    Clase</label>
                                <select id="comboboxClase" name="comboboxClase"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach ($lista as $lt)
                                    <option>{{ $lt->nombre_clase}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="comboboxDocente" class="block text-sm font-medium text-white">Selecciona un
                                    docente</label>
                                <select id="comboboxDocente" name="comboboxDocente"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach ($list as $it)
                                        <option>{{ $it->nombre}} {{$it->apellido}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4 w-full">
                            <x-buttonWhite class="ml-3">
                                Asignar Clase
                            </x-buttonWhite>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>