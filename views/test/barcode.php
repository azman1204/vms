<div id="showBarcode"></div>

<?php
use barcode\barcode\BarcodeGenerator as BarcodeGenerator;

$options = array(
    'elementId' => 'showBarcode', /* div or canvas id */
    'value' => '4797001018719', /* value for EAN 13 be careful to set right values for each barcode type */
    'type' => 'ean13', /* supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix */
);

echo BarcodeGenerator::widget($options);
?>

