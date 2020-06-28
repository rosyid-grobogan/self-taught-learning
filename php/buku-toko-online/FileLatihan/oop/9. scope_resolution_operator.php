<?php
class handphone {
	public function info_hp($merk){
		return "Merk HP: $merk";
	}
}

echo handphone::info_hp("Oppo");
?>