<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl mt-6 text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Confirmar Matricula') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black flex items-center justify-center">
                    <form method="POST" action="{{ route('matriculaC.store') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <h5 class="font-semibold text-xl mt-6 ml-3 text-gray-800 dark:text-gray-200 leading-tight">
                                    ¿Está Seguro de Querer Matricular Estas Clases?
                                </h5>
                            </div>
                        </div>
                        @foreach ($lista as $item)
                            @if ($item->periodo == $periodo)
                            <div class="w-1/2 sm:w-1/2 md:w-1/3 lg:w-1/5 mb-4 mt-6 p-2">
                                <a href="#"
                                    class="block w-full bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 p-2">
                                    <h5 class="mb-2 text-lg font-bold text-gray-900"><strong>{{$item->nombre_clase}}</strong></h5>
                                    <p class="font-normal text-gray-700"><strong>Horario: {{$item->hora_inicio}}</strong></p>
                                    <p class="font-normal text-gray-700"><strong>Días: {{$item->dias}}</strong></p>
                                    <p class="font-normal text-gray-700"><strong>Fecha de Inicio: {{$item->fecha_inicio}}</strong></p>
                                </a>
                            </div>
                            <input type="hidden" name="id_estudiante[]" id="id_estudiante" value="{{$idest}}">
                            <input type="hidden" name="id_curso[]" id="id_curso" value="{{$item->id_curso}}">
                            @endif
                        @endforeach
                        <div class="flex items-center justify-end mt-4">
                            <x-buttonWhite type="submit">
                                Registrar
                            </x-buttonWhite>
                            <pre> </pre>
                            <x-buttonOscuro route="matricula">
                                Cancelar
                            </x-buttonOscuro>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>