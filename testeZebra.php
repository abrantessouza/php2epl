<?php



include("classZebra.php");

$z = new ZebraPrinter;

$z->initLabel();
$z->setDarkness(3);
$z->setHost("\\amostras09\gc420tam09");
$z->setBarcode(1, 344, 80, "15A123548"); #1 -> cod128
$z->setLabel("VAI TESTE",344,30,4);
$z->setBarcode(1, 344, 230, "15A123548"); #1 -> cod128
$z->setLabel("VAI TESTE 2",344,180,4);
$z->finishLabel(1);
$z->generatePrn();

$z->print2zebra();



#shell_exec("copy teste2.prn /B \\\\10.10.0.168\\desktop10")

?>