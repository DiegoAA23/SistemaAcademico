@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registrar Calificación</h1>

        <form action="{{ route('reg-calificacion') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="inscripcion_id">Inscripción:</label>
                <select class="form-control" id="inscripcion_id" name="inscripcion_id" required>
                    <option value="">Seleccionar inscripción</option>
                    @foreach ($inscripciones as $inscripcion)
                        <option value="{{ $inscripcion->id }}">{{ $inscripcion->estudiante->nombre }} {{ $inscripcion->estudiante->apellido }} - {{ $inscripcion->curso->clase_1 }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nota">Nota:</label>
                <input type="number" step="0.1" min="0" max="100" class="form-control" id="nota" name="nota" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar calificación</button>
        </form>
    </div>
@endsection
