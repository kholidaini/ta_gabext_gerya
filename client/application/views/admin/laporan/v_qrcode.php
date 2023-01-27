<?php
require_once(APPPATH.'vendor/Amellia/escpos-php/autoload.php');
use Amellia\Escpos\Printer;
use Amellia\Escpos\EscposImage;
use Amellia\Escpos\PrintConnectors\WindowsPrintConnector;


$b=$data->row_array();
$connector = new WindowsPrintConnector("POS58"); //
$printer = new Printer($connector);
$testStr =($b['barang_id']);
$sizes = array(
    8 => "(maximum)");
foreach ($sizes as $size => $label) {
    $printer -> qrCode($testStr, Printer::QR_ECLEVEL_L, $size);
    $printer -> text($b['barang_nama']);
    $printer -> setJustification();
    $printer -> feed(2);


}
$printer -> close();
?>
