<?php

namespace App\Http\Controllers;
 
use App\Helpers\GymHelper;
use App\Models\Ejercicio;
use Illuminate\Http\Request;
 
class EjercicioController extends Controller
{
    public function index()
    {
        $ejercicios = Ejercicio::with('musculos')
            ->orderBy('nombre')
            ->get();
 
        return view('ejercicios.index', compact('ejercicios'));
    }
 
    public function show(Ejercicio $ejercicio)
    {
        $ejercicio->load('musculos');
        return view('ejercicios.show', compact('ejercicio'));
    }
}
 