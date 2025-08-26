<?php
require_once 'estadisticas.php';


function calculaFactorEdad(float $edad): float{
    if ($edad < 20) {
        $factoredad = 1 - (abs($edad - 20)*0.005);
    } elseif ($edad >= 20 && $edad <= 30) {
        $factoredad = 1 - (abs($edad - 25)* 0.001); 
    } elseif ($edad > 30 && $edad <= 45) {
        $factoredad =  1 - (($edad - 30)*0.01);
    } elseif ($edad > 45 && $edad <= 55) {
        $factoredad = 1 - (($edad - 30)*0.003);
    } elseif ($edad > 55) {
        $factoredad = 1 - (($edad - 30)*0.05);
    } elseif ($edad < 12) {
        $factoredad = 0.75;
    }
return $factoredad;
};

function calculaFactorEntrenamiento(float $PDE): float{
    return 0.8 + ($PDE * 0.024);
}

function calculaFuerza(float $edad, Float $peso, Float $altura, float $PDE): float{
    $FactorEdad = calculaFactorEdad($edad);
    $MMTotal = calculaMasaMagra($peso, $altura, $PDE);
    $FactorEntrenamiento = calculaFactorEntrenamiento($PDE);
    return round(($MMTotal*$FactorEdad) * ($FactorEntrenamiento * 1));
}



?>