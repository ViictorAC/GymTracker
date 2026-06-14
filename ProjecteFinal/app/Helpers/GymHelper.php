<?php

namespace App\Helpers;

/**
 * Helper: GymHelper
 * Funcions reutilitzables per a l'aplicació GymTracker.
 */
class GymHelper
{
    /**
     * Calcula el volum total d'un conjunt de series (pes × reps sumats).
     * Útil per comparar la càrrega total d'un entreno o exercici concret.
     *
     * @param  iterable  $sets  Col·lecció de sets amb propietats 'peso' i 'reps'
     * @return float  Volum total en kg
     */
    public static function volumTotal(iterable $sets): float
    {
        $total = 0.0;
        foreach ($sets as $set) {
            $total += (float)($set->peso ?? 0) * (int)($set->reps ?? 0);
        }
        return round($total, 2);
    }

    /**
     * Retorna el nom del dia de la setmana a partir d'un número (1–7).
     * Usat a la vista de rutines per mostrar el dia assignat.
     *
     * @param  int|null  $dia  Número del dia (1=Dilluns, 7=Diumenge)
     * @return string
     */
    public static function nomDia(?int $dia): string
    {
        $dies = [
            1 => 'Dilluns',
            2 => 'Dimarts',
            3 => 'Dimecres',
            4 => 'Dijous',
            5 => 'Divendres',
            6 => 'Dissabte',
            7 => 'Diumenge',
        ];
        return $dies[$dia] ?? '—';
    }

    /**
     * Formata el pes màxim registrat d'una sèrie com a text llegible.
     * Retorna '— kg' si no n'hi ha cap.
     *
     * @param  float|null  $maxPes
     * @return string
     */
    public static function formatPes(?float $maxPes): string
    {
        if ($maxPes === null || $maxPes <= 0) {
            return '— kg';
        }
        return number_format($maxPes, 1) . ' kg';
    }

    /**
     * Calcula la intensitat estimada d'un set a partir del pes i les reps
     * usant la fórmula de Brzycki (1RM estimat).
     *
     * @param  float  $pes   Pes utilitzat (kg)
     * @param  int    $reps  Nombre de repeticions
     * @return float  1RM estimat (kg)
     */
    public static function estimarUnRM(float $pes, int $reps): float
    {
        if ($reps <= 0) return 0.0;
        if ($reps === 1) return $pes;
        return round($pes * (36 / (37 - $reps)), 2);
    }
}
