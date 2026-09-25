@extends('layouts.app')

@section('title', $viewData['title'])

@section('subtitle', 'Enfrentamiento de aura')

@section('content')
    <section class="human-page">
        <div class="human-heading">
            <span class="human-label">Campo de batalla</span>
            <h1>{{ $viewData['title'] }}</h1>
            <p>
                Los dos primeros humanos registrados se enfrentan
                según su cantidad de aura.
            </p>
        </div>

        @if ($viewData['humans']->count() === 2)
            <div class="battle-grid">
                <article class="human-card contender-card">
                    <span class="contender-number">Competidor 1</span>

                    <div class="contender-avatar">
                        {{ strtoupper(substr($viewData['humans']->get(0)->getName(), 0, 1)) }}
                    </div>

                    <h2>
                        {{ $viewData['humans']->get(0)->getName() }}
                    </h2>

                    <div class="contender-aura">
                        <span>Cantidad de aura</span>
                        <strong>
                            {{ $viewData['humans']->get(0)->getAura() }}
                        </strong>
                    </div>
                </article>

                <div class="versus">
                    VS
                </div>

                <article class="human-card contender-card">
                    <span class="contender-number">Competidor 2</span>

                    <div class="contender-avatar">
                        {{ strtoupper(substr($viewData['humans']->get(1)->getName(), 0, 1)) }}
                    </div>

                    <h2>
                        {{ $viewData['humans']->get(1)->getName() }}
                    </h2>

                    <div class="contender-aura">
                        <span>Cantidad de aura</span>
                        <strong>
                            {{ $viewData['humans']->get(1)->getAura() }}
                        </strong>
                    </div>
                </article>
            </div>

            <div class="battle-result">
                <span>Resultado de la batalla</span>
                <h2>{{ $viewData['winnerMessage'] }}</h2>
            </div>
        @else
            <div class="human-card empty-state">
                <div class="empty-state-icon">⚔</div>
                <h2>La batalla aún no puede comenzar</h2>
                <p>{{ $viewData['winnerMessage'] }}</p>

                <a
                    href="{{ route('human.create') }}"
                    class="btn human-primary-button"
                >
                    Registrar humano
                </a>
            </div>
        @endif
    </section>
@endsection