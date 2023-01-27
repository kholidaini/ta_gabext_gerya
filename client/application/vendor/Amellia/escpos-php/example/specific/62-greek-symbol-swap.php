<?php
require __DIR__ . '/../../autoload.php';
use Amellia\Escpos\Printer;
use Amellia\Escpos\PrintConnectors\FilePrintConnector;
use Amellia\Escpos\CapabilityProfiles\DefaultCapabilityProfile;

$connector = new FilePrintConnector("php://stdout");
$profile = DefaultCapabilityProfile::getInstance();
$printer = new Printer($connector, $profile);

$printer -> text("Μιχάλης Νίκος\n");
$printer -> cut();
$printer -> close();

?>
