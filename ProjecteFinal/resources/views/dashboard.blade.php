<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-2">
            <svg class="bi bi-speedometer2" width="28" height="28" viewBox="0 0 16 16" fill="currentColor">
                <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l1.414 1.414a.5.5 0 1 1-.707.707L3.732 6.439a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 2 8zm10.707-5.707a.5.5 0 0 1 0 .707l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zM16 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM1.5 8a6.5 6.5 0 1 1 13 0 6.5 6.5 0 0 1-13 0z"/>
            </svg>
            <h2 class="fw-bold mb-0">Panell de Control</h2>
        </div>
    </x-slot>

    <div class="row g-4">
        <!-- Rutines Card -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 hover-lift" style="transition: transform 0.3s ease-in-out;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                            <svg class="bi bi-list-ul" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" style="color: #0d6efd;">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 13.854a.5.5 0 1 1-.708-.708L4.793 11.5 3.146 9.854a.5.5 0 1 1 .708-.708L5.5 10.793l1.646-1.647a.5.5 0 1 1 .708.708L6.207 11.5l1.647 1.646a.5.5 0 0 1-.708.708L5.5 12.207l-1.646 1.647z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="text-muted mb-0 small">Rutines</h6>
                        </div>
                    </div>
                    <h1 class="display-5 fw-bold mb-2">{{ auth()->user()->rutinas()->count() }}</h1>
                    <p class="text-muted mb-3">Total de rutines creades</p>
                    <a href="{{ route('rutinas.index') }}" class="btn btn-outline-primary btn-sm">
                        <svg class="bi bi-arrow-right" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                        Veure totes
                    </a>
                </div>
            </div>
        </div>

        <!-- Entrenos Card -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 hover-lift" style="transition: transform 0.3s ease-in-out;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success bg-opacity-10 p-3 rounded-3 me-3">
                            <svg class="bi bi-dumbbell" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" style="color: #198754;">
                                <path d="M6.5 1a.5.5 0 0 1 .5.5v3H2a.5.5 0 0 1 0-1h4V1.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M6 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                <path d="M2.5 7a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm10 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"/>
                                <path d="M10 1a.5.5 0 0 1 .5.5v3H14a.5.5 0 0 1 0 1h-4V1.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M6 11a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                <path d="M2.5 11a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm10 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"/>
                                <path d="M6 15a.5.5 0 0 1-.5-.5v-3H2a.5.5 0 0 1 0-1h4v3a.5.5 0 0 1-.5.5z"/>
                                <path d="M10 15a.5.5 0 0 1-.5-.5v-3H6a.5.5 0 0 1 0-1h4v3a.5.5 0 0 1-.5.5z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="text-muted mb-0 small">Entrenos</h6>
                        </div>
                    </div>
                    <h1 class="display-5 fw-bold mb-2">{{ auth()->user()->entrenos()->count() }}</h1>
                    <p class="text-muted mb-3">Total d'entrenos registrats</p>
                    <a href="{{ route('entrenos.index') }}" class="btn btn-outline-success btn-sm">
                        <svg class="bi bi-arrow-right" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                        Veure totes
                    </a>
                </div>
            </div>
        </div>

        <!-- Entrenos Avui Card -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100 hover-lift" style="transition: transform 0.3s ease-in-out;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning bg-opacity-10 p-3 rounded-3 me-3">
                            <svg class="bi bi-calendar-check" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" style="color: #ffc107;">
                                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M16 14V4a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM5 7a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="text-muted mb-0 small">Avui</h6>
                        </div>
                    </div>
                    <h1 class="display-5 fw-bold mb-2">{{ auth()->user()->entrenos()->whereDate('fecha', today())->count() }}</h1>
                    <p class="text-muted mb-3">Entrenos avui</p>
                    <a href="{{ route('entrenos.create') }}" class="btn btn-outline-warning btn-sm">
                        <svg class="bi bi-plus-circle" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        Nou entreno
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="row mt-5">
        <div class="col-12">
            <h5 class="fw-bold mb-3">Accions ràpides</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <a href="{{ route('rutinas.create') }}" class="btn btn-primary w-100 py-3" style="text-decoration: none;">
                        <svg class="bi bi-plus-circle" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -3px; margin-right: 8px;">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        Crear nova rutina
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('ejercicios.index') }}" class="btn btn-info w-100 py-3" style="text-decoration: none;">
                        <svg class="bi bi-graph-up" width="20" height="20" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -3px; margin-right: 8px;">
                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
                        </svg>
                        Veure progrés
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>