<?php
class KeranjangModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "keranjang";      
   }
}