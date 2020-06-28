<?php
interface sim_card{
	public function aktivasi();
	function isi_pulsa();
}

interface memory_card{
	function format();
}

class handphone implements sim_card{
	public function aktivasi(){
		return "Kartu telah aktif";
	}
	
	public function isi_pulsa(){
		return "Pulsa telah diisi";
	}
}

class smartphone implements sim_card, memory_card{
	public function aktivasi(){
		return "Kartu telah aktif";
	}
	
	public function isi_pulsa(){
		return "Pulsa telah diisi";
	}
	
	public function format(){
		return "Memory card telah diformat";
	}
}

?>