<?php

include './Billetera.php';
include './Decorator.php';
include './BilleteraPesos.php';
include './programa_secreto.php';



$miBilletera = new BilleteraPesos();

$miBilletera = new Decorator ($miBilletera);
$miBilletera = programa_secreto($miBilletera);

$miBilletera->mostrarEstadistica();
$miBilletera->mostrarTotal();