<?php
use application\controllers\MainController;
class KeranjangController extends MainController{
   public function index(){      
      $this->template('keranjang');
   }
   
   public function tambah($id){
      $this->model('produk');
      $query = $this->produk->selectWhere(array('id_produk'=>$id));
      $produk = $this->produk->getResult($query);
      
      $data = array();
      $data['id_produk'] = $id;
      $data['id_session'] = session_id();
      $data['jumlah'] = $_POST['jumlah'];
      $data['tanggal'] = date('Y-m-d');
      $data['jam'] = date('H:i:s');
      $data['stok_temp'] = $produk[0]['stok'];
      
      $this->model('keranjang');
      $qkeranjang = $this->keranjang->selectWhere(array('id_produk'=>$id, 'id_session'=>session_id()));
      $jml = $this->keranjang->getRows($qkeranjang);
      $datakeranjang = $this->keranjang->getResult($qkeranjang);
      
	  //Mengecek apakah jumlah yang dipesan melebihi stok, jika iya tampilkan pesan
      if($produk[0]['stok']>$_POST['jumlah']){
         if($jml>=1) $this->keranjang->update(array('jumlah'=>$datakeranjang[0]['jumlah']+$_POST['jumlah']), array('id_keranjang'=>$datakeranjang[0]['id_keranjang']));
         else $simpan = $this->keranjang->insert($data);
         $this->redirect('keranjang');
      }else{
         echo "<script type='text/javascript'>
            alert('Jumlah barang melebihi stok');
            history.go(-1);
         </script>";
      }
      
	  //Menghapus data keranjang belanja hari kemarin dan sebelumnya
      $kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
      $this->keranjang->query("DELETE FROM keranjang WHERE tanggal < '$kemarin'");      
   }
   
   public function dataOrder(){
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_rupiah.php";
	  
	  //Menyiapkan data keranjang untuk ditampilkan melalui AJAX
      $this->model('keranjang');
      $query = $this->keranjang->selectJoin(array('produk'), 'LEFT JOIN',array('keranjang.id_produk'=>'produk.id_produk'), array('keranjang.id_session'=>session_id()));
      $list = $this->keranjang->getResult($query);
      $data = array();
      $no = 0;
      $total = 0;
      foreach($list as $li){
         $no ++;
         $subtotal = $li['jumlah'] * $li['harga'];
         $total += $subtotal;
       
         $row = array();
         $row[] = $no;
         $row[] = '<img src="'. BASE_PATH .'/public/images/thumbs/'. $li['gambar'] .'" width="80">';
         $row[] = $li['nama_produk'];
         $row[] = 'Rp. '.format_rupiah($li['harga']);
         $row[] = '<input type="number" name="jumlah-'.$li['id_keranjang'].'" class="form-control" style="width: 60px" value="'.$li['jumlah'].'" onchange="changeValue()" min="1">';
         $row[] = 'Rp. '.format_rupiah($subtotal);
         $row[] = create_action($li['id_keranjang'], false, true);
         $data[] = $row;
      }
      $data[] = array("","","","","<b>Total</b>", "<b>Rp. ".format_rupiah($total)."</b>", "");
      $output = array("data" => $data);
      echo json_encode($output);
   }
   
    public function update(){
      $this->model('keranjang');
      $query = $this->keranjang->selectWhere(array('id_session'=>session_id()));
      $datakeranjang = $this->keranjang->getResult($query);
       foreach($datakeranjang as $data){
         $jumlah = "jumlah-".$data['id_keranjang'];
		 
         if($_POST[$jumlah] <= $data['stok_temp'] and $_POST[$jumlah] > 0) $jumlahbaru = $_POST[$jumlah];
		 elseif($_POST[$jumlah] > $data['stok_temp']) $jumlahbaru = $data['stok_temp'];
		 else $jumlahbaru = 1;
		 
		 $this->keranjang->update(array('jumlah'=>$jumlahbaru), array('id_keranjang'=>$data['id_keranjang']));
        
      }
   }
   
   public function batal($id){
      $this->model('keranjang');
      $hapus = $this->keranjang->delete(array('id_keranjang'=>$id));
   }
} 