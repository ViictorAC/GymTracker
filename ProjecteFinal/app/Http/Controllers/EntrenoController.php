<?php

namespace App\Http\Controllers;

use App\Helpers\GymHelper;
use App\Models\Entreno;
use App\Models\EntrenoSet;
use App\Models\Ejercicio;
use App\Models\Rutina;
use Illuminate\Http\Request;

class EntrenoController extends Controller
{
    public function index()
    {
        $entrenos = auth()->user()->entrenos()
            ->with('rutina')
            ->orderBy('fecha', 'desc')
            ->paginate(5);

        return view('entrenos.index', compact('entrenos'));
    }

    public function create()
    {
        $rutinas    = auth()->user()->rutinas()->with('ejercicios.musculos')->get();
        $ejercicios = Ejercicio::with('musculos')->orderBy('nombre')->get();

        $ejerciciosJson = $ejercicios->map(fn($ej) => [
            'id'       => $ej->id,
            'nombre'   => $ej->nombre,
            'musculos' => $ej->musculos->map(fn($m) => ['id' => $m->id, 'nombre' => $m->nombre])->toArray(),
        ]);

        $rutinasJson = $rutinas->map(fn($rut) => [
            'id'         => $rut->id,
            'ejercicios' => $rut->ejercicios->map(fn($ej) => [
                'id'       => $ej->id,
                'nombre'   => $ej->nombre,
                'musculos' => $ej->musculos->map(fn($m) => ['id' => $m->id, 'nombre' => $m->nombre])->toArray(),
            ])->toArray(),
        ]);

        return view('entrenos.create', compact('rutinas', 'ejercicios', 'ejerciciosJson', 'rutinasJson'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha'                   => 'required|date',
            'rutina_id'               => 'nullable|exists:rutinas,id',
            'comentario'              => 'nullable|string',
            'sets'                    => 'required|array|min:1',
            'sets.*.ejercicio_id'     => 'required|exists:ejercicios,id',
            'sets.*.set_numero'       => 'required|integer|min:1',
            'sets.*.peso'             => 'nullable|numeric|min:0',
            'sets.*.reps'             => 'required|integer|min:1',
        ]);

        $entreno = auth()->user()->entrenos()->create(
            $request->only('fecha', 'rutina_id', 'comentario')
        );

        foreach ($request->sets as $set) {
            $entreno->sets()->create($set);
        }

        return redirect()->route('entrenos.index')->with('success', 'Entreno registrat correctament.');
    }

    public function show(Entreno $entreno)
    {
        abort_if($entreno->user_id !== auth()->id(), 403);
        $entreno->load('sets.ejercicio', 'rutina');

        // Usar el helper per calcular el volum total de l'entreno
        $volumTotal = GymHelper::volumTotal($entreno->sets);

        // Calcular 1RM estimat per a cada set
        $setsAmbRm = $entreno->sets->map(function ($set) {
            $set->rm_estimat = GymHelper::estimarUnRM((float)($set->peso ?? 0), (int)$set->reps);
            return $set;
        });

        return view('entrenos.show', compact('entreno', 'volumTotal', 'setsAmbRm'));
    }

    public function destroy(Entreno $entreno)
    {
        abort_if($entreno->user_id !== auth()->id(), 403);
        $entreno->delete();
        return redirect()->route('entrenos.index')->with('success', 'Entreno eliminat.');
    }
}
