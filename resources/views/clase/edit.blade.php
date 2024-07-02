<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Actualizar Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <form method="POST" action="{{ route('clasesC.update', $clase->id_curso) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <x-labelWhite for="nombre_clase" :value="'Clase:'" />
                                <x-inputWhite class="block mt-1 w-full" type="text" name="nombre_clase"
                                    value="{{ old('nombre_clase', $clase->nombre_clase) }}" required maxlength="50"
                                    minlength="3" autofocus />
                            </div>

                            <div>
                                <x-labelWhite for="id_profesor" :value="'Profesor:'" />
                                <select id="id_profesor" name="id_profesor" required 
                                class="rounded-md shadow-sm block mt-1 w-full rounded-lg border border-white-300 dark:border-white-600 focus:outline-none focus:border-white focus:ring-white focus:ring-opacity-50 dark:focus:border-gray-400">
                                    <option value="">Seleccione un profesor</option>
                                    @foreach($profesores as $profesor)
                                        <option value="{{ $profesor->id_profesor }}" {{ $profesor->id_profesor == $clase->id_profesor ? 'selected' : '' }}>{{ $profesor->nombre }} {{ $profesor->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div>
                                <x-labelWhite for="periodo" :value="'Periodo:'" />
                                <x-inputWhite class="block mt-1 w-full" type="number" name="periodo"
                                    value="{{ old('periodo', $clase->periodo) }}" required maxlength="50"
                                    minlength="3" autofocus />
                            </div>

                            <div>
                                <x-labelWhite for="estado" :value="'Estado:'" />
                                <select name="estado_id" id="estado_id"
                                class="rounded-md shadow-sm block mt-1 w-full rounded-lg border border-white-300 dark:border-white-600 focus:outline-none focus:border-white focus:ring-white focus:ring-opacity-50 dark:focus:border-gray-400">
                                    <option value="1" {{ $clase->estado_id == 1 ? 'selected' : '' }}>Activo
                                    </option>
                                    <option value="2" {{ $clase->estado_id == 2 ? 'selected' : '' }}>Inactivo
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-buttonWhite type="submit">
                                Actualizar
                            </x-buttonWhite>
                            <pre> </pre>
                            <!-- Botón de cancelar -->
                            <x-buttonOscuro route="claseView">
                                Cancelar
                            </x-buttonOscuro>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </x-app-layout>

    <script>
        @if ($errors->any())
            alertify.alert("Atención", "Por favor, corrija los siguientes errores:<br><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>");
        @endif

        @if (session('success'))
            alertify.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            alertify.error("{{ session('error') }}");
        @endif
    </script>