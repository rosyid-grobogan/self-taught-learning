<h3 class="judul-konten">Hasil Pencarian</h3>
<div class="row" id="produk">
<?php
foreach($data['produk'] as $produk){
   echo "<div class='col-sm-4 col-xs-6'>
         <div class='box-produk'>
         <img src='".BASE_PATH."/public/images/thumbs/".$produk['gambar']."'>
         <h4 class='judul-produk'>$produk[nama_produk]</h4>
         <b class='harga-produk'>Rp. ".format_rupiah($produk['harga'])."</b>
         <a href='".BASE_PATH."/produk/detail/$produk[slug]' class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-plus-sign'></i> More Info</a>
         </div>
      </div>";
}
?>   
</div>
