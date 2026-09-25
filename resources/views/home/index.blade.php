@extends('layouts.app')

@section('title', $viewData['title'])

@section('subtitle', 'Humanos farmeadores de aura')

@section('content')
    <section class="human-page">
        <div class="human-heading">
            <span class="human-label">Año 2026</span>

            <h1>Gestión de humanos</h1>

            <p>
                Seleccione la acción que desea realizar.
            </p>
        </div>

        <div class="human-card form-card">
            <div class="d-grid gap-3">
                <a
                    href="{{ route('human.create') }}"
                    class="btn human-primary-button"
                >
                    Registrar humanos
                </a>

                <a
                    href="{{ route('human.index') }}"
                    class="btn human-primary-button"
                >
                    Listar humanos
                </a>

                <a
                    href="{{ route('human.battle') }}"
                    class="btn human-primary-button"
                >
                    Batalla de humanos
                </a>
            </div>
        </div>
    </section>
@endsection