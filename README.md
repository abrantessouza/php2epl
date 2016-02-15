# PHP2EPL

PHP2ELP is a short class that creates an EPL command and sends it to a remote shared Zebra© Printer

### Step By Step

### 1) Creating the object
Start by creating an ZebraPrinter object and setting the Host Printer,
speed, darkness (or tempeture), and the label size. The label size is an array composed by the Label height followed by the gap
width.

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
```
Write the content l at the (x, y) position with f font size. Be careful, the coordinates are expressed in "dots".

```sh
$z->setBarcode($code, $x, $y, $content)
```
Set the barcode codification (see the [manual][manual] at page 53), (x, y) possition and barcode value. Again, the coordinates are expressed in "dots".

```sh
$z->setLabelCopies($n);
```
After the label config is done, call this method to set the number of copies.  

```sh
$z->print2zebra();
```
This method generates the a temp *.prn with an EPL command and sends it to the remote Zebra© printer.


### Observations 
 - This code was tested in a Windows environment.
 - [PLEASE CHECK THE REFERENCE MANUAL][manual]
 [manual]:https://www.zebra.com/content/dam/zebra/manuals/en-us/printer/epl2-pm-en.pdf
