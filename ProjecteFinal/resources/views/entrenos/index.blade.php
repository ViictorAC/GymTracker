<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold mb-0">Els meus Entrenos</h2>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('entrenos.create') }}" class="btn btn-primary mb-3">+ Nou Entreno</a>

    @forelse($entrenos as $entreno)
        <div class="card mb-3 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">{{ \Carbon\Carbon::parse($entreno->fecha)->format('d/m/Y') }}</h5>
                    <small class="text-muted">{{ $entreno->rutina?->nombre ?? 'Entreno lliure' }}</small>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('entrenos.show', $entreno) }}" class="btn btn-sm btn-outline-primary">Veure</a>
                    <form action="{{ route('entrenos.destroy', $entreno) }}" method="POST"
                          onsubmit="return confirm('Eliminar entreno?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">No tens cap entreno registrat.</div>
    @endforelse

    <div class="mt-3">
        {{ $entrenos->links() }}
    </div>
</x-app-layout>
