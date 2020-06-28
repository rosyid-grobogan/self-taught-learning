<div class="panel panel-default">
   <div class="panel-body">

<?php
   $transaksi = $data['transaksi'][0];
   $pengaturan = $data['pengaturan'][0];
?>
   <h2 class="page-header">Konfirmasi Pemesanan</h2>
   <table>
      <tr><td width="40%">Nama Pemesan</td><td>: <?= $transaksi['nama_pemesan'] ?></td></tr>
      <tr><td>Alamat</td><td>: <?= $transaksi['alamat'] ?></td></tr>
      <tr><td>Telpon</td><td>: <?= $transaksi['telp'] ?></td></tr>
   </table><hr>
   
   Nomor Transaksi: <?= $transaksi['id_transaksi'] ?><br>
   <table class="table table-bordered table-striped">
   <thead>
      <tr>
         <td>No</td> 
         <td>Nama Produk</td> 
         <td>Jumlah</td> 
         <td>Harga</td>
         <td>Subtotal</td>
      </tr>
   </thead>
   <tbody>
   <?php
   $no = 0;
   $total = 0;
   $total_berat = 0;
   foreach($data['detail'] as $detail){
      $no++;
      $subtotal = $detail['jumlah'] * $detail['harga'];
      $total += $subtotal;         
      
      $berat = $detail['jumlah'] * $detail['berat'];
      $total_berat += $berat;
      
      $harga_rp = format_rupiah($detail['harga']);
      $subtotal_rp = format_rupiah($subtotal);
      
      echo "<tr>
            <td>$no</td>
            <td>$detail[nama_produk]</td>
            <td>$detail[jumlah]</td>
            <td>Rp. $harga_rp</td>
            <td>Rp. $subtotal_rp</td>
         </tr>"; 
   }
      $grandtotal = $total + $transaksi['ongkir'];
      
      $ongkir_rp = format_rupiah($transaksi['ongkir']);
      $grandtotal_rp = format_rupiah($grandtotal);
      $total_rp = format_rupiah($total);
      
      echo "<tr><td colspan='3'></td><td>Total </td><td> Rp. $total_rp </td></tr>
         <tr><td colspan='3'></td><td>Total Berat</td><td> $total_berat Kg </td></tr>
         <tr><td colspan='3'></td><td>Ongkos Kirim</td><td>Rp. $ongkir_rp</td></tr>
         <tr><td colspan='3'></td><td>Total Bayar</td><td><b>Rp. $grandtotal_rp </b></td></tr>";
   ?>
   </tbody>
   </table>
   
   <p>Silakan melakukan pembayaran sebelum 2 x 24 jam sesuai jumlah di atas ke rekening berikut: 
   Bank <b><?= $pengaturan['bank'] ?></b> a.n. <b><?= $pengaturan['pemilik_rekening'] ?></b> <br>
   No. Rekening: <b><?= $pengaturan['rekening'] ?></b></p>
        
   <p>Silakan konfirmasi setelah melakukan pembayaran melalui SMS ke <b><?= $pengaturan['sms'] ?></b></p>   
   
   </div>
</div>
