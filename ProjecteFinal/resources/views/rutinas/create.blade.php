<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-2">
            <svg class="bi bi-dumbbell" width="28" height="28" viewBox="0 0 16 16" fill="currentColor">
                <path d="M6.5 1a.5.5 0 0 1 .5.5v3H2a.5.5 0 0 1 0-1h4V1.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M6 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                <path d="M2.5 7a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm10 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"/>
                <path d="M10 1a.5.5 0 0 1 .5.5v3H14a.5.5 0 0 1 0 1h-4V1.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M6 11a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                <path d="M2.5 11a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm10 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"/>
                <path d="M6 15a.5.5 0 0 1-.5-.5v-3H2a.5.5 0 0 1 0-1h4v3a.5.5 0 0 1-.5.5z"/>
                <path d="M10 15a.5.5 0 0 1-.5-.5v-3H6a.5.5 0 0 1 0-1h4v3a.5.5 0 0 1-.5.5z"/>
            </svg>
            <h2 class="fw-bold mb-0">Nuevo Entrenamiento</h2>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('entrenos.store') }}" method="POST" id="entrenoForm">
                @csrf

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-light border-bottom-0 py-3">
                        <h5 class="card-title mb-0">Información del Entrenamiento</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-medium">
                                <svg class="bi bi-calendar-event" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                    <path d="M-2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4a1 1 0 0 0-2 0H2a2 2 0 0 0-2 2zm13 2v5H1V2a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1z"/>
                                </svg>
                                Fecha
                            </label>
                            <input type="date" name="fecha" value="{{ date('Y-m-d') }}" class="form-control form-control-lg" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">
                                <svg class="bi bi-list-check" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                    <path fill-rule="evenodd" d="M5.338 1.59a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5a.75.75 0 0 1 .75-.75zM9.5 1.5a.5.5 0 0 1 .5.5v4.5a.5.5 0 0 1-1 0v-4.5a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v4.5a.5.5 0 0 1-1 0v-4.5a.5.5 0 0 1 .5-.5zM4.5 7a.5.5 0 0 1 .5.5v1.5a.5.5 0 0 1-1 0v-1.5a.5.5 0 0 1 .5-.5zM9 7a.5.5 0 0 1 .5.5v1.5a.5.5 0 0 1-1 0v-1.5a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v1.5a.5.5 0 0 1-1 0v-1.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                Rutina (opcional)
                            </label>
                            <select id="rutina-select" name="rutina_id" class="form-select form-select-lg">
                                <option value="">Entrenamiento libre</option>
                                @foreach($rutinas as $rutina)
                                    <option value="{{ $rutina->id }}" {{ old('rutina_id') == $rutina->id ? 'selected' : '' }}>{{ $rutina->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-medium">
                                <svg class="bi bi-chat-left-text" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.5a2 2 0 0 0-2 2v2.5a.5.5 0 0 1-.8.4l-1.9-2.533a1 1 0 0 0-.6-.3H1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                </svg>
                                Comentario
                            </label>
                            <textarea name="comentario" class="form-control" rows="3" placeholder="Añadir observaciones...">{{ old('comentario') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-light border-bottom-0 py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Series</h5>
                        <span class="badge bg-info" id="series-count">0</span>
                    </div>
                    <div class="card-body">
                        <div id="sets-container"></div>
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#setsModal">
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
                        Guardar Entrenamiento
                    </button>
                    <a href="{{ route('entrenos.index') }}" class="btn btn-outline-secondary btn-lg">
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
                        <svg class="bi bi-info-circle" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                            <path d="m8.93.456-6.933 11.85A.5.5 0 0 0 1.5 13h13a.5.5 0 0 0 .433-.744L9.07.456H8.93Z"/>
                        </svg>
                        Ayuda
                    </h5>
                </div>
                <div class="card-body small">
                    <p class="mb-3"><strong>Cómo agregar series:</strong></p>
                    <ol class="ps-3 mb-3">
                        <li>Haz clic en el botón "Agregar Ejercicio"</li>
                        <li>Selecciona el grupo muscular</li>
                        <li>Elige el ejercicio</li>
                        <li>Completa los datos (serie, peso, reps)</li>
                        <li>Haz clic en "Agregar"</li>
                    </ol>
                    <p class="mb-0 text-muted"><small>Las series se muestran en la columna principal para eliminarlas fácilmente.</small></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para añadir series -->
    <div class="modal fade" id="setsModal" tabindex="-1">
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
                        <select id="selector-set" class="form-select">
                            <option value="">-- Selecciona ejercicio --</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-medium">Serie nº</label>
                                <input type="number" id="setNumero" placeholder="1" min="1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-medium">Peso (kg)</label>
                                <input type="number" id="setPeso" placeholder="0" step="0.5" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Reps</label>
                        <input type="number" id="setReps" placeholder="10" min="1" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="addSetBtn">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ejercicios = @json($ejerciciosJson);
        const rutinas = @json($rutinasJson);

        const selectorRutina = document.getElementById('rutina-select');
        const selectorSet = document.getElementById('selector-set');
        const muscleGroupSelect = document.getElementById('muscleGroupSelect');
        const setNumeroInput = document.getElementById('setNumero');
        const setPesoInput = document.getElementById('setPeso');
        const setRepsInput = document.getElementById('setReps');
        const addSetBtn = document.getElementById('addSetBtn');
        const setsContainer = document.getElementById('sets-container');
        const seriesCount = document.getElementById('series-count');
        let count = 0;

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

        // Llenar el selector de grupos musculares
        function fillMuscleGroupSelect() {
            const rutina = rutinas.find(r => String(r.id) === String(selectorRutina.value));
            const rutinaEjercicios = rutina ? rutina.ejercicios : [];
            
            const allExercicios = selectorRutina.value ? rutinaEjercicios : ejercicios;
            const grupos = groupByMusculo(allExercicios);
            
            muscleGroupSelect.innerHTML = '<option value="">-- Selecciona grup muscular --</option>';
            Object.keys(grupos).sort().forEach(musculo => {
                const option = document.createElement('option');
                option.value = musculo;
                option.textContent = musculo;
                muscleGroupSelect.appendChild(option);
            });
        }

        // Llenar el selector de ejercicios según grupo muscular
        function fillExerciseSelect(muscleGroup) {
            const rutina = rutinas.find(r => String(r.id) === String(selectorRutina.value));
            const rutinaEjercicios = rutina ? rutina.ejercicios : [];
            
            const allExercicios = selectorRutina.value ? rutinaEjercicios : ejercicios;
            const grupos = groupByMusculo(allExercicios);
            
            selectorSet.innerHTML = '<option value="">-- Selecciona exercici --</option>';
            
            if (muscleGroup && grupos[muscleGroup]) {
                grupos[muscleGroup].forEach(ej => {
                    const option = document.createElement('option');
                    option.value = ej.id;
                    option.dataset.nombre = ej.nombre;
                    const secMuscles = ej.musculos.slice(1).map(m => m.nombre).join(', ');
                    option.textContent = secMuscles ? `${ej.nombre} (+ ${secMuscles})` : ej.nombre;
                    selectorSet.appendChild(option);
                });
            }
        }

        // Crear tarjeta de serie
        function createSetCard(id, nombre, setNumero, peso, reps) {
            const div = document.createElement('div');
            div.className = 'card mb-2 border-0 bg-light';
            div.innerHTML = `
                <div class="card-body py-3 px-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <h6 class="card-title mb-2">${nombre}</h6>
                            <div class="row g-2">
                                <div class="col-4">
                                    <small class="text-muted d-block">Serie</small>
                                    <strong>${setNumero}</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">Peso</small>
                                    <strong>${peso || '-'} kg</strong>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted d-block">Reps</small>
                                    <strong>${reps}</strong>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="sets[${count}][ejercicio_id]" value="${id}">
                        <input type="hidden" name="sets[${count}][set_numero]" value="${setNumero}">
                        <input type="hidden" name="sets[${count}][peso]" value="${peso || 0}">
                        <input type="hidden" name="sets[${count}][reps]" value="${reps}">
                        <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="this.parentElement.parentElement.remove(); updateSeriesCount();">
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

        // Actualizar contador de series
        function updateSeriesCount() {
            const cards = setsContainer.querySelectorAll('.card').length;
            seriesCount.textContent = cards;
        }

        // Eventos
        selectorRutina.addEventListener('change', function () {
            fillMuscleGroupSelect();
            muscleGroupSelect.value = '';
            selectorSet.innerHTML = '<option value="">-- Selecciona ejercicio --</option>';
            setNumeroInput.value = '';
            setPesoInput.value = '';
            setRepsInput.value = '';
        });

        muscleGroupSelect.addEventListener('change', function () {
            fillExerciseSelect(this.value);
        });

        addSetBtn.addEventListener('click', function () {
            const id = selectorSet.value;
            const nombre = selectorSet.options[selectorSet.selectedIndex].dataset.nombre;
            const setNumero = setNumeroInput.value;
            const peso = setPesoInput.value;
            const reps = setRepsInput.value;

            if (!id || !setNumero || !reps) {
                alert('Por favor, completa los campos obligatorios');
                return;
            }

            setsContainer.appendChild(createSetCard(id, nombre, setNumero, peso, reps));
            count++;
            updateSeriesCount();

            // Limpiar formulario
            setNumeroInput.value = '';
            setPesoInput.value = '';
            setRepsInput.value = '';
            selectorSet.value = '';
            muscleGroupSelect.value = '';

            // Cerrar modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('setsModal'));
            modal.hide();
        });

        // Inicializar
        document.addEventListener('DOMContentLoaded', function () {
            fillMuscleGroupSelect();
        });
    </script>
</x-app-layout>