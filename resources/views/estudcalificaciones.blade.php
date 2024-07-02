<x-app-layout>
    <x-slot name="header" class="mt-6">
        <h2 class="font-semibold text-xl mt-6 mb-2 text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calificaciones') }}
        </h2>
    </x-slot>

    @php $cont = 0; @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-md mx-4">
                    <x-buttonWhite class="ml-3 mb-6 mt-6">
                        <a href="/imprimir-notas">DESCARGAR BOLETA</a>
                    </x-buttonWhite>
                    <div class="w-full max-w-5xl bg-gray-800 p-8 rounded-lg shadow-md mx-4 border border-gray-700">
                        <div class="p-6 bg-gray-800 rounded-lg">
                            <div class="container mx-auto p-8">
                                <h2 class="text-xl font-bold mb-6 text-white text-center">Calificaciones del Estudiante</h2>
                                @if($item->isEmpty())
                                    <p class="text-white text-center">No se encontraron calificaciones para este estudiante.</p>
                                @else
                                    @foreach ($item as $it)
                                        @if ($cont == 0)
                                            <div class="bg-white rounded-lg shadow p-6 mb-6">
                                                <h2 class="text-lg font-semibold mb-2">Información del Estudiante</h2>
                                                <p><strong>Nombre: {{ $it->nombre_estudiante }} {{ $it->apellido_estudiante }}</strong></p>
                                                <p><strong>Cuenta: {{ $it->id_estudiante }}</strong></p>
                                                <p><strong>Carrera: </strong>Ingeniería en Ciencias de la Computación</p>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                        @endif
                                        <div class="bg-white rounded-lg shadow p-6">
                                            <h2 class="text-lg font-semibold mb-2">{{ $it->nombre_clase }}</h2>
                                            <p><strong>Profesor: {{ $it->nombre_profesor }} {{ $it->apellido_profesor }}</strong></p>
                                            <p><strong>Nota: {{ $it->nota }}</strong></p>
                                        </div>
                                        @php $cont++; @endphp
                                    @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
