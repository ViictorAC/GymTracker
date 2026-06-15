<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-2">
            <svg class="bi bi-journal-plus" width="28" height="28" viewBox="0 0 16 16" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 8 4z"/>
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h4.5a.5.5 0 0 1 .354.146l5 5A.5.5 0 0 1 14 4.5zM9.5 3a.5.5 0 0 1-.5-.5V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5h-3.5a.5.5 0 0 1-.5-.5V3z"/>
            </svg>
            <h2 class="fw-bold mb-0">Nova rutina</h2>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('rutinas.store') }}" method="POST" id="rutinaForm">
                @csrf

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-light border-bottom-0 py-3">
                        <h5 class="card-title mb-0">Informació general</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-medium">Nom</label>
                            <input type="text" name="nombre" class="form-control form-control-lg @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">Descripció</label>
                            <textarea name="descripcion" class="form-control" rows="4" placeholder="Descriu l'objectiu d'esta rutina">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-medium">Dia de la setmana (opcional)</label>
                            <select name="dia_semana" class="form-select form-select-lg">
                                <option value="">-- Cap --</option>
                                @foreach(['Dilluns','Dimarts','Dimecres','Dijous','Divendres','Dissabte','Diumenge'] as $i => $dia)
                                    <option value="{{ $i + 1 }}" {{ old('dia_semana') == $i + 1 ? 'selected' : '' }}>{{ $dia }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-light border-bottom-0 py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Exercicis</h5>
                        <span class="badge bg-info" id="exercises-count">0</span>
                    </div>
                    <div class="card-body">
                        <div id="ejercicios-container"></div>

                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#exercisesModal">
                            <svg class="bi bi-plus-circle" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            Afegir exercici
                        </button>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-lg flex-grow-1">Guardar rutina</button>
                    <a href="{{ route('rutinas.index') }}" class="btn btn-outline-secondary btn-lg">Cancel·lar</a>
                </div>
            </form>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                <div class="card-header bg-light border-bottom-0 py-3">
                    <h5 class="card-title mb-0">Ajuda</h5>
                </div>
                <div class="card-body small">
                    <p class="mb-3"><strong>Com crear la rutina:</strong></p>
                    <ol class="ps-3 mb-3">
                        <li>Escriu el nom de la rutina</li>
                        <li>Afig una descripció si vols</li>
                        <li>Selecciona els exercicis i les seues sèries/reps</li>
                        <li>Guarda la rutina</li>
                    </ol>
                    <p class="mb-0 text-muted"><small>Els exercicis s'afigen com a part de la rutina, no com un entrenament.</small></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exercisesModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-bottom py-3">
                    <h5 class="modal-title">Agregar Ejercicio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Grupo Muscular</label>
                        <select id="muscleGroupSelect" class="form-select">
                            <option value="">-- Selecciona grupo muscular --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Ejercicio</label>
                        <select id="selector-ejercicio" class="form-select">
                            <option value="">-- Selecciona ejercicio --</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-medium">Series</label>
                                <input type="number" id="exerciseSets" placeholder="3" min="1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-medium">Reps</label>
                                <input type="number" id="exerciseReps" placeholder="10" min="1" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="addExerciseBtn">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <textarea id="ejercicios-data" class="d-none" aria-hidden="true">{{ json_encode($ejerciciosJson, JSON_UNESCAPED_UNICODE) }}</textarea>

    <script>
        const ejercicios = JSON.parse(document.getElementById('ejercicios-data').value);
        const muscleGroupSelect = document.getElementById('muscleGroupSelect');
        const selectorEjercicio = document.getElementById('selector-ejercicio');
        const exerciseSetsInput = document.getElementById('exerciseSets');
        const exerciseRepsInput = document.getElementById('exerciseReps');
        const addExerciseBtn = document.getElementById('addExerciseBtn');
        const ejerciciosContainer = document.getElementById('ejercicios-container');
        const exercisesCount = document.getElementById('exercises-count');
        let count = 0;

        function groupByMusculo(ejerciciosList) {
            const grupos = {};
            ejerciciosList.forEach(ej => {
                const muscPrincipal = (ej.musculos && ej.musculos.length > 0)
                    ? ej.musculos.map(m => m.nombre).join(', ')
                    : 'Sense grup';

                if (!grupos[muscPrincipal]) {
                    grupos[muscPrincipal] = [];
                }

                grupos[muscPrincipal].push(ej);
            });
            return grupos;
        }

        function fillMuscleGroupSelect() {
            const grupos = groupByMusculo(ejercicios);

            muscleGroupSelect.innerHTML = '<option value="">-- Selecciona grupo muscular --</option>';
                muscleGroupSelect.innerHTML = '<option value="">-- Selecciona grup muscular --</option>';
            Object.keys(grupos).sort().forEach(musculo => {
                const option = document.createElement('option');
                option.value = musculo;
                option.textContent = musculo;
                muscleGroupSelect.appendChild(option);
            });
        }

        function fillExerciseSelect(muscleGroup) {
            const grupos = groupByMusculo(ejercicios);
            selectorEjercicio.innerHTML = '<option value="">-- Selecciona ejercicio --</option>';
                selectorEjercicio.innerHTML = '<option value="">-- Selecciona exercici --</option>';

            if (muscleGroup && grupos[muscleGroup]) {
                grupos[muscleGroup].forEach(ej => {
                    const option = document.createElement('option');
                    option.value = ej.id;
                    option.dataset.nombre = ej.nombre;
                    option.textContent = ej.nombre;
                    selectorEjercicio.appendChild(option);
                });
            }
        }

        function createExerciseCard(id, nombre, sets, reps) {
            const div = document.createElement('div');
            div.className = 'card mb-2 border-0 bg-light';
            div.innerHTML = `
                <div class="card-body py-3 px-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <h6 class="card-title mb-2">${nombre}</h6>
                            <div class="row g-2">
                                <div class="col-6">
                                    <small class="text-muted d-block">Series</small>
                                    <strong>${sets}</strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Reps</small>
                                    <strong>${reps}</strong>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ejercicios[${count}][id]" value="${id}">
                        <input type="hidden" name="ejercicios[${count}][sets]" value="${sets}">
                        <input type="hidden" name="ejercicios[${count}][reps]" value="${reps}">
                        <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="this.parentElement.parentElement.remove(); updateExercisesCount();">
                            <svg class="bi bi-trash" width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 1a.5.5 0 0 0-.5.5v1h12v-1a.5.5 0 0 0-.5-.5H2.5z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            `;
            ejerciciosContainer.appendChild(div);
            count++;
            updateExercisesCount();
        }

        function updateExercisesCount() {
            const cards = ejerciciosContainer.querySelectorAll('.card');
            exercisesCount.textContent = cards.length;
        }

        addExerciseBtn.addEventListener('click', () => {
            const option = selectorEjercicio.options[selectorEjercicio.selectedIndex];
            const id = selectorEjercicio.value;
            const nombre = option ? option.dataset.nombre : '';
            const sets = exerciseSetsInput.value;
            const reps = exerciseRepsInput.value;

            if (!id || !sets || !reps) {
                return;
            }

            createExerciseCard(id, nombre, sets, reps);

            selectorEjercicio.value = '';
            exerciseSetsInput.value = '';
            exerciseRepsInput.value = '';

            const modal = bootstrap.Modal.getInstance(document.getElementById('exercisesModal'));
            if (modal) {
                modal.hide();
            }
        });

        muscleGroupSelect.addEventListener('change', () => {
            fillExerciseSelect(muscleGroupSelect.value);
        });

        fillMuscleGroupSelect();
    </script>
</x-app-layout>