<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingresar Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <form method="POST" action="{{ route('horariosC.store') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                            <x-labelWhite for="id_curso" :value="'Curso:'" />

                                <select id="id_curso" name="id_curso" required
                                    class="rounded-md shadow-sm block mt-1 w-full rounded-lg border border-white-300 dark:border-white-600 focus:outline-none focus:border-white focus:ring-white focus:ring-opacity-50 dark:focus:border-gray-400">
                                    
                                    <option value="">Seleccione el Curso</option>
                                    @foreach($clases as $clase)
                                        <option value="{{ $clase->id_curso }}">{{ $clase->nombre_clase }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div>
                                <x-labelWhite for="aula_id" :value="'Aula:'" />
                                <select id="aula_id" name="aula_id" required
                                    class="rounded-md shadow-sm block mt-1 w-full rounded-lg border border-white-300 dark:border-white-600 focus:outline-none focus:border-white focus:ring-white focus:ring-opacity-50 dark:focus:border-gray-400">
                                    <option value="">Seleccione el Aula</option>
                                    @foreach($aulas as $aula)
                                        <option value="{{ $aula->id_aula }}">{{ $aula->aula }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div>
                                <label for="fecha_inicio" class="block text-sm font-medium text-white">Fecha de Inicio:</label>
                                <input id="fecha_inicio" name="fecha_inicio" type="date" value="{{ old('fecha_inicio') }}" required 
                                class="rounded-md shadow-sm block mt-1 w-full rounded-lg border border-white-300 dark:border-white-600 focus:outline-none focus:border-white focus:ring-white focus:ring-opacity-50 dark:focus:border-gray-400">
                                </div>

                            <div>
                             <label for="hora_inicio" class="block text-sm font-medium text-white">Hora de Inicio:</label>
                             <input id="hora_inicio" name="hora_inicio" type="time" value="{{ old('hora_inicio') }}" required 
                             class="rounded-md shadow-sm block mt-1 w-full rounded-lg border border-white-300 dark:border-white-600 focus:outline-none focus:border-white focus:ring-white focus:ring-opacity-50 dark:focus:border-gray-400">
                             </div>


                            <div>
                                <label for="fecha_fin" class="block text-sm font-medium text-white">Fecha de Fin:</label>
                                <input id="fecha_fin" name="fecha_fin" type="date" value="{{ old('fecha_fin') }}" required 
                                class="rounded-md shadow-sm block mt-1 w-full rounded-lg border border-white-300 dark:border-white-600 focus:outline-none focus:border-white focus:ring-white focus:ring-opacity-50 dark:focus:border-gray-400">
                                </div>

                            <div>
                             <label for="hora_fin" class="block text-sm font-medium text-white">Hora de Fin:</label>
                             <input id="hora_fin" name="hora_fin" type="time" value="{{ old('hora_fin') }}" required 
                             class="rounded-md shadow-sm block mt-1 w-full rounded-lg border border-white-300 dark:border-white-600 focus:outline-none focus:border-white focus:ring-white focus:ring-opacity-50 dark:focus:border-gray-400">
                             </div>


                            <div>
                                <x-labelWhite for="dias" :value="'Días:'" />
                                <x-inputWhite class="block mt-1 w-full" type="text" name="dias" value="{{ old('dias') }}" required maxlength="5" minlength="1" autofocus />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-buttonWhite type="submit">
                                Registrar
                            </x-buttonWhite>
                            <pre> </pre>
                            <!-- Botón de cancelar -->
                            <x-buttonOscuro route="horarioView">
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