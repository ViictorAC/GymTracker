<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-2">
            <svg class="bi bi-pencil-square" width="28" height="28" viewBox="0 0 16 16" fill="currentColor">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706l-1.459 1.459-2.121-2.121 1.459-1.459a.5.5 0 0 1 .706 0l1.415 1.415zM13.686 3.82l-2.121-2.121L6.5 9.5l-1 3.5 3.5-1 6.186-6.18z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
            <h2 class="fw-bold mb-0">Editar Rutina</h2>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('rutinas.update', $rutina) }}" method="POST">
                @csrf @method('PUT')

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-light border-bottom-0 py-3">
                        <h5 class="card-title mb-0">Información General</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-medium">
                                <svg class="bi bi-type" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                    <path d="M2.244 13.081.5 2.5a.5.5 0 0 1 .5-.5h5.989a.5.5 0 0 1 .5.5l-.753 5.022H8.57l.753-5.022a.5.5 0 0 1 .5-.5h5.989a.5.5 0 0 1 .5.5l-1.744 10.581a.5.5 0 0 1-.495.406h-5.01a.5.5 0 0 1-.494-.406L2.244 13.081zm1.555-4.166a.5.5 0 0 0-.374.918l.60 1.609a.5.5 0 0 0 .93.056l.99-3.968a.5.5 0 0 0-.468-.606H3.056a.5.5 0 0 0-.492.56l.383 2.041z"/>
                                </svg>
                                Nombre
                            </label>
                            <input type="text" name="nombre" class="form-control form-control-lg @error('nombre') is-invalid @enderror"
                                   value="{{ old('nombre', $rutina->nombre) }}" required>
                            @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">
                                <svg class="bi bi-chat-left-quote" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.5a2 2 0 0 0-2 2v2.5a.5.5 0 0 1-.8.4l-1.9-2.533a1 1 0 0 0-.6-.3H1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                </svg>
                                Descripción
                            </label>
                            <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $rutina->descripcion) }}</textarea>
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-medium">
                                <svg class="bi bi-calendar-week" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-11 1A1 1 0 0 1 0 6a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V6.5zm1-4a1 1 0 0 0-1 1v.882a1 1 0 0 0 1.97.01H2.5v-.882a1 1 0 0 0-1-1H1zm12 0a1 1 0 0 0-1 1v.882a1 1 0 0 0 1.97.01H14.5v-.882a1 1 0 0 0-1-1h-1z"/>
                                </svg>
                                Día de la semana (opcional)
                            </label>
                            <select name="dia_semana" class="form-select form-select-lg">
                                <option value="">-- Ninguno --</option>
                                @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'] as $i => $dia)
                                    <option value="{{ $i + 1 }}" {{ $rutina->dia_semana == $i + 1 ? 'selected' : '' }}>
                                        {{ $dia }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-light border-bottom-0 py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Ejercicios</h5>
                        <span class="badge bg-info" id="exercises-count">{{ $rutina->ejercicios->count() }}</span>
                    </div>
                    <div class="card-body">
                        <div id="ejercicios-container">
                            @foreach($rutina->ejercicios as $i => $ej)
                                <div class="card mb-2 border-0 bg-light">
                                    <div class="card-body py-3 px-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="flex-grow-1">
                                                <h6 class="card-title mb-2">{{ $ej->nombre }}</h6>
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <small class="text-muted d-block">Series</small>
                                                        <strong>{{ $ej->pivot->sets }}</strong>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted d-block">Reps</small>
                                                        <strong>{{ $ej->pivot->reps }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="ejercicios[{{ $i }}][id]" value="{{ $ej->id }}">
                                            <input type="hidden" name="ejercicios[{{ $i }}][sets]" value="{{ $ej->pivot->sets }}">
                                            <input type="hidden" name="ejercicios[{{ $i }}][reps]" value="{{ $ej->pivot->reps }}">
                                            <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="this.parentElement.parentElement.remove(); updateExercisesCount();">
                                                <svg class="bi bi-trash" width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 1a.5.5 0 0 0-.5.5v1h12v-1a.5.5 0 0 0-.5-.5H2.5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#exercisesModal">
                            <svg class="bi bi-plus-circle" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            Agregar Ejercicio
                        </button>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-lg flex-grow-1">
                        <svg class="bi bi-check-circle" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m10.97 4.97-.02.02-3.6 3.85a.75.75 0 0 1-1.08.02l-2.3-2.38a.75.75 0 0 1 1.08-1.04l1.77 1.83 3.12-3.35a.75.75 0 1 1 1.08 1.04z"/>
                        </svg>
                        Actualizar
                    </button>
                    <a href="{{ route('rutinas.index') }}" class="btn btn-outline-secondary btn-lg">
                        <svg class="bi bi-x-circle" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708l2.647-2.646-2.647-2.646a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        Cancelar
                    </a>
                </div>
            </form>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                <div class="card-header bg-light border-bottom-0 py-3">
                    <h5 class="card-title mb-0">
                        <svg class="bi bi-lightbulb" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                            <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.5-.223.972-.025 1.522.017.04.021.076.021.11a.686.686 0 0 1-.122.58c-.335.36-.534.928-.534 1.466 0 .992.657 1.914 1.908 2.503.385.184.872.274 1.352.274h.004c.88 0 1.7-.282 2.311-.782l.448-.368.552.36c.994.778 2.334 1.568 2.334 2.668 0 .452-.584.906-1.165.906-.756 0-1.316-.578-2.465-1.45C13.328 15.572 12.334 16 11.5 16H11c-.countrycode0 0-1.023-.05-2-.05s-1 .05-2 .05h-.5C6.666 16 5.672 15.572 4.965 14.6c-1.149.872-1.709 1.45-2.465 1.45-.581 0-1.165-.454-1.165-.906 0-1.1 1.34-1.89 2.334-2.668l.552-.36.448.368c.61.5 1.43.782 2.311.782h.005c.48 0 .967-.09 1.352-.274 1.25-.59 1.908-1.511 1.908-2.503 0-.538-.199-1.106-.534-1.466a.686.686 0 0 1-.122-.58c.198-.55.178-1.022-.025-1.522C12.3 10.685 13 9.508 13 8a6 6 0 0 1-11-4.312Z"/>
                        </svg>
                        Consejos
                    </h5>
                </div>
                <div class="card-body small">
                    <p class="mb-3"><strong>Cómo editar una rutina:</strong></p>
                    <ul class="ps-3 mb-3">
                        <li>Modifica el nombre o descripción</li>
                        <li>Cambia el día de la semana si es necesario</li>
                        <li>Agrega nuevos ejercicios</li>
                        <li>Elimina ejercicios innecesarios</li>
                        <li>Haz clic en "Actualizar"</li>
                    </ul>
                    <p class="mb-0 text-muted"><small>Los cambios se guardarán automáticamente al hacer clic en actualizar.</small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para añadir ejercicios -->
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

    <script>
        const ejercicios = @json($ejerciciosJson);
        const rutinaEjerciciosIds = @json($rutina->ejercicios->pluck('id')->toArray());

        const muscleGroupSelect = document.getElementById('muscleGroupSelect');
        const selectorEjercicio = document.getElementById('selector-ejercicio');
        const exerciseSetsInput = document.getElementById('exerciseSets');
        const exerciseRepsInput = document.getElementById('exerciseReps');
        const addExerciseBtn = document.getElementById('addExerciseBtn');
        const ejerciciosContainer = document.getElementById('ejercicios-container');
        const exercisesCount = document.getElementById('exercises-count');
        let count = {{ $rutina->ejercicios->count() }};

        // Agrupar ejercicios por el primer múscul (múscul principal)
        function groupByMusculo(ejerciciosList) {
            const grupos = {};
            ejerciciosList.forEach(ej => {
                const muscPrincipal = (ej.musculos && ej.musculos.length > 0)
                    ? ej.musculos[0].nombre
                    : 'Sense grup';
                if (!grupos[muscPrincipal]) {
                    grupos[muscPrincipal] = [];
                }
                grupos[muscPrincipal].push(ej);
            });
            return grupos;
        }

        // Llenar selector de grupos musculares (excluye los ya seleccionados)
        function fillMuscleGroupSelect() {
            const nuevosEjercicios = ejercicios.filter(ej => !rutinaEjerciciosIds.includes(ej.id));
            const grupos = groupByMusculo(nuevosEjercicios);
            muscleGroupSelect.innerHTML = '<option value="">-- Selecciona grup muscular --</option>';
            Object.keys(grupos).sort().forEach(musculo => {
                const option = document.createElement('option');
                option.value = musculo;
                option.textContent = musculo;
                muscleGroupSelect.appendChild(option);
            });
        }

        // Llenar selector de ejercicios según grupo muscular
        function fillExerciseSelect(muscleGroup) {
            const nuevosEjercicios = ejercicios.filter(ej => !rutinaEjerciciosIds.includes(ej.id));
            const grupos = groupByMusculo(nuevosEjercicios);
            selectorEjercicio.innerHTML = '<option value="">-- Selecciona exercici --</option>';
            
            if (muscleGroup && grupos[muscleGroup]) {
                grupos[muscleGroup].forEach(ej => {
                    const option = document.createElement('option');
                    option.value = ej.id;
                    option.dataset.nombre = ej.nombre;
                    const secMuscles = ej.musculos.slice(1).map(m => m.nombre).join(', ');
                    option.textContent = secMuscles ? `${ej.nombre} (+ ${secMuscles})` : ej.nombre;
                    selectorEjercicio.appendChild(option);
                });
            }
        }

        // Crear tarjeta de ejercicio
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
            return div;
        }

        // Actualizar contador de ejercicios
        function updateExercisesCount() {
            const cards = ejerciciosContainer.querySelectorAll('.card').length;
            exercisesCount.textContent = cards;
        }

        // Eventos
        muscleGroupSelect.addEventListener('change', function () {
            fillExerciseSelect(this.value);
        });

        addExerciseBtn.addEventListener('click', function () {
            const id = selectorEjercicio.value;
            const nombre = selectorEjercicio.options[selectorEjercicio.selectedIndex].dataset.nombre;
            const sets = exerciseSetsInput.value;
            const reps = exerciseRepsInput.value;

            if (!id || !sets || !reps) {
                alert('Si us plau, omple els camps obligatoris');
                return;
            }

            ejerciciosContainer.appendChild(createExerciseCard(id, nombre, sets, reps));
            rutinaEjerciciosIds.push(parseInt(id));
            count++;
            updateExercisesCount();

            // Limpiar formulario y rellenar selector
            exerciseSetsInput.value = '';
            exerciseRepsInput.value = '';
            selectorEjercicio.value = '';
            muscleGroupSelect.value = '';
            fillMuscleGroupSelect();

            // Cerrar modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('exercisesModal'));
            modal.hide();
        });

        // Inicializar
        document.addEventListener('DOMContentLoaded', fillMuscleGroupSelect);
    </script>
</x-app-layout>