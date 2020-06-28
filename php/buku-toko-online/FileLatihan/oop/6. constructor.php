<?php
class handphone {
	var $jml_pulsa;
	
	function __construct($pulsa){
		$this->jml_pulsa = $pulsa;
	}
			
	function mengirim_pesan($tarif, $jml_pesan=1){
		$this->jml_pulsa -= $tarif*$jml_pesan;
	}
		
	function __destruct(){
		echo "Jumlah pulsa sekarang ";
		echo $this->jml_pulsa;
	}
}

$hp_latif = new handphone(2000);

echo "Jumlah pulsa Latif ";
echo $hp_latif->jml_pulsa;
echo "<br>";

$hp_latif->mengirim_pesan(150);
?>