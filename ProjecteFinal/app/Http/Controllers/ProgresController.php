<?php

namespace App\Http\Controllers;

use App\Helpers\GymHelper;
use App\Models\Ejercicio;
use App\Models\EntrenoSet;
use Illuminate\Http\Request;

class ProgresController extends Controller
{
    public function index()
    {
        $ejercicios = Ejercicio::orderBy('nombre')->get();
        return view('progres.index', compact('ejercicios'));
    }

    public function show($ejercicio_id)
    {
        $ejercicio = Ejercicio::findOrFail($ejercicio_id);

        $sets = EntrenoSet::where('ejercicio_id', $ejercicio_id)
            ->whereHas('entreno', fn($q) => $q->where('user_id', auth()->id()))
            ->with('entreno')
            ->orderBy('created_at')
            ->get();

        // Màxim pes per data — usar helper per formatar
        $datos = $sets->groupBy(fn($s) => $s->entreno->fecha)
            ->map(fn($grup) => $grup->max('peso'));

        // Volum total acumulat per data
        $volumPerData = $sets->groupBy(fn($s) => $s->entreno->fecha)
            ->map(fn($grup) => GymHelper::volumTotal($grup));

        // Màxim pes formatat amb el helper
        $maxPesFormatat = GymHelper::formatPes((float) $datos->max());

        return view('progres.show', compact('ejercicio', 'datos', 'volumPerData', 'maxPesFormatat'));
    }
}
