<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Matricula de Cursos') }}
        </h2>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-md mx-4">
                    <div class="w-full max-w-5xl bg-gray-800 p-8 rounded-lg shadow-md mx-4 border border-gray-700">
                        <div class="p-6 bg-gray-800 rounded-lg">
                            <h2 class="text-xl font-bold mb-6 text-white text-center">Periodo XX</h2>
                            <div class="flex justify-between">
                                <a href="#" class="w-1/5 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><strong>Clase #1</strong></h5>
                                    <p class="font-normal text-gray-700"><strong>Horario:</strong> 12:00 p.m.</p>
                                    <p class="font-normal text-gray-700"><strong>Dias: </strong>: L - M - M - J</p>
                                </a>
                                <a href="#" class="w-1/5 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><strong>Clase #2</strong></h5>
                                    <p class="font-normal text-gray-700"><strong>Horario:</strong> 12:00 p.m.</p>
                                    <p class="font-normal text-gray-700"><strong>Dias: </strong>: L - M - M - J</p>
                                </a>
                                <a href="#" class="w-1/5 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><strong>Clase #3</strong></h5>
                                    <p class="font-normal text-gray-700"><strong>Horario:</strong> 12:00 p.m.</p>
                                    <p class="font-normal text-gray-700"><strong>Dias: </strong>: L - M - M - J</p>
                                </a>
                                <a href="#" class="w-1/5 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><strong>Clase #4</strong></h5>
                                    <p class="font-normal text-gray-700"><strong>Horario:</strong> 12:00 p.m.</p>
                                    <p class="font-normal text-gray-700"><strong>Dias: </strong>: L - M - M - J</p>
                                </a>
                                <a href="#" class="w-1/5 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><strong>Clase #5</strong></h5>
                                    <p class="font-normal text-gray-700"><strong>Horario:</strong> 12:00 p.m.</p>
                                    <p class="font-normal text-gray-700"><strong>Dias: </strong>: L - M - M - J</p>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-4 mb-4">
                            <x-buttonWhite class="ml-3">
                                Matricular Clases
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </x-buttonWhite>
                        </div>
                    </div>
                </div>
            </div>

</x-app-layout>