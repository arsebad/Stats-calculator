<?php
require_once 'estadisticas.php';

function calculaVitalidad(float $edad, float $PDE, float $altura): float{
    $masaMagra = calculaMasaMagra($PDE, $altura);
    if ($edad < 20) {
        $PenalizacionEdad = abs($edad - 20) * 0.5;
    } elseif ($edad >= 20 && $edad <= 30) {
        $PenalizacionEdad = abs($edad - 25) * 0.2;
    } elseif ($edad > 30 && $edad <= 40) {
        $PenalizacionEdad = ($edad - 20) * 0.5;
    }elseif ($edad > 40 && $edad <= 50) {
        $PenalizacionEdad = ($edad - 20);
    } elseif ($edad > 50) {
        $PenalizacionEdad = ($edad - 20) * 1.5;
    }
    return round(($masaMagra * max((70-$PenalizacionEdad), 35)/2));
}









