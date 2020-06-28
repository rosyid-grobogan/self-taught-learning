<?php
function format_rupiah($angka){
	$hasil = number_format($angka,0,',','.');
	return $hasil;
}
?>