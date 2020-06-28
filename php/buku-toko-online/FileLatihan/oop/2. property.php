<?php
class handphone {
	var $merk;
	var $tipe;
	var $jml_pulsa;
	
	function mengirim_pesan(){
		$this->jml_pulsa -= 150;
	}
}

$handphone_fatih = new handphone();
$handphone_daffa = new handphone()
?>