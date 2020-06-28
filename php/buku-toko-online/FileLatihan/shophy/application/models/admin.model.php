<?php
class AdminModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "admin";      
   }
}