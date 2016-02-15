# PHP2EPL

PHP2ELP is a short class that creates a EPL code and foward send to the remote shared Zebra© Printer

### Step By Step

### 1) Creating the object
To start your job, you just need to create the object ZebraPrinter setting the Host Printer,
speed, darkness (or tempeture), and the label size (The label size are the height size label and the height size of the gap label).
```sh
$hostPrinter = "\\computername\sharedprintername";
$speedPrinter = 4;
$darknessPrint = 2;
$labelSize = array(240,024);
$z = new ZebraPrinter($hostPrinter, $speedPrinter, $darknessPrint, $labelSize);
```

### 2) Calling the methods
```sh
$z->writeLabel($l,$x,$y,$f);
//Write the content, x position, y position and font size. Be careful, the positions counts are in "dots".
```
```sh
$z->setBarcode($code, $x, $y, $content)
//Set the barcode codification, x position, y position and barcode value. Be careful, the positions counts are in "dots".
```
```sh
$z->setLabelCopies($n);
//After to make the label config, call this method to set the EPL code the number of copies to print.  
```
```sh
$z->print2zebra();
//This method generate the a temp *.prn with a EPL code and send to the remote Zebra© printer.
```

### Observations 
This code hasn't been tested in linux enviroment yet.
PLEASE CHECK THE REFERENCE MANUAL on the link [https://www.zebra.com/content/dam/zebra/manuals/en-us/printer/epl2-pm-en.pdf]