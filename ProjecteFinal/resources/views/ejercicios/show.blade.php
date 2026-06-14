<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('ejercicios.index') }}" class="btn btn-sm btn-outline-secondary">← Tornar</a>
            <h2 class="fw-bold mb-0">{{ $ejercicio->nombre }}</h2>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Músculs treballats</h5>
                </div>
                <div class="card-body">
                    @forelse($ejercicio->musculos as $musculo)
                        <span class="badge bg-primary fs-6 me-1 mb-1">{{ $musculo->nombre }}</span>
                    @empty
                        <p class="text-muted">Sense músculs assignats.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">El teu progrés</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('progres.show', $ejercicio->id) }}" class="btn btn-info w-100">
                        Veure evolució de pes
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
