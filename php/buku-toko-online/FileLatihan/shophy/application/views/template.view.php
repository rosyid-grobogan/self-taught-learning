<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?= $pengaturan[0]['judul_website'] ?></title>

<?php
   //Memanggil semua fungsi yang diperlukan
   $function = array('html', 'date', 'rupiah');
   foreach($function as $func){
      require_once ROOT."/application/functions/function_".$func.".php";
   }
   
   //Memanggil file CSS dan library jQuery
   load_css('bootstrap/css/bootstrap.min.css');
   load_css('css/style.css');
   
   load_script('jquery/jquery-2.0.2.min.js');
?>   
   <script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>  

<!-- modal keranjang belanja --> 
   <div class="modal slide" id="modalkeranjang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
                 
      <div class="modal-header">        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
        <h3 class="modal-title">Keranjang Belanja</h3>
      </div>

<table class="table table-striped">
   <tr>
      <th>No</th>
      <th>Gambar</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total</th>
   </tr>
<?php
$no = 1;
$total = 0;
$jmlitem = 0;
foreach($data['keranjang'] as $produk){
   $subtotal = $produk['jumlah']*$produk['harga'];
   $total += $subtotal;
   $jmlitem += $produk['jumlah'];
?>
   <tr>
      <td><?= $no ?></td>
      <td><img src="<?= BASE_PATH ?>/public/images/thumbs/<?= $produk['gambar'] ?>" width="80"></td>
      <td><?= $produk['nama_produk'] ?></td>
      <td>Rp. <?= format_rupiah($produk['harga']) ?></td>
      <td><?= $produk['jumlah'] ?></td>
      <td>Rp. <?= format_rupiah($subtotal) ?></td>
   </tr>
<?php
   $no++;
}   
?>   
   <tr>
      <td colspan="5" align="right">Total</td>
      <td colspan="2"><b>Rp. <?= format_rupiah($total) ?></b></td>
   </tr>
</table>
         
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
<?php
if(count($data['keranjang']) != 0){
?>
         <a href="<?= BASE_PATH ?>/biodata" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i> Selesai Belanja</a>
<?php
}else{
?>
          <a  class="btn btn-primary disabled"><i class="glyphicon glyphicon-check"></i> Selesai Belanja</a>
<?php } ?>
      </div>   
         </div>
      </div>
   </div>
<!-- /modal --> 
 
<!-- header dan menu navigasi-->
   <nav>
      <div class="container">
         <div class="row navbar navbar-inverse">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               
               <a class="navbar-brand" href="#"><img src="<?= BASE_PATH ?>/public/images/logo.png" class="logo" height="50"></a>
               
               <form method="post" action="<?= BASE_PATH ?>/produk/search" class="pull-right navbar-form visible-md visible-lg">
                  <input type="text" name="kata" placeholder="Search here..." class="form-control" size="40">
                  <button type="submit" class="btn btn-primary">Search</button>
               </form>
               
               <button class="btn btn-link navbar-right cart" data-toggle="modal" data-target="#modalkeranjang">
                  <i class="glyphicon glyphicon-shopping-cart"></i>
                  <b>Rp. <?= format_rupiah($total) ?></b> (<?= $jmlitem ?> item)
               </button>
            </div>
                        
            <!-- menu navigasi -->
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
<?php
foreach($data['menu'] as $m){
   if(count($m['submenu'])==0) echo "<li><a href='$m[link]'>$m[judul]</a></li>";
   else{
      echo "<li class='dropdown'><a href='#'  class='dropdown-toggle' data-toggle='dropdown'>$m[judul]  <span class='caret'></span></a>
         <ul class='dropdown-menu'>";
      foreach($m['submenu'] as $s){
         echo "<li><a href='$s[link]'>$s[judul]</a></li>";
      }
      echo"</ul></li>";
   }
}
?>               
               </ul>
            </div>
			<!-- /menu -->
         </div>
      </div>
   </nav>
<!-- /header -->
   
<!-- konten toko online -->
   <section class="container">
      <div class="row">
   <?php
      $view = new View($viewName);
      $view->bind('data', $data);
   if($viewName == 'home'){
      echo "<div class='col-md-12'>";
      $view->render();
      echo "</div>";
   }else{
   ?>

   <div class="col-md-8">
      <?php $view->render(); ?>
   </div>
   <div class="col-md-4">
      <div class="panel panel-default">
         <div class="panel-body">
            <h3 class="page-header">Produk Best Seller</h3>
            <div class="row">
<?php
foreach($data['bestseller'] as $produk){
   echo "<div class='col-md-6 col-xs-6'>
         <div class='box-produk'>
         <a href='".BASE_PATH."/produk/detail/$produk[slug]'>
            <img src='".BASE_PATH."/public/images/thumbs/".$produk['gambar']."'>
            <h5 class='judul-produk'>$produk[nama_produk]</h5>
         </a>
         </div>
      </div>";
}
?>            </div>
         </div>
      </div>
   </div>
   <?php
   }
   ?>         
      </div>
   </section>
<!-- /konten -->
  
<!-- footer -->
   <footer id="top-footer">
      <div class="container">
         <div class="social">
            <a class="facebook" target="blank" href="<?= $pengaturan[0]['facebook'] ?>"></a>
            <a class="twitter" target="blank" href="<?= $pengaturan[0]['twitter'] ?>"></a>
            <a class="instagram" target="blank" href="<?= $pengaturan[0]['instagram'] ?>"></a>
         </div>
         <a class="btn-up pull-right"><i class="glyphicon glyphicon-circle-arrow-up"></i></a>
      </div>
   </footer>
   
   <footer>
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <h3 class="judul">Kategori</h3>
               <ul>
<?php
foreach($data['kategori'] as $k){
   echo "<li><a href='".BASE_PATH."/produk/kategori/$k[slug]'>$k[nama_kategori]</a></li>";
}
?>                  
               </ul>
            </div>
            <div class="col-md-4">
               <h3 class="judul">Informasi</h3>
               <ul>
<?php
foreach($data['informasi'] as $i){
   echo "<li><a href='".BASE_PATH."/informasi/konten/$i[slug]'>$i[judul]</a></li>";
}
?>                  
               </ul>
            </div>
            <div class="col-md-4">
               <h3 class="judul">Kontak</h3>
<?php
$s = $data['pengaturan'][0];
echo "Alamat: $s[alamat]<br>";
echo "Telpon: $s[telp]<br>";
echo "SMS: $s[sms]<br>";
echo "Email: $s[email]<br>";

?>                  
            </div>
         </div>
      </div>
   </footer>
   
   <footer id="bottom-footer">
      Copyright &copy; Toko Online Shophy
   </footer>
<!-- /footer -->

<?php
   load_script('bootstrap/js/bootstrap.min.js');
   load_script('validator/validator.min.js');
?>
<script>
   $(function(){
      $('.btn-up').click(function(){
         $('html, body').animate({scrollTop: 0}, 300);
      });
   });
</script>
</body>
</html>
