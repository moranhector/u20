<?php
//tinker.php

use App\Afip\Wsaa;
use App\Afip\Wsfev1;
use App\Afip\Wsafip;

$CUIT = "20180834711";
$MODO = 0;
$afip = new Wsfev1($CUIT,$MODO);
$result = $afip->consultarUltimoComprobanteAutorizado(1, 1);
$voucher = Array(
    "idVoucher" => 1,
    "numeroComprobante" => 165, // Debe estar sincronizado con el último número de AFIP
    "numeroPuntoVenta" => 1,
    "cae" => 0,
    "letra" => "A",
    "fechaVencimientoCAE" => "",
    "tipoResponsable" => "IVA Responsable Inscripto",
    "nombreCliente" =>  "REVITE SA",
    "domicilioCliente" => "Acceso Este y Chacón",
    "fechaComprobante" => "20190721",
    "codigoTipoComprobante" => 1,
    "TipoComprobante" => "Factura",
    "codigoConcepto" => 1,
    "codigoMoneda" => "PES",
    "cotizacionMoneda" => 1.000,
    "fechaDesde" => "20190721",
    "fechaHasta" => "20190721",
    "fechaVtoPago" => "20190721",
    "codigoTipoDocumento" => 80,
    "TipoDocumento" => "DNI",
    "numeroDocumento" => "30690236040", // Debe ser diferente al CUIT emisor
    "importeTotal" => 121.000,
    "importeOtrosTributos" => 0.000,
    "importeGravado" => 100.000,
    "importeNoGravado" => 0.000,
    "importeExento" => 0.000,
    "importeIVA" => 21.000,
    "codigoPais" => 200,
    "idiomaComprobante" => 1,
    "NroRemito" => 0,
    "CondicionVenta" => "Efectivo",
    "items" => Array
        (
            0 => Array
                (
                    "codigo" => 112233445566,
                    "scanner" => 112233445566,
                    "descripcion" => 'Producto de prueba',
                    "codigoUnidadMedida" => 7,
                    "UnidadMedida" => "Unidades",
                    "codigoCondicionIVA" => 5,
                    "Alic" => 21,
                    "cantidad" => 1.00,
                    "porcBonif" => 0.000,
                    "impBonif" => 0.000,
                    "precioUnitario" => 100.00,
                    "importeIVA" => 21.000,
                    "importeItem" => 121.00,
                )
        ),
    "subtotivas" => Array
        (
            0 => Array
                (
                    "codigo" => 5,
                    "Alic" => 21,
                    "importe" => 21.00,
                    "BaseImp" => 100.00,
                )
        ),
    "Tributos" => Array(),
    "CbtesAsoc" => Array()
);
$result = $afip->emitirComprobante($voucher);
print_r($result);

