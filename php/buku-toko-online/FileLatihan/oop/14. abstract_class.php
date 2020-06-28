<?php
abstract class handphone {
	abstract public function hidupkan();
	
	public function info_hp($merk){
		return "Merk Handphone: $merk";
	}
}

class smartphone extends handphone{
	public function hidupkan(){
		return "Smartphone dihidupkan";
	}
}

//$hp_daffa = new smartphone();
$hp_daffa = new handphone();
echo $hp_daffa->hidupkan();
?>