<?php
class handphone {
	const OS = "Android";
}

//mengakses dengan nama class
echo handphone::OS;

//mengakses dengan objek
$hp_daffa = new handphone();
echo "<br>$hp_daffa::OS";

//mengakses dengan variabel
$hp = "handphone";
echo "<br>$hp::OS";
?>