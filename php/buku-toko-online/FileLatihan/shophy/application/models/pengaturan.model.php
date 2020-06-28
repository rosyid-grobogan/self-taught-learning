<?php
class PengaturanModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "pengaturan";      
   }
}