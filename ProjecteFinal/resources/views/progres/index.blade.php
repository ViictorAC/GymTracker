<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-2">
            <svg class="bi bi-graph-up" width="28" height="28" viewBox="0 0 16 16" fill="currentColor">
                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
            </svg>
            <h2 class="fw-bold mb-0">Evolució de Pesos</h2>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light border-bottom py-3">
                    <h5 class="card-title mb-0">
                        <svg class="bi bi-search" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.003-.003.007-.007.011-.01l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.01-.011zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        Selecciona exercici
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse($ejercicios as $ej)
                            <a href="{{ route('progres.show', $ej->id) }}"
                               class="list-group-item list-group-item-action p-3 fw-medium text-decoration-none border-bottom">
                                <div class="d-flex align-items-center">
                                    <svg class="bi bi-arrow-right" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 8px; color: #0d6efd;">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                    {{ $ej->nombre }}
                                </div>
                            </a>
                        @empty
                            <div class="p-4 text-center text-muted">
                                <p class="mb-0">No hi ha exercicis registrats</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="text-center py-5">
                        <svg class="bi bi-info-circle" width="48" height="48" viewBox="0 0 16 16" fill="currentColor" style="color: #6c757d;">
                            <path d="m8.93.456-6.933 11.85A.5.5 0 0 0 1.5 13h13a.5.5 0 0 0 .433-.744L9.07.456H8.93Z"/>
                        </svg>
                        <h5 class="mt-3 text-muted">Selecciona un exercici</h5>
                        <p class="text-muted">Per veure l'evolució del teu pes en els últims entrenos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>