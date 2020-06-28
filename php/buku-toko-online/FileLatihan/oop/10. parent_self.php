<?php
class handphone {
	public function tampil_pesan_handphone(){
		echo self::tampil_pesan();
		echo $this->tampil_pesan();
	}
	
	public function tampil_pesan(){
		return "Ini perangkat Handphone";
	}
}

class smartphone extends handphone{
	public function tampil_pesan_smartphone(){
		echo parent::tampil_pesan();
		echo $this->tampil_pesan();
	}
	
	public function tampil_pesan(){
		return " jenis Smartphone";
	}
}

$hp_halika = new smartphone();

$hp_halika->tampil_info_handphone();
echo "<br>";
$hp_halika->tampil_info_smartphone();
?>