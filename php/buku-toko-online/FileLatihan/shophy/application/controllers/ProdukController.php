<?php
use application\controllers\MainController;
class ProdukController extends MainController{
   public function detail($slug){
      $this->model('produk');
      $query = $this->produk->selectWhere(array('slug'=>$slug));
      $produk = $this->produk->getResult($query);
      
      $this->template('detail', $produk);
   }
   public function kategori($slug){
      $this->model('kategori');
      $query = $this->kategori->selectWhere(array('slug'=>$slug));
      $kategori = $this->kategori->getResult($query);
      
      $this->model('produk');
      $query = $this->produk->selectWhere(array('id_kategori'=>$kategori[0]['id_kategori']),'id_produk', 'DESC');
      $produk = $this->produk->getResult($query);
      
      $this->template('kategori', array('kat'=>$kategori, 'produk'=>$produk));
   }
   
   public function search(){
      $this->model('produk');
      $query = $this->produk->selectLike(array('nama_produk'=>"%$_POST[kata]%"),'id_produk', 'DESC', 9);
      $produk = $this->produk->getResult($query);
      
      $this->template('search', array('produk'=>$produk));
   }
} 