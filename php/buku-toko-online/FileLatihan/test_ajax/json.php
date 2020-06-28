<?php
$mysqli = mysqli_connect("localhost", "root", "", "toko_online");

$produk = array();
$query = mysqli_query($mysqli, "SELECT * FROM produk");
while($data = mysqli_fetch_array($query)){
   $produk[]=$data;
}

echo json_encode($produk);
?>
