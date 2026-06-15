<?php

namespace App\Http\Controllers;

use App\Helpers\GymHelper;
use App\Models\Rutina;
use App\Models\Ejercicio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RutinaController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $rutinas = $user->rutinas()
            ->with('ejercicios')
            ->paginate(5);

        return view('rutinas.index', compact('rutinas'));
    }

    public function create()
    {
        /** @var User $user */
        $user = Auth::user();

        $ejercicios = Ejercicio::with('musculos')->orderBy('nombre')->get();

        $ejerciciosJson = $ejercicios->map(fn($ej) => [
            'id'      => $ej->id,
            'nombre'  => $ej->nombre,
            'musculos'=> $ej->musculos->map(fn($m) => ['id' => $m->id, 'nombre' => $m->nombre])->toArray(),
        ]);

        return view('rutinas.create', compact('ejercicios', 'ejerciciosJson'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'              => 'required|string|max:150',
            'descripcion'         => 'nullable|string',
            'dia_semana'          => 'nullable|integer|between:1,7',
            'ejercicios'          => 'nullable|array',
            'ejercicios.*.id'     => 'exists:ejercicios,id',
            'ejercicios.*.sets'   => 'required_with:ejercicios|integer|min:1',
            'ejercicios.*.reps'   => 'required_with:ejercicios|integer|min:1',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $rutina = $user->rutinas()->create(
            $request->only('nombre', 'descripcion', 'dia_semana')
        );

        if ($request->ejercicios) {
            foreach ($request->ejercicios as $ej) {
                $rutina->ejercicios()->attach($ej['id'], [
                    'sets' => $ej['sets'],
                    'reps' => $ej['reps'],
                ]);
            }
        }

        return redirect()->route('rutinas.index')->with('success', 'Rutina creada correctament.');
    }

    public function show(Rutina $rutina)
    {
        abort_if($rutina->user_id !== Auth::id(), 403);
        $rutina->load('ejercicios.musculos');

        // Usar el helper per mostrar el dia de la setmana
        $nomDia = GymHelper::nomDia($rutina->dia_semana);

        return view('rutinas.show', compact('rutina', 'nomDia'));
    }

    public function edit(Rutina $rutina)
    {
        abort_if($rutina->user_id !== Auth::id(), 403);
        $ejercicios = Ejercicio::with('musculos')->orderBy('nombre')->get();
        $rutina->load('ejercicios');

        $ejerciciosJson = $ejercicios->map(fn($ej) => [
            'id'       => $ej->id,
            'nombre'   => $ej->nombre,
            'musculos' => $ej->musculos->map(fn($m) => ['id' => $m->id, 'nombre' => $m->nombre])->toArray(),
        ]);

        return view('rutinas.edit', compact('rutina', 'ejercicios', 'ejerciciosJson'));
    }

    public function update(Request $request, Rutina $rutina)
    {
        abort_if($rutina->user_id !== Auth::id(), 403);

        $request->validate([
            'nombre'              => 'required|string|max:150',
            'descripcion'         => 'nullable|string',
            'dia_semana'          => 'nullable|integer|between:1,7',
            'ejercicios'          => 'nullable|array',
            'ejercicios.*.id'     => 'exists:ejercicios,id',
            'ejercicios.*.sets'   => 'required_with:ejercicios|integer|min:1',
            'ejercicios.*.reps'   => 'required_with:ejercicios|integer|min:1',
        ]);

        $rutina->update($request->only('nombre', 'descripcion', 'dia_semana'));

        // Sincronitzar exercicis amb pivot
        $sync = [];
        if ($request->ejercicios) {
            foreach ($request->ejercicios as $ej) {
                $sync[$ej['id']] = ['sets' => $ej['sets'], 'reps' => $ej['reps']];
            }
        }
        $rutina->ejercicios()->sync($sync);

        return redirect()->route('rutinas.show', $rutina)->with('success', 'Rutina actualitzada correctament.');
    }

    public function destroy(Rutina $rutina)
    {
        abort_if($rutina->user_id !== Auth::id(), 403);
        $rutina->delete();
        return redirect()->route('rutinas.index')->with('success', 'Rutina eliminada.');
    }
}
