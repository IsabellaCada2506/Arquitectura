@extends('layouts.app')

@section('title', $viewData['title'])

@section('subtitle', 'Humanos registrados')

@section('content')
    <section class="human-page">
        <div class="human-heading human-heading-row">
            <div>
                <span class="human-label">Clasificación de aura</span>
                <h1>{{ $viewData['title'] }}</h1>
                <p>
                    Los humanos aparecen ordenados desde la mayor
                    cantidad de aura hasta la menor.
                </p>
            </div>

            <a
                href="{{ route('human.create') }}"
                class="btn human-primary-button"
            >
                Registrar humano
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="human-card table-card">
            @if ($viewData['humans']->isEmpty())
                <div class="empty-state">
                    <div class="empty-state-icon">✦</div>
                    <h2>No hay humanos registrados</h2>
                    <p>
                        Registra el primer humano para comenzar
                        la clasificación.
                    </p>

                    <a
                        href="{{ route('human.create') }}"
                        class="btn human-primary-button"
                    >
                        Registrar humano
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table human-table align-middle">
                        <thead>
                            <tr>
                                <th>Identificador</th>
                                <th>Nombre</th>
                                <th>Cantidad de aura</th>
                                <th>Jerarquía</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($viewData['humans'] as $human)
                                <tr>
                                    <td>
                                        <span class="human-id">
                                            #{{ $human->getId() }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="human-name">
                                            {{ $human->getName() }}

                                            @if ($human->getHierarchy() === 'legendario')
                                                <span class="boff-badge">
                                                    Boff
                                                </span>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        <span
                                            @class([
                                                'aura-value',
                                                'common-aura' => $human->getHierarchy() === 'común',
                                            ])
                                        >
                                            {{ $human->getAura() }}
                                        </span>
                                    </td>

                                    <td>
                                        <span
                                            @class([
                                                'hierarchy-badge',
                                                'common-badge' => $human->getHierarchy() === 'común',
                                                'moderate-badge' => $human->getHierarchy() === 'moderado',
                                                'legendary-badge' => $human->getHierarchy() === 'legendario',
                                            ])
                                        >
                                            {{ ucfirst($human->getHierarchy()) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
@endsection