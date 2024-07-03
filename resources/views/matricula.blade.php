<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl mt-6 mb-2 text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Matricula de Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div>
                    <div>
                        <div class="flex justify-between">
                            @php $cont = 0; @endphp
                            @foreach ($list as $item)
                            @if ($cont % 5 == 0)
                            @if ($cont > 0)
                        </div>
                        @endif
                        <div
                            class="w-full max-w-5xl bg-gray-800 p-8 rounded-lg shadow-md mx-4 border border-gray-700 mb-6">
                            <div class="p-6 bg-gray-800 rounded-lg m-6">
                                <h2 class="text-xl font-bold mb-6 text-white text-center">Periodo {{ $item->periodo }}
                                </h2>
                                <div class="flex flex-wrap justify-between mb-4">
                                    @php $tarjetasContador = 0; @endphp
                                    @endif

                                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/5 mb-4 p-2">
                                        <a href="#"
                                            class="block w-full bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 p-2">
                                            <h5 class="mb-2 text-lg font-bold text-gray-900"><strong>{{$item->nombre_clase}}</strong></h5>
                                            <p class="font-normal text-gray-700"><strong>Horario:</strong>
                                                {{$item->hora_inicio }}</p>
                                            <p class="font-normal text-gray-700"><strong>Días:</strong> {{ $item->dias}}
                                            </p>
                                        </a>
                                    </div>

                                    @php $tarjetasContador++; @endphp

                                    @if ($tarjetasContador == 5 || $loop->last)
                                </div>
                                <div class="flex justify-center">
                                    <x-buttonWhite class="mt-4" onclick="matricularClases({{ $item->periodo }})">
                                        Matricular Clases
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </x-buttonWhite>
                                </div>
                            </div>
                        </div>
                        @endif

                        @php $cont++; @endphp
                        @endforeach

                        @if ($cont % 5 != 0)
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function matricularClases(periodo) {
            window.location.href = "{{ route('matricularClases') }}" + "?periodo=" + periodo;
        }
    </script>
</x-app-layout>