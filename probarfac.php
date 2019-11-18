<?php
//tinker.php

use App\Afip\Wsaa;
use App\Afip\Wsfev1;
use App\Afip\Wsafip;
$CUIT = "20180834711";
$MODO = 0;
$afip = new Wsfev1($CUIT,$MODO);
$result = $afip->consultarUltimoComprobanteAutorizado(1, 1);
