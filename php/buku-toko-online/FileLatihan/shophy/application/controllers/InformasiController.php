<?php
use application\controllers\MainController;
class InformasiController extends MainController{
   public function konten($slug){
      $this->model('informasi');
      $query = $this->informasi->selectWhere(array('slug'=>$slug));
      $data = $this->informasi->getResult($query);
      
      $this->template('informasi', $data);
   }
} 