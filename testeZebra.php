<?php



include("classZebra.php");

$z = new ZebraPrinter;

$z->initLabel();
$z->setDarkness(3);
$z->setHost("\\computername\sharedprintername");
$z->setBarcode(1, 344, 80, "ContentBarCode"); #1 -> cod128
$z->setLabel("TestLabel",344,30,4);
$z->setBarcode(1, 344, 230, "15A123548"); #1 -> cod128
$z->setLabel("TestLabel",344,180,4);
$z->finishLabel(1);
$z->generatePrn();

$z->print2zebra();



?>
