# PHP2EPL

PHP2ELP is a short class that creates an EPL command and sends it to a remote shared Zebra© Printer

### Step By Step

### 1) Creating the object
Start by creating an ZebraPrinter object and setting the Host Printer,
speed, darkness (or tempeture), the label size and reference point. The label size is an array composed by the Label height followed by the gap
width.

```sh
$hostPrinter = "\\computername\sharedprintername";
$speedPrinter = 4;
$darknessPrint = 2;
$labelSize = array(240,024);
$referencePoint = array(215,15);
$z = new ZebraPrinter($hostPrinter, $speedPrinter, $darknessPrint, $labelSize,$referencePoint);
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

 ###
 
 
# The MIT License (MIT)
###
Copyright (c) 2016  Thiago Abrantes de C. Souza, <abrantes.souza@gmail.com>
###
Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:
###
The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
###
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

        
          
=======
 - This code was tested in a Windows environment.
 - [PLEASE CHECK THE REFERENCE MANUAL][manual]
 [manual]:https://www.zebra.com/content/dam/zebra/manuals/en-us/printer/epl2-pm-en.pdf

