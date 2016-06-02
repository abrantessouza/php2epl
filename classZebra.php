<?php
#BEFORE EDIT THE LABEL CODE, PLEASE CHECK THE REFERENCE MANUAL https://www.zebra.com/content/dam/zebra/manuals/en-us/printer/epl2-pm-en.pdf
#IF IT'S COMPLICATED TO UNDERSTAND HOW THE EPL LANGUAGE WORKS, DOWNLOAD THE ZEBRADESIGNER, CREATE A LABEL AND EXPORT THE READY CODE.
class ZebraPrinter {
	
	public $host;	
	public $storeLabel = array();
	private $label;
	private $prnFile;
	public $darkness;
	public $speed;
	public $configSizeLabel;
	public $referencePoint
	
	
	function __construct($hostPrinter, $speedPrinter, $darknessPrint, $configSizeLabel, $referencePoint){
		$this->host = $hostPrinter;
		$this->speed = $speedPrinter;
		$this->darkness = $darknessPrint;
		$this->configSizeLabel = $configSizeLabel;
		$this->referencePoint = $referencePoint;
		$this->prnFile = "label_gen".rand().".prn";
		$this->initLabel();
	}
	
	public function initLabel(){
		$hl = $this->configSizeLabel;
		$ref = $this->referencePoint;
		$initLabel =  "I8,A,001\n\n"; #CHARSET -> CHECK THE MANUAL REFERENCE
		//$initLabel .= "Q240,024\n"; #SET THE HEIGHT SIZE OF LABEL, AND THE HEIGHT SIZE OF THE GAP LABEL
		$initLabel .= "Q$hl[0],$hl[1]\n";
		$initLabel .= "q831\n"; #printable width area
		$initLabel .= "rN\n"; 
		$initLabel .= "S".$this->speed."\n"; #SET THE PRINTING SPEED
		$initLabel .= "D".$this->darkness."\n"; #SET DARKNESS PRINTING
		$initLabel .= "ZT\n"; #START PRINT ON TOP OR THE BOTTOM OF THE LABEL
		$initLabel .= "JF\n"; 
		$initLabel .= "OD\n"; #HARDWARE OPTION, CHECK THE DOCUMENTATION
		$initLabel .= "R$ref[0],$ref[1]\n"; #Use this command to move the reference point for the X and Y axes	
		$initLabel .= "f100\n";	#CUT POSITION
		$initLabel .= "N\n"; # CLEAR PREVIOUS IMAGE BUFFER FROM PRINTER.		
		array_push($this->storeLabel, $initLabel);
	}
	
		
	public function writeLabel($l,$x,$y,$f){		
		$label = sprintf("A%s,%s,2,%s,1,1,N,'%s'\n", $x,$y,$f,$l); 
		$label = str_replace("'", '"', $label);
		array_push( $this->storeLabel, $label);
	}
	
	
	
	public function setBarcode($code, $x, $y, $content){
		$barCode =  sprintf("B%s,%s,2,%s,2,6,45,N,'%s'\n", $x,$y,$code,$content); 
		$barCode = str_replace("'", '"', $barCode);			
		array_push($this->storeLabel, $barCode);
	}
	
		
	private function generatePrn(){
		$this->generateLabel();
		$prn = fopen($this->prnFile, "w");
		fwrite($prn,$this->label);
		fclose($prn);
	}
	
	public function setLabelCopies($numCopies){
		$label = "P$numCopies\n";
		array_push($this->storeLabel, $label);		
	}
	
	private function generateLabel(){
	     $this->label = join("",$this->storeLabel);		 
	}
	
	public function print2zebra(){
		$this->generatePrn();
		$host = str_replace("\\","\\\\",$this->host);
		#$host = $this->host;
		echo $host;
		shell_exec("copy ".$this->prnFile." /B ".$host."");
		unlink($this->prnFile);
	}
}

?>
