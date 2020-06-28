<?php
use \application\controllers\AdminMainController;
class DashboardController extends AdminMainController{
   public function index(){      
   
//Mendapatkan jumlah kategori
     $this->model('kategori');
     $query = $this->kategori->selectAll();
     $jmlkategori = $this->kategori->getRows($query);

//Mendapatkan jumlah produk     
     $this->model('produk');
     $query = $this->produk->selectAll();
     $jmlproduk = $this->produk->getRows($query);

//Mendapatkan jumlah transaksi terbaru  
     $this->model('transaksi');
     $query = $this->transaksi->selectWhere(array('status'=>'Baru'));
     $jmltransaksi = $this->transaksi->getRows($query);

//Mendapatkan jumlah pesan terbaru     
     $this->model('pesan');
     $query = $this->pesan->selectWhere(array('dibaca'=>'N'));
     $jmlpesan = $this->pesan->getRows($query);

//Mendapatkan data untuk ditampilkan pada chart         
      $nama_bulan = array(1=>"Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");
      
      $arr_bulan = array();
      $arr_data = array();
      
	  //Mendapatkan data bulan dari 11 bulan yang lalu hingga bulan ini
      for($i=11; $i>=0; $i--){
         $bulan = date('n') - $i;
         $tahun = date('Y');
      
         if($bulan < 1){
            $bulan += 12;
            $tahun -= 1;
         }         
         
         $arr_bulan[] = $nama_bulan[(int) $bulan];
         
		 //Mendapatkan data transaksi pada bulan tertentu
         $query = $this->transaksi->selectWhere(array('month(tanggal)'=>$bulan, 'year(tanggal)'=>$tahun));
         $datatrans = $this->transaksi->getResult($query);
         
		 //Mendapatkan jumlah penjualan dari transaksi
         if(isset($datatrans[0])){
            $idtrans = $datatrans[0]['id_transaksi'];
            $query = $this->transaksi->query("SELECT sum(jumlah) as total FROM transaksi_detail WHERE id_transaksi='$idtrans'");
            $hasil = $this->transaksi->getResult($query);
            $arr_data[] = $hasil[0]['total'];
         }else{
            $arr_data[] = 0;
         }
         
      }
      
	  //Menggabungkan semua data yang akan dikirim ke view pada variabel $data
     $data = array(
        'jmlkategori' => $jmlkategori,
        'jmlproduk' => $jmlproduk,
        'jmltransaksi' => $jmltransaksi,
        'jmlpesan' => $jmlpesan,
        'namabulan' => $arr_bulan,
        'data' => $arr_data
     );
     
      $this->template('admin/dashboard', 'Dashboard', $data);
    
   }
}