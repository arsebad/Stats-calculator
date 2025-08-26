<?php

require_once 'estadisticas/estadisticas.php';
require_once 'estadisticas/vitalidad.php';
require_once 'estadisticas/estaminaR.php';
require_once 'estadisticas/fuerza.php';
require_once 'estadisticas/velocidad.php';
require_once 'estadisticas/reflejos.php';

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------

$pjedad = $_GET['pjedad']?? null;
$pjestatura = $_GET['pjestatura']?? null;
$pjpeso = $_GET['pjpeso']?? null;
$pjentrenamiento = $_GET['pjPDE']?? null;
$penalizacion = $_GET['penalizacion']?? null;


if (empty($pjpeso) || empty($pjestatura)) {
    die("Error: Debes ingresar un peso y una altura válidos. <br> <a href='index.php'><button>Volver</button></a>");
}


$pjaltura = $pjestatura * 0.01;

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
$dataIMC = calculaIMC($pjpeso, $pjaltura);
$dataPesoMinimo = calculaPesoMinimo($pjaltura, $pjentrenamiento, $pjedad);
$dataPesoMaximo = calculaPesoMaximo($pjaltura, $pjentrenamiento);
$dataIndiceDGC = calculaIndiceDGC($pjpeso, $pjaltura, $pjentrenamiento);
//-------------------------------------------------------------------------------------------
if ($pjpeso < $dataPesoMinimo && $penalizacion == NULL) {
    $penalizacion = round(2*($dataPesoMinimo - $pjpeso));
   echo 'ADVERTENCIA: ' . $pjpeso . 'Kg. no es un peso adecuado.<br>
          Coloque un peso por encima de ' . $dataPesoMinimo . 'kg.<br>
          Penalización: ' . $penalizacion . '% por desnutrición.<br><br>
          <a href="index.php"><button>Volver</button></a>
          <a href="calcular.php?pjedad='.$pjedad.'&pjestatura='.$pjestatura.'&pjpeso='.$pjpeso.'&pjPDE='.$pjentrenamiento.'&penalizacion='.$penalizacion.'">
              <button>Continuar a pesar de todo</button>
          </a>';
    exit;
//--------------------------------------------------------------------------
} elseif ($pjpeso > $dataPesoMaximo && $penalizacion == NULL) {
    $penalizacion = round(2*($pjpeso - $dataPesoMaximo));
    echo 'ADVERTENCIA: ' . $pjpeso . 'Kg. no es un peso adecuado.<br>
          Coloque un peso por debajo de ' . $dataPesoMaximo . 'kg.<br>
          Penalización: ' . $penalizacion . '% por sobrepeso.<br><br>
          <a href="index.php"><button>Volver</button></a>
          <a href="calcular.php?pjedad='.$pjedad.'&pjestatura='.$pjestatura.'&pjpeso='.$pjpeso.'&pjPDE='.$pjentrenamiento.'&penalizacion='.$penalizacion.'">
              <button>Continuar a pesar de todo</button>
          </a>';
    exit;
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
} else {
if (!empty($penalizacion)) {
    $factor = (100 - $penalizacion) / 100;
} else {
    $factor = 1;
}
$estamina = round($factor * calculaEstamina($pjentrenamiento,$pjaltura, $pjpeso, $pjedad));
$velocidad = round($factor * calculaVelocidad($pjpeso, $pjaltura, $pjedad, $pjentrenamiento), 2);
$vitalidad = round($factor * calculaVitalidad($pjedad, $pjentrenamiento, $pjaltura));
$reflejos = round($factor * calculaReflejos($pjentrenamiento, $pjaltura, $pjpeso));
$fuerza = round($factor * calculaFuerza($pjedad, $pjpeso, $pjaltura, $pjentrenamiento));
$energia = round($factor * max(($pjedad - 15), 0));

?>
<table>
    <tr>
        <td>ESTADISTICA</td>
        <td>VALOR</td>
    </tr>
    <tr>
        <td>vitalidad</td>
        <td><?php echo $vitalidad;?> - ml. de sangre</td>
    </tr>
    <tr>
        <td>Energia</td>
        <td><?php echo $energia;?> - Unidades Magicas</td>
    </tr>
    <tr>
        <td>Fuerza</td>
        <td><?php echo $fuerza;?> - Kilogramos(Fuerza)</td>
    </tr>
    <tr>
        <td>Reflejos</td>
        <td><?php echo $reflejos;?> - milisegundo</td>
    </tr>
    <tr>
        <td>Resistencia</td>
        <td><?php echo $estamina;?> - Segundos</td>
    </tr>
    <tr>
        <td>Velocidad</td>
        <td><?php echo $velocidad;?> - Metros por segundo</td>
    </tr>
</table>

<button onclick="location.href='index.php'">Volver</button>

<?php
}
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------








?>