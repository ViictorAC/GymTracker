<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold mb-0">Catàleg d'Exercicis</h2>
    </x-slot>

    @php
        // Agrupar per el primer múscul (múscul principal)
        $grups = [];
        foreach ($ejercicios as $ejercicio) {
            $principal = $ejercicio->musculos->first()?->nombre ?? 'Sense grup';
            $grups[$principal][] = $ejercicio;
        }
        ksort($grups);
    @endphp

    @forelse($grups as $muscul => $llista)
        <div class="mb-5">
            <div class="d-flex align-items-center mb-3">
                <h4 class="fw-bold mb-0 text-primary">{{ $muscul }}</h4>
                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 ms-2">
                    {{ count($llista) }} {{ count($llista) === 1 ? 'exercici' : 'exercicis' }}
                </span>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach($llista as $ejercicio)
                    <div class="col">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $ejercicio->nombre }}</h5>
                                <div class="d-flex flex-wrap gap-1 mt-2">
                                    @foreach($ejercicio->musculos as $musculo)
                                        <span class="badge {{ $loop->first ? 'bg-primary' : 'bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25' }}">
                                            {{ $musculo->nombre }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ route('ejercicios.show', $ejercicio) }}" class="btn btn-sm btn-outline-primary">
                                    Veure detall
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="alert alert-info">No hi ha exercicis registrats.</div>
    @endforelse

</x-app-layout>
