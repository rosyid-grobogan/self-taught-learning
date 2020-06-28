<?php
use application\controllers\MainController;
class BiodataController extends MainController{   
   public function index(){
      $sid = session_id();      
      $this->template('biodata');
   }
   
   //Mendapatkan data provinsi dari RajaOngkir.com
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
   
   //Mendapatkan data kota dari RajaOngkir.com
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
   
   public function simpan(){   
      $this->model('transaksi');
      $this->model('keranjang');
      $this->model('transaksi_detail');
      
	  //Menyimpan data transaksi ke tabel transaksi
      $data = array();
      $data['nama_pemesan'] = $this->validate($_POST['nama']);
      $data['email'] = $this->validate($_POST['email']);
      $data['telp'] = $this->validate($_POST['telepon']);
      $data['alamat'] = $this->validate($_POST['alamat']);
      $data['tanggal'] = date('Y-m-d');
      $data['jam'] = date('H:i:s');
      $data['status'] = "Baru";
      
      $provinsi = $_POST['provinsi'];
      $kota = $_POST['kota'];
         
      $simpan = $this->transaksi->insert($data);
      $idtransaksi = $this->transaksi->getId();
      $_SESSION['id_transaksi'] = $idtransaksi;
      
	  //Memindahkan isi keranjang belanja ke tabel transaksi_detail
      $query = $this->keranjang->selectJoin(array('produk'), 'LEFT JOIN',array('keranjang.id_produk'=>'produk.id_produk'), array('keranjang.id_session'=>session_id()));
      $datakeranjang = $this->keranjang->getResult($query);
      
      $total_berat = 0;
      foreach($datakeranjang as $detail){
         $datadetail = array();
         $datadetail['id_transaksi'] = $idtransaksi;
         $datadetail['id_produk']    = $detail['id_produk'];
         $datadetail['jumlah']        = $detail['jumlah'];
       
        $berat = $detail['jumlah'] * $detail['berat'];
        $total_berat+= $berat;
        $this->transaksi_detail->insert($datadetail);
      }
     
	  $total_berat *= 1000;
	  
	  //Mengambil data dari tabel pengaturan
      $this->model('pengaturan');
	  $query = $this->pengaturan->selectAll();
	  $pengaturan = $this->pengaturan->getResult($query);
		
	  //Mendapatkan harga ongkir dari RajaOngkir.com
      $curl = curl_init();
	  
      curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$pengaturan[0]['kota']."&destination=$_POST[kota]&weight=$total_berat&courier=pos",
        CURLOPT_HTTPHEADER => array(
         "content-type: application/x-www-form-urlencoded",
         "key: 80efd7dd408a3b7761d9cfd3b89e87db"
        ),
      ));
      
      $response = json_decode(curl_exec($curl), true);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        $ongkir = 0;
      } else {
        $ongkir = $response['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
      }
	  
	  //Menyimpan ongkir ke tabel transaksi dan menghapus data pada tabel keranjang
	  $this->transaksi->update(array('ongkir'=>$ongkir), array('id_transaksi'=>$idtransaksi));
	  
      $this->keranjang->delete(array('id_session'=>session_id()));
            
      if($simpan) $this->redirect('konfirmasi');
   }
} 