<?php
use \application\controllers\AdminMainController;
class InformasiController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('informasi');
   }
   public function index(){
      $this->template('admin/informasi', 'Informasi');
   }
   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->informasi->selectAll("id_informasi", "DESC");
      $list = $this->informasi->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['judul'];
         $row[] = $li['slug'];
         $row[] = create_action($li['id_informasi']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }
   
   public function edit($id){
      $query = $this->informasi->selectWhere(array('id_informasi'=>$id));
      $data = $this->informasi->getResult($query);
      echo json_encode($data[0]);
   }
   
   public function insert(){
      $data = array();
      $data['judul'] = $_POST['judul'];
      $data['slug'] = $_POST['slug'];
      $data['konten'] = addslashes($_POST['konten']);
         
      $simpan = $this->informasi->insert($data);
   }
   
   public function update(){
      $data = array();      
      $data['judul'] = $_POST['judul'];
      $data['slug'] = $_POST['slug'];
      $data['konten'] = addslashes($_POST['konten']);
         
      $id = $_POST['id'];
      $simpan = $this->informasi->update($data, array('id_informasi'=>$id));
   }
   
   public function delete($id){
      $hapus = $this->informasi->delete(array('id_informasi'=>$id));
   }
}