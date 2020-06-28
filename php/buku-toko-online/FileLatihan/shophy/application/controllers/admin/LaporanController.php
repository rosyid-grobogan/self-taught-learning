<?php
use \application\controllers\AdminMainController;
class LaporanController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('transaksi');
      $this->model('transaksi_detail');
      $this->model('produk');
   }
   public function index(){
      $this->template('admin/laporan', 'Laporan');
   }
   
   public function listData($tanggal){
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
      require_once ROOT."/application/functions/function_rupiah.php";
     
     $tanggal = explode("_", $tanggal);
     
      $query = $this->transaksi->query("SELECT * FROM transaksi t1, transaksi_detail t2, produk t3 WHERE (t1.id_transaksi=t2.id_transaksi) AND (t2.id_produk=t3.id_produk) AND (t1.status='Lunas') AND (t1.tanggal BETWEEN '$tanggal[0]' AND '$tanggal[1]')");
      $list = $this->transaksi->getResult($query);
      $data = array();
      $no = 0;
     $total = 0;
     $jumlah = 0;
      foreach($list as $li){
       //Menghitung subtotal dan total 
      $harga = format_rupiah($li['harga']);
      $subtotal = $li['harga'] * $li['jumlah'];
      $subtotal_rupiah = format_rupiah($subtotal);
      $jumlah += $li['jumlah'];
      $total += $subtotal;
      
      
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['id_transaksi'];
         $row[] = tgl_indonesia($li['tanggal']);   
         $row[] = $li['nama_produk'];    
         $row[] = $li['jumlah'];    
         $row[] = "Rp. ".$harga.",-";
         $row[] = "Rp. ".$subtotal_rupiah.",-";
         $data[] = $row;
      }
     //Menampilkan total harga dan jumlah produk     
      $total_rupiah = format_rupiah($total);
      $no++;
        $data[] = array("","","","","","<b>Total Harga</b>","<b>Rp. $total_rupiah,-</b>");
      $no++;
        $data[] = array("","","","","","<b>Total Produk</b>","<b>$jumlah</b>");
      
      echo $this->transaksi->getError();
      $output = array("data" => $data);
      echo json_encode($output);
   }
}