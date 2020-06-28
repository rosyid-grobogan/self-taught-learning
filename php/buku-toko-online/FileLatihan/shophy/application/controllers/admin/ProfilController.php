<?php
use \application\controllers\AdminMainController;
class ProfilController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('admin');
   }
   public function index(){
      $query = $this->admin->selectAll();
      $data = $this->admin->getResult($query);
      $this->template('admin/profil', 'Profil', $data);
   }
   
   public function update(){
      $data = array();
      $data['password'] = md5($_POST['baru']);
      $lama = md5($_POST['lama']);
         
      $query= $this->admin->selectWhere(array('username'=>$_SESSION['username']));
      $cek = $this->admin->getResult($query);
      
      if($cek[0]['password'] != $lama){
          echo "Password lama salah!";
      }else{
          $simpan = $this->admin->update($data);
         if($simpan) echo "success";
      }
   }
}