<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold mb-0">{{ $rutina->nombre }}</h2>
    </x-slot>

    <div class="card shadow-sm mb-3" style="max-width: 700px;">
        <div class="card-body">
            <p class="text-muted">{{ $rutina->descripcion ?? 'Sense descripció' }}</p>

            @if($rutina->dia_semana)
                {{-- Usar el helper GymHelper::nomDia() per obtenir el nom del dia --}}
                <span class="badge bg-primary mb-3">{{ $nomDia }}</span>
            @endif

            <h5 class="mt-3">Exercicis</h5>
            @forelse($rutina->ejercicios as $ej)
                <div class="d-flex justify-content-between border-bottom py-2">
                    <span>{{ $ej->nombre }}</span>
                    <span class="text-muted">{{ $ej->pivot->sets }} sets × {{ $ej->pivot->reps }} reps</span>
                </div>
            @empty
                <p class="text-muted">Sense exercicis afegits.</p>
            @endforelse

            <div class="mt-3 d-flex gap-2">
                <a href="{{ route('rutinas.edit', $rutina) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('rutinas.index') }}" class="btn btn-secondary">← Tornar</a>
            </div>
        </div>
    </div>
</x-app-layout>
