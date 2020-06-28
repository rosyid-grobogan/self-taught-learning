<?php
class handphone {
	var $jml_pulsa;
	
	function mengirim_pesan(){
		$this->jml_pulsa -= 150;
	}
}

$hp_latif = new handphone();
$hp_latif->jml_pulsa = 1500;

echo "Jumlah pulsa Latif ";
echo $hp_latif->jml_pulsa;
echo "<br>";

$hp_latif->mengirim_pesan();

echo "Jumlah pulsa sekarang ";
echo $hp_latif->jml_pulsa;
?>