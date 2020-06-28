<?php
use \application\controllers\AdminMainController;
class TransaksiController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('transaksi');
      $this->model('transaksi_detail');
      $this->model('produk');
   }
   public function index(){
      $this->template('admin/transaksi', 'Transaksi');
   }
   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
      $query = $this->transaksi->selectAll("id_transaksi", "DESC");
      $list = $this->transaksi->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nama_pemesan'];
         $row[] = $li['alamat'];
         $row[] = tgl_indonesia($li['tanggal']);
         $row[] = $li['jam'];
         $row[] = $li['status'];
         $row[] = create_action($li['id_transaksi']);
         $data[] = $row;
      }
      echo $this->transaksi->getError();
      $output = array("data" => $data);
      echo json_encode($output);
   }

//menyiapkan data untuk ditampilkan pada form edit   
   public function edit($id){
      require_once ROOT."/application/functions/function_rupiah.php";
      
      //Mendapatkan data transaksi
      $query = $this->transaksi->selectWhere(array('id_transaksi'=>$id));
      $datatrans = $this->transaksi->getResult($query);
      
      //Mendapatkan data transaksi detail untuk ditampilkan pada tabel transaksi detail
      $query = $this->transaksi_detail->selectJoin(array('produk'), "LEFT JOIN", array('transaksi_detail.id_produk'=>'produk.id_produk'), array('transaksi_detail.id_transaksi'=>$id));
      $datadetail = $this->transaksi_detail->getResult($query);
      $baris = array();
      $no = 0;
      $total = 0;
      foreach($datadetail as $detail){
         $no++;
         $subtotal = $detail['jumlah'] * $detail['harga'];
         $total += $subtotal;
         $harga_rupiah = format_rupiah($detail['harga']);
         $subtotal_rupiah = format_rupiah($subtotal);
         
         $baris[] = "<tr><td>$no</td><td>$detail[nama_produk]</td><td>$detail[jumlah]</td><td> Rp. $harga_rupiah</td><td> Rp. $subtotal_rupiah</td></tr>";
      }
      
      $total_rupiah = format_rupiah($total);
	  $ongkir = format_rupiah($datatrans[0]['ongkir']);
	  $grand_total = format_rupiah($total+$datatrans[0]['ongkir']);
	  
      $baris_total = "<tr><th colspan='3'></th><th>Total</th><th>Rp. $total_rupiah</th></tr>";
      $baris_total .= "<tr><th colspan='3'></th><th>Ongkir</th><th>Rp. $ongkir</th></tr>";
      $baris_total .= "<tr><th colspan='3'></th><th>Total Bayar</th><th>Rp. $grand_total</th></tr>";
      
      //Menggabungkan data
      $data = array(
         'trans' => $datatrans[0],
         'baris' => $baris,
         'total' => $baris_total
      );
      
      echo json_encode($data);
   }
   
   public function update(){
      $data = array();
      $data['status'] = $_POST['status'];
      $id = $_POST['id'];
      
      //Update stok produk ketika status diupdate menjadi Lunas
      if($data['status'] == 'Lunas' and $_POST['ket'] == ""){
         $query = $this->transaksi_detail->selectJoin(array('produk'), "LEFT JOIN", array('transaksi_detail.id_produk'=>'produk.id_produk'), array('transaksi_detail.id_transaksi'=>$id));
         $datadetail = $this->transaksi_detail->getResult($query);
            
         foreach($datadetail as $detail){
            $dataupdate = array();
            $dataupdate['stok'] = $detail['stok'] - $detail['jumlah'];
            $dataupdate['dibeli'] = $detail['dibeli'] + $detail['jumlah'];
            $this->produk->update($dataupdate, array('id_produk'=>$detail['id_produk']));
         }
      }
      
      $simpan = $this->transaksi->update($data, array('id_transaksi'=>$id));
   }
   
   public function delete($id){
      $this->transaksi->delete(array('id_transaksi'=>$id));
	  //Menghapus semua data transaksi detail
      $this->transaksi_detail->delete(array('id_transaksi'=>$id));      
   }
}