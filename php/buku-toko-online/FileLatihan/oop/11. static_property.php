<?php
class handphone {
	protected static function info_handphone(){
		return "Ini perangkat Handphone";
	}
}

class smartphone extends handphone{
	private static function info_smartphone(){
		return " jenis Smartphone";
	}
	
	public static function tampil_info(){
		echo parent::info_handphone();
		echo self::info_smartphone();
	}
}

smartphone::tampil_info();
?>