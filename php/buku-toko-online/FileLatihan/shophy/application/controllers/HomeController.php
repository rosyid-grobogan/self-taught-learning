<?php
use application\controllers\MainController;
class HomeController extends MainController{
   public function index(){
      $this->model('produk');
      $query = $this->produk->selectAll('id_produk', 'DESC', 8);
      $data = $this->produk->getResult($query);
      
      $this->template('home', array('produk'=>$data));
   }
   
   //Menampilkan 8 produk selanjutnya ketika tombol Load More diklik
   public function load($posisi){
      $this->model('produk');
      $query = $this->produk->selectAll('id_produk', 'DESC', $posisi.', 8');
      $dataproduk = $this->produk->getResult($query);
      
      foreach($dataproduk as $produk){
         echo "<div class='col-md-3 col-sm-4 col-xs-6'>
               <div class='box-produk'>
               <img src='".BASE_PATH."/public/images/thumbs/".$produk['gambar']."'>
               <h4 class='judul-produk'>$produk[nama_produk]</h4>
               <h5 class='harga-produk'>Rp. $produk[harga],-</h5>
               <a href='".BASE_PATH."/produk/detail/$produk[slug]' class='btn btn-sm btn-primary'>
               <i class='glyphicon glyphicon-plus-sign'></i> More Info
               </a>
               </div>
            </div>";
      }
   }
} 