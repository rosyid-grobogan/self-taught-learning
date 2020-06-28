<?php
use application\controllers\MainController;
class KonfirmasiController extends MainController{
   
   public function index(){
      require_once ROOT."/application/functions/function_rupiah.php";
      $this->model('transaksi');
      $this->model('transaksi_detail');
      
      //Mendapatkan data transaksi dan data pesanan untuk ditampilkan dan dikirimkan ke email
      $query = $this->transaksi->selectWhere(array('id_transaksi'=>$_SESSION['id_transaksi']));
      $datatransaksi = $this->transaksi->getResult($query);
      
      $query = $this->transaksi_detail->selectJoin(array('produk'), "LEFT JOIN", array('produk.id_produk'=>'transaksi_detail.id_produk'), array('transaksi_detail.id_transaksi'=>$_SESSION['id_transaksi']));
      $datadetail = $this->transaksi_detail->getResult($query);
      
      $this->model('pengaturan');
      $query = $this->pengaturan->selectAll();
      $pengaturan = $this->pengaturan->getResult($query);
      
      //Membuat email untuk dikirimkan ke pemesan dan admin toko online
      $pesan = "Terimakasih telah melakukan pemesanan di Toko Online kami <br><br>
            Nama : ".$datatransaksi[0]['nama_pemesan']."<br>
            Alamat : ".$datatransaksi[0]['alamat']." <br>
            Telpon : ".$datatransaksi[0]['telp']." <br><hr>
            
            Nomor Order: $_SESSION[id_transaksi]<br>
            Data order Anda sebagai berikut: <br><br>";
            
      $total = 0;
      $total_berat = 0;
      foreach($datadetail as $detail){
         $subtotal = $detail['jumlah'] * $detail['harga'];
         $total += $subtotal;         
         
         $berat = $detail['jumlah'] * $detail['berat'];
         $total_berat += $berat;
         
         $harga_rp = format_rupiah($detail['harga']);
         $subtotal_rp = format_rupiah($subtotal);
         
         $pesan .= "$detail[jumlah] $detail[nama_produk] x Rp. $harga_rp -> Rp. $subtotal_rp <br>"; 
      }
      $grandtotal = $total + $datatransaksi[0]['ongkir'];
      
      $ongkir_rp = format_rupiah($datatransaksi[0]['ongkir']);
      $grandtotal_rp = format_rupiah($grandtotal);
      $total_rp = format_rupiah($total);
      $pesan .= "<br>
        Total : Rp. $total_rp <br>
        Total Berat: $total_berat Kg <br>
        Ongkos Kirim :Rp. $ongkir_rp<br>
        Grand Total : <b>Rp. $grandtotal_rp </b><br><br>
        
        Silakan melakukan pembayaran sebelum 2 x 24 jam sesuai jumlah di atas ke rekening berikut: <br>
        Bank <b>".$pengaturan[0]['bank']."</b> a.n. <b>".$pengaturan[0]['pemilik_rekening']."</b> <br>
        No. Rekening: <b>".$pengaturan[0]['rekening']."</b><br><br>";
        
      $pesan .= "Silakan konfirmasi setelah melakukan pembayaran melalui SMS ke <b>".$pengaturan[0]['sms']."</b>";   
      
      $tujuan = $datatransaksi[0]['email'];
      $subjek = "Pemesanan Online";
      $header = "From: ">$pengaturan[0]['email']."\r\n";
      $header .= "Content-type: text/html\r\n";
      
      //Mengirim email ke pemesan dan admin toko online
      mail($tujuan, $subjek, $pesan, $header);
      mail($pengaturan[0]['email'], $subjek, $pesan, $header);
      
      $transaksi = array('transaksi'=>$datatransaksi, 'detail'=>$datadetail, 'pengaturan'=>$pengaturan);
      $this->template('konfirmasi', $transaksi);
   }
} 