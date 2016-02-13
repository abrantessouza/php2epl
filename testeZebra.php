<?php

include("classZebra.php");

$hostPrinter = "\\computername\sharedprintername";
$speedPrinter = 4;
darknessPrint = 2;

$z = new ZebraPrinter($hostPrinter, $speedPrinter, $darknessPrint);

$z->setBarcode(1, 344, 80, "ContentBarCode"); #1 -> cod128
$z->writeLabel("TestLabel",344,30,4);
$z->setBarcode(1, 344, 230, "ContentBarCode"); #1 -> cod128
$z->writeLabel("TestLabel",344,180,4);
$z->setLabelCopies(1);

$z->print2zebra();



?>
