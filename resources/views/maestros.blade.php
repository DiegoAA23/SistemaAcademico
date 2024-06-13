<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Maestros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-md mx-4">
                    <div class="w-full max-w-5xl bg-gray-800 p-8 rounded-lg shadow-md mx-4 border border-gray-700">
                        <div class="p-6 bg-gray-800 rounded-lg w-1/2">
                            <h2 class="text-xl font-bold mb-6 text-white text-center">Formulario de Registro de Maestros</h2>
                            <div class="w-full max-w-lg">
                                @if (session('success'))
                                <div class="bg-green-500 text-white p-4 rounded mb-6">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <form action="#" method="POST" class="bg-white p-8 shadow-lg rounded-lg p-6">
    
                                    <label for="id_maestro" class="block mb-2 font-medium">Id Maestro:</label>
                                    <input type="number" id="id_maestro" name="id_maestro" class="w-full p-2 mb-4 border border-gray-300 rounded bg-transparent focus:outline-none focus:border-blue-500" required minlength="1" maxlength="10">

                                    <label for="nombre" class="block mb-2 font-medium">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" class="w-full p-2 mb-4 border border-gray-300 rounded bg-transparent focus:outline-none focus:border-blue-500" required minlength="2" maxlength="50">

                                    <label for="apellido" class="block mb-2 font-medium">Apellido:</label>
                                    <input type="text" id="apellido" name="apellido" class="w-full p-2 mb-4 border border-gray-300 rounded bg-transparent focus:outline-none focus:border-blue-500" required minlength="2" maxlength="50">

                                    <label for="especialidad" class="block mb-2 font-medium">Especialidad:</label>
                                    <input type="text" id="especialidad" name="especialidad" class="w-full p-2 mb-4 border border-gray-300 rounded bg-transparent focus:outline-none focus:border-blue-500" required minlength="2" maxlength="50">

                                    <label for="celular" class="block mb-2 font-medium">Celular:</label>
                                    <input type="tel" id="celular" name="celular" class="w-full p-2 mb-4 border border-gray-300 rounded bg-transparent focus:outline-none focus:border-blue-500" required minlength="10" maxlength="15">

                                    <label for="email" class="block mb-2 font-medium">Correo Electrónico:</label>
                                    <input type="email" id="email" name="email" class="w-full p-2 mb-4 border border-gray-300 rounded bg-transparent focus:outline-none focus:border-blue-500" required minlength="5" maxlength="50">
                                    <input type="submit" value="Registrar" class="w-full bg-red text-red font-bold py-2 px-4 rounded cursor-pointer">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>