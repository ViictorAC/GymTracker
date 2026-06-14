<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold mb-0">Progrés: {{ $ejercicio->nombre }}</h2>
    </x-slot>

    <div class="card shadow-sm mb-3" style="max-width: 700px;">
        <div class="card-body">
            @if($datos->isEmpty())
                <div class="alert alert-info">Encara no tens dades per aquest exercici.</div>
            @else
                {{-- Pes màxim formatat amb GymHelper::formatPes() --}}
                <div class="alert alert-success mb-3">
                    <strong>Millor pes registrat:</strong>
                    <span class="fs-5 fw-bold ms-2">{{ $maxPesFormatat }}</span>
                </div>

                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Data</th>
                            <th>Màxim pes</th>
                            <th>Volum total (kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datos as $fecha => $peso)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</td>
                                {{-- Usar GymHelper::formatPes() per mostrar el pes formatat --}}
                                <td class="fw-bold">{{ \App\Helpers\GymHelper::formatPes((float)$peso) }}</td>
                                <td>{{ number_format($volumPerData[$fecha] ?? 0, 1) }} kg</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <a href="{{ route('ejercicios.index') }}" class="btn btn-secondary">← Tornar</a>
        </div>
    </div>
</x-app-layout>
