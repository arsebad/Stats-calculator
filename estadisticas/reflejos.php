<?php
require_once 'estadisticas.php';

function calculaReflejos(float $PDE, float $altura, float $peso): float{
    $IMC = calculaIMC($peso, $altura);
    $factorIMC = abs($IMC - 22)*15;
    return round((300 + $factorIMC) - (3*$PDE));
}

