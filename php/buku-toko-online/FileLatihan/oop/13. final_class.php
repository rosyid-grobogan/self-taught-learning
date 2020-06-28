<?php
class handphone {
	final public function hidupkan(){
		return "Handphone dihidupkan";
	}
}

final class smartphone extends handphone{
	public function hidupkasn(){
		return "Smartphone dihidupkan";
	}
}

class hp_second extends smartphone{
	public function hidupkanw(){
		return "Handphone tidak dapat hidup";
	}
}
?>