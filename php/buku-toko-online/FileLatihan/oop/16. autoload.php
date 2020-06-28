<?php
function __autoload($className){
	require_once str_replace("\\", "/", $className).".php";
}

$hpku = new library\Handphone();
$hpku->isi_pulsa();
?>