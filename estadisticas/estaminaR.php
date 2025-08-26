<?php
require_once 'estadisticas.php';

function calculaEstamina(float $PDE, float $altura, float $peso, float $edad): float{
    $IMC = calculaIMC($peso, $altura);
    if ($edad>35) {
        $FactorEdad = (1- (($edad-35)*0.02));
    } elseif ($edad>=20) {
        $FactorEdad = (1 - (($edad-27)*0.001));
    } elseif ($edad <20) {
        $FactorEdad = (1 - (abs($edad-20)*0.05));
    };
    $FactorIMC = ((6* $FactorEdad) - max((abs($IMC - 21.7)*0.1), 0.5));
    return round((min(($PDE * $FactorIMC), 300)) * 20);
}












