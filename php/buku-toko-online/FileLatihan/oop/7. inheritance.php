<?php
class handphone {
	public $merk;
	public $os;
		
	public function hidupkan(){
		return "Menghidupkan HP $this->merk";
	}
}

class smartphone extends handphone{
	public function info_hp(){
		return "Merk: $this->merk, OS: $this->os";
	}
}

$hp_nabil = new smartphone();

$hp_nabil->merk = "Samsung";
$hp_nabil->os = "Android";

echo $hp_nabil->hidupkan();
echo "<br>";
echo $hp_nabil->info_hp();
?>