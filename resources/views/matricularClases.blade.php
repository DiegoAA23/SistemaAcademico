<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl mt-6 text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Confirmar Matricula') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <form method="POST" action="{{ route('matricula') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <h5 class="font-semibold text-xl mt-6 text-gray-800 dark:text-gray-200 leading-tight">
                                    ¿Está Seguro de Querer Matricular Estas Clases?
                                </h5>
                                @if ($periodo == 2)
                                    <p>Soooooo</p>
                                @else
                                    <p>Periodo seleccionado: {{ $periodo }}</p>
                                @endif
                            </div>
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
