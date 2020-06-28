<?php
use \application\controllers\AdminMainController;
class MenuController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('menu');
      $this->model('informasi');      
      $this->model('kategori');
   }
   
   public function index(){
      $query = $this->menu->selectWhere(array('induk'=>'0'), "id_menu", "DESC");
      $data = $this->menu->getResult($query);
      $this->template('admin/menu', 'Menu', $data);
   }
   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->menu->selectWhere(array('induk'=>'0'), "urutan", "ASC");
      $list = $this->menu->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nama_menu'];
         $row[] = $li['jenis_link'];
         $row[] = $li['link'];
         $row[] = $li['urutan'];
         $row[] = create_action($li['id_menu']);
         $data[] = $row;
         
         $subquery = $this->menu->selectWhere(array('induk'=>$li['id_menu']), "urutan", "ASC");
         $sublist = $this->menu->getResult($subquery);
         foreach($sublist as $sli){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = "---- ".$sli['nama_menu'];
            $row[] = $sli['jenis_link'];
            $row[] = $sli['link'];
            $row[] = $sli['urutan'];
            $row[] = create_action($sli['id_menu']);
            $data[] = $row;
         }
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Membuat pilihan link sesuai dengan jenis link yang dipilih   
   public function datalink($val){
      $text = "";
      if($val=="informasi"){
         $query = $this->informasi->selectAll();
         $list = $this->informasi->getResult($query);
         foreach($list as $li){
            $text .= "<option value='$li[slug]'>$li[judul]</option>";
         }
      }elseif($val=="kategori"){
         $query = $this->kategori->selectAll();
         $list = $this->kategori->getResult($query);
         foreach($list as $li){
            $text .= "<option value='$li[slug]'>$li[nama_kategori]</option>";
         }
      }else{         
         $text .= "<option value='home'>Beranda</option>";
         $text .= "<option value='produk'>Produk</option>";
         $text .= "<option value='keranjang'>Keranjang</option>";
         $text .= "<option value='pesan'>Hubungi Kami</option>";
      }
      
      echo $text;
   }
   
   public function edit($id){
      $query = $this->menu->selectWhere(array('id_menu'=>$id));
      $data = $this->menu->getResult($query);
      echo json_encode($data[0]);
   }
   
   public function insert(){
      $data = array();
      $data['nama_menu'] = $_POST['menu'];
      $data['induk'] = $_POST['induk'];
      $data['jenis_link'] = $_POST['jenis_link'];
      $data['link'] = $_POST['link'];
      $data['urutan'] = $_POST['urutan'];
         
      $simpan = $this->menu->insert($data);
   }
   
   public function update(){
       $data = array();
      $data['nama_menu'] = $_POST['menu'];
      $data['induk'] = $_POST['induk'];
      $data['jenis_link'] = $_POST['jenis_link'];
      $data['link'] = $_POST['link'];
      $data['urutan'] = $_POST['urutan'];
         
      $id = $_POST['id'];
      $simpan = $this->menu->update($data, array('id_menu'=>$id));
   }
   
   public function delete($id){
      $hapus = $this->menu->delete(array('id_menu'=>$id));
   }
}