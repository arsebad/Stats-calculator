<?php
require_once 'estadisticas.php';
require_once 'fuerza.php';

function calculaSancada(float $altura, float $PDE):float {
    $factorEntrenamiento = $PDE * 0.2;
    return $altura * (1.1 + $factorEntrenamiento);
}

function calculaRelacionFP(float $peso, float $altura, float $edad, float $PDE): float {
    $fuerza = calculaFuerza($edad, $peso, $altura, $PDE);
    return ($fuerza/$peso)*2;
}

function calculaVelocidad(float $peso, float $altura, float $edad, float $PDE): float{
    $sancada = calculaSancada($altura, $PDE);
    $RfuerzaPeso = calculaRelacionFP($peso, $altura, $edad, $PDE);
    return round(($sancada * $RfuerzaPeso), 1);
}





?>
