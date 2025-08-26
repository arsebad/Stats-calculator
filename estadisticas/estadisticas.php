<?php
    
function clamp($valor, $min, $max) {
    return max($min, min($valor, $max));
}

function calculaFFMI(float $PDE): float{
    return round(18+($PDE*0.1),2);
}

function calculaMasaMagra(float $PDE, $altura): float{
    $FFMI = calculaFFMI($PDE);
    return round($FFMI*pow($altura,2),2);
}

function calculaGCminima(float $PDE, $edad): float{
    $factorEdad30 = (max(($edad-30), 0)*0.002); 
    $GrasaBase = min(14+($edad-20)*(0.3-$factorEdad30), 25) ;
    return  (max(($GrasaBase - (($PDE * 0.05))), 11));
}

function calculaPesoMinimo(float $altura, float $PDE, float $edad): float {
    $grasa = calculaGCminima($PDE, $edad);
    $Masa = calculaMasaMagra($PDE, $altura);
    return round($Masa * (1/(1-($grasa/100))), 2); //
}

function calculaPesoMaximo(float $altura, float $PDE): float {
    $Masa = calculaMasaMagra($PDE, $altura);
    return round($Masa * 1.3333, 2);
}

function calculaIndiceDGC(float $peso, float $altura, float $PDE): float {
    $PesoMaximo = calculaPesoMaximo($altura, $PDE);
    return $peso-$PesoMaximo;
}

function calculaIMC (float $peso, float $altura): float {
    return round( $peso / (pow($altura, 2)), 2);
};



