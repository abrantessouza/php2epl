<?php

class ZebraPrinter {
	
	public $host;	
	public $storeLabel = array();
	private $label;
	private $prnFile = "label_gen.prn";
	public $darkness = 7;
	
	public function setHost($h){
		$this->host = $h;
	}
	
	public function initLabel(){
		$initLabel =  "I8,A,001\n\n";
		$initLabel .= "Q240,024\n";
		$initLabel .= "q831\n";
		$initLabel .= "rN\n";
		$initLabel .= "S4\n";
		$initLabel .= "ZT\n";
		$initLabel .= "JF\n";
		$initLabel .= "OD\n";
		$initLabel .= "R175,0\n";			
		$initLabel .= "f100\n";			
		$initLabel .= "N\n";
		
		array_push($this->storeLabel, $initLabel);
	}
	
	public function setDarkness($d){
		$setDarkLabel = "D".$d."\n";
		array_push($this->storeLabel,$setDarkLabel); 
	}
	
	public function setLabel($l,$x,$y,$f){		
		$label =   sprintf("A%s,%s,2,%s,1,1,N,'%s'\n",
							$x,$y,$f,$l); 
		$label = str_replace("'", '"', $label);
		array_push( $this->storeLabel, $label);
	}
	
	
	
	public function setBarcode($code, $x, $y, $conteudo){
		$barCode =   sprintf("B%s,%s,2,%s,2,6,45,N,'%s'\n",
							$x,$y,$code,$conteudo); 
		$barCode = str_replace("'", '"', $barCode);		
		
		array_push($this->storeLabel, $barCode);
	}
	
		
	public function generatePrn(){
		$this->generateLabel();
		$prn = fopen($this->prnFile, "w");
		fwrite($prn,$this->label);
		fclose($prn);
	}
	
	public function finishLabel($numCopies){
		$label = "P$numCopies\n";
		array_push($this->storeLabel, $label);
		
	}
	
	private function generateLabel(){
	     $this->label = join("",$this->storeLabel);		 
	}
	
		

	
	public function print2zebra(){
		$host = str_replace("\\","\\\\",$this->host);
		echo $host;
		shell_exec("copy ".$this->prnFile." /B ".$host."");
	}
}

?>
