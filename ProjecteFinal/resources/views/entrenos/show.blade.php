<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold mb-0">Entreno — {{ \Carbon\Carbon::parse($entreno->fecha)->format('d/m/Y') }}</h2>
    </x-slot>

    <div class="card shadow-sm mb-3" style="max-width: 800px;">
        <div class="card-body">
            <p class="text-muted">
                Rutina: <strong>{{ $entreno->rutina?->nombre ?? 'Entreno lliure' }}</strong>
            </p>
            @if($entreno->comentario)
                <p class="text-muted">{{ $entreno->comentario }}</p>
            @endif

            {{-- Volum total calculat amb GymHelper::volumTotal() --}}
            <div class="alert alert-info d-flex align-items-center gap-3 mb-3">
                <strong>Volum total de l'entreno:</strong>
                <span class="fs-5 fw-bold">{{ number_format($volumTotal, 1) }} kg</span>
            </div>

            <h5 class="mt-3">Series registrades</h5>
            <table class="table table-bordered table-hover mt-2">
                <thead class="table-dark">
                    <tr>
                        <th>Exercici</th>
                        <th>Sèrie</th>
                        <th>Pes (kg)</th>
                        <th>Reps</th>
                        <th>1RM estimat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($setsAmbRm as $set)
                        <tr>
                            <td>{{ $set->ejercicio->nombre }}</td>
                            <td>{{ $set->set_numero }}</td>
                            <td>{{ $set->peso ?? '—' }}</td>
                            <td>{{ $set->reps }}</td>
                            {{-- 1RM estimat calculat amb GymHelper::estimarUnRM() --}}
                            <td>
                                @if($set->rm_estimat > 0)
                                    <span class="badge bg-success">{{ $set->rm_estimat }} kg</span>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">Sense series.</td></tr>
                    @endforelse
                </tbody>
            </table>

            <a href="{{ route('entrenos.index') }}" class="btn btn-secondary mt-2">← Tornar</a>
        </div>
    </div>
</x-app-layout>
