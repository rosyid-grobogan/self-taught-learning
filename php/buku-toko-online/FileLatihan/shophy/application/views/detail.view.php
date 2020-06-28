<?php
$produk = $data[0];
?>
<div class="panel panel-default">
   <div class="panel-body">
   
<h3 class="page-header">Detail Produk</h3>
<div class="row" id="produk">
   <div class="col-md-4">
      <img src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambar'] ?>" width="100%">
   </div>
   <div class="col-md-8">
      <h3><?= $produk['nama_produk'] ?></h3>
      <?= $produk['deskripsi'] ?>
      <br>
      <h4>Harga: Rp. <?= $produk['harga'] ?>,-</h4>
      <br>
      <form method="post" action="<?= BASE_PATH ?>/keranjang/tambah/<?= $produk['id_produk'] ?>">
         <div class="col-xs-3">
            <input type="number" name="jumlah" value="1" min="1" class="form-control">
         </div>
         <div class="col-xs-9">
            <?php
				if($produk['stok']>0){
			?>
				<button type="submit" class="btn btn-primary">
					<i class="glyphicon glyphicon-shopping-cart"></i> Masukkan Keranjang
				</button>
			<?php
				}else{
			?>
				<a class="btn btn-danger disabled">
					Stok Habis
				</a>
			<?php
				}
			?>
         </div>
      </form>
   </div>
</div>

   </div>
</div>
