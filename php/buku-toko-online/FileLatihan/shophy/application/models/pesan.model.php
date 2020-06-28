<?php
class PesanModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "pesan";      
   }
}