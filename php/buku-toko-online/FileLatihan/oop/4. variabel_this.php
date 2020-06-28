<?php
class handphone {
	var $jml_pulsa;
	
	function mengirim_pesan(){
		$this->jml_pulsa -= 150;
	}
}

$hp_latif = new handphone();
$hp_latif->jml_pulsa = 1500;

$hp_daffa = new handphone();
$hp_daffa->jml_pulsa = 2000;

echo "Jumlah pulsa Latif ";
echo $hp_latif->jml_pulsa;
echo "<br>";

$hp_daffa->mengirim_pesan();

echo "Jumlah pulsa Latif sekarang ";
echo $hp_latif->jml_pulsa;
?>