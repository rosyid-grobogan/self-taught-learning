<?php
use \application\controllers\AdminMainController;
class PengaturanController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('pengaturan');
   }
   public function index(){
      $query = $this->pengaturan->selectAll();
      $data = $this->pengaturan->getResult($query);
      $this->template('admin/pengaturan', 'Pengaturan', $data);
   }
   
   //mendapatkan data provinsi dari RajaOngkir
   public function get_provinsi(){
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
         "key: 80efd7dd408a3b7761d9cfd3b89e87db"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
   }
   
   //mendapatkan data kota/kabupaten dari RajaOngkir
   public function get_kota($prov){
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=".$prov,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
         "key: 80efd7dd408a3b7761d9cfd3b89e87db"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
   }

   public function update(){
      $data = array();
      $data['judul_website'] = $_POST['judul'];
      $data['favicon'] = $_POST['favicon'];
      $data['email'] = $_POST['email'];
      $data['alamat'] = $_POST['alamat'];
      $data['provinsi'] = $_POST['provinsi'];
      $data['kota'] = $_POST['kota'];
      $data['telp'] = $_POST['telp'];
      $data['sms'] = $_POST['sms'];
      $data['bank'] = $_POST['bank'];
      $data['pemilik_rekening'] = $_POST['pemilik'];
      $data['rekening'] = $_POST['rekening'];
      $data['facebook'] = $_POST['facebook'];
      $data['twitter'] = $_POST['twitter'];
      $data['instagram'] = $_POST['instagram'];
         
      $simpan = $this->pengaturan->update($data);
      if($simpan) echo "success";
   }
}
