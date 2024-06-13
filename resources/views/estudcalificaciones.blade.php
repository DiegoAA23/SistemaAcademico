<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calificaciones') }}
        </h2>


    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-md mx-4">
                    <div class="w-full max-w-5xl bg-gray-800 p-8 rounded-lg shadow-md mx-4 border border-gray-700">
                        <div class="p-6 bg-gray-800 rounded-lg">
                            <div class="container mx-auto p-8">
                            <h2 class="text-xl font-bold mb-6 text-white text-center">Calificaciones del Periodo</h2>
                                <div class="bg-white rounded-lg shadow p-6 mb-6">
                                    <h2 class="text-lg font-semibold mb-2">Información del Alumno</h2>
                                    <p><strong>Nombre: </strong></p>
                                    <p><strong>Cuenta: </strong></p>
                                    <p><strong>Carrera: </strong>Ingeniería en Ciencias de la Computacion</p>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div class="bg-white rounded-lg shadow p-6">
                                        <h2 class="text-lg font-semibold mb-2">Clase 1: </h2>
                                        <p><strong>Profesor:</strong> </p>
                                        <p><strong>Nota:</strong> </p>
                                    </div>
                                    <div class="bg-white rounded-lg shadow p-6">
                                        <h2 class="text-lg font-semibold mb-2">Clase 2: </h2>
                                        <p><strong>Profesor:</strong> </p>
                                        <p><strong>Nota:</strong> </p>
                                    </div>
                                    <div class="bg-white rounded-lg shadow p-6">
                                        <h2 class="text-lg font-semibold mb-2">Clase 3: </h2>
                                        <p><strong>Profesor: </strong></p>
                                        <p><strong>Nota: </strong> </p>
                                    </div>
                                    <div class="bg-white rounded-lg shadow p-6">
                                        <h2 class="text-lg font-semibold mb-2">Clase 4: </h2>
                                        <p><strong>Profesor:</strong></p>
                                        <p><strong>Nota: </strong> </p>
                                    </div>
                                    <div class="bg-white rounded-lg shadow p-6">
                                        <h2 class="text-lg font-semibold mb-2">Clase 5: </h2>
                                        <p><strong>Profesor: </strong></p>
                                        <p><strong>Nota: </strong> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>