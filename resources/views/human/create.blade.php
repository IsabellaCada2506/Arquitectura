@extends('layouts.app')

@section('title', $viewData['title'])

@section('subtitle', 'Registro de humanos')

@section('content')
    <section class="human-page">
        <div class="human-heading">
            <span class="human-label">Gestión de humanos</span>
            <h1>{{ $viewData['title'] }}</h1>
            <p>
                Registra un nuevo farmeador indicando su nombre,
                cantidad de aura y jerarquía.
            </p>
        </div>

        <div class="human-card form-card">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <h2 class="alert-heading">
                        Revisa la información ingresada
                    </h2>

                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                method="POST"
                action="{{ route('human.save') }}"
                class="human-form"
            >
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">
                        Nombre
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Ingrese el nombre del humano"
                        required
                    >

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="aura" class="form-label">
                        Cantidad de aura
                    </label>

                    <input
                        type="number"
                        id="aura"
                        name="aura"
                        class="form-control @error('aura') is-invalid @enderror"
                        value="{{ old('aura') }}"
                        min="0"
                        step="1"
                        placeholder="Ingrese la cantidad de aura"
                        required
                    >

                    @error('aura')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="hierarchy" class="form-label">
                        Jerarquía
                    </label>

                    <select
                        id="hierarchy"
                        name="hierarchy"
                        class="form-select @error('hierarchy') is-invalid @enderror"
                        required
                    >
                        <option value="">
                            Seleccione una jerarquía
                        </option>

                        <option
                            value="común"
                            @selected(old('hierarchy') === 'común')
                        >
                            Común
                        </option>

                        <option
                            value="moderado"
                            @selected(old('hierarchy') === 'moderado')
                        >
                            Moderado
                        </option>

                        <option
                            value="legendario"
                            @selected(old('hierarchy') === 'legendario')
                        >
                            Legendario
                        </option>
                    </select>

                    @error('hierarchy')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-actions">
                    <a
                        href="{{ route('human.index') }}"
                        class="btn btn-outline-secondary"
                    >
                        Ver humanos
                    </a>

                    <button type="submit" class="btn human-primary-button">
                        Registrar humano
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection