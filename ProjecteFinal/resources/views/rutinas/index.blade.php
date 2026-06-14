<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold mb-0">Les meues Rutines</h2>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('rutinas.create') }}" class="btn btn-primary mb-3">+ Nova Rutina</a>

    @forelse($rutinas as $rutina)
        <div class="card mb-3 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">{{ $rutina->nombre }}</h5>
                    <small class="text-muted">
                        {{ $rutina->descripcion }}
                        @if($rutina->dia_semana)
                            · <span class="badge bg-secondary">{{ \App\Helpers\GymHelper::nomDia($rutina->dia_semana) }}</span>
                        @endif
                    </small>
                    <div class="mt-1">
                        <small class="text-muted">{{ $rutina->ejercicios->count() }} exercicis</small>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('rutinas.show', $rutina) }}" class="btn btn-sm btn-outline-primary">Veure</a>
                    <a href="{{ route('rutinas.edit', $rutina) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                    <form action="{{ route('rutinas.destroy', $rutina) }}" method="POST"
                          onsubmit="return confirm('Eliminar rutina?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">No tens cap rutina encara.</div>
    @endforelse

    <div class="mt-3">
        {{ $rutinas->links() }}
    </div>
</x-app-layout>
