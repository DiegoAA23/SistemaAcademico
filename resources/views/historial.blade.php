<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Historial Academico') }}
        </h2>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full max-w-md mx-auto bg-gray-800 p-4 rounded-lg shadow-md">
                    <div class="w-full max-w-2xl mx-auto bg-gray-800 p-4 rounded-lg shadow-md border border-gray-700">
                        <div class="p-4 bg-gray-800 rounded-lg">
                            <h2 class="text-xl font-bold mb-6 text-white text-center">Periodo X</h2>
                            <div class="space-y-4">
                                <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 mb-6">
                                    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900"><strong>Clase #1</strong></h5>
                                            <p class="font-normal text-gray-700"><strong>APROBADA</strong></p>
                                            <p class="font-normal text-gray-700">Promedio: XX%</p>
                                </a>
                                <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 mb-6">
                                    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900"><strong>Clase #2</strong></h5>
                                    <p class="font-normal text-gray-700"><strong>APROBADA</strong></p>
                                    <p class="font-normal text-gray-700">Promedio: XX%</p>
                                </a>
                                <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 mb-6">
                                    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900"><strong>Clase #3</strong></h5>
                                    <p class="font-normal text-gray-700"><strong>APROBADA</strong></p>
                                    <p class="font-normal text-gray-700">Promedio: XX%</p>
                                </a>
                                <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 mb-6">
                                    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900"><strong>Clase #4</strong></h5>
                                    <p class="font-normal text-gray-700"><strong>APROBADA</strong></p>
                                    <p class="font-normal text-gray-700">Promedio: XX%</p>
                                </a>
                                <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 mb-6">
                                    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900"><strong>Clase #5</strong></h5>
                                    <p class="font-normal text-gray-700"><strong>APROBADA</strong></p>
                                    <p class="font-normal text-gray-700">Promedio: XX%</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>