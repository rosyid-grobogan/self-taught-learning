<?php
create_title("Laporan Transaksi");
   
start_content();
?>
<form id="form-laporan" class="form form-horizontal" method="post" >
   <div class="form-group">
      <label class="control-label col-md-2">Dari Tanggal</label>
      <div class="col-md-3">
         <input type="text" class="form-control datepicker" id="mulai" name="mulai">
      </div>
      <label class="control-label col-md-2">Sampai Tanggal</label>
      <div class="col-md-3">
         <input type="text" class="form-control datepicker" id="sampai" name="sampai">
      </div>
      <div class="col-md-2">
<?php  
   create_button("Tampilkan", "primary", "", "play-circle"); 
?>
      </div>
   </div>
</form>
<?php
   create_table(array("Faktur", "Tanggal", "Nama Produk", "Jumlah", "Harga", "Subtotal"));
end_content();

?>

<script type="text/javascript">
var table, mulai, sampai;
$(function(){
   //Menerapkan plugin datepicker
   $('.datepicker').datepicker({
      format: 'yyyy-mm-dd', 
      autoclose: true
   }); 
   
   //Menerapkan plugin dataTable dengan tambahan tombol ekspor
      table = $('.table').DataTable({
        "dom" : 'Brt',
		"bSort" : false,
        "buttons" : [
            {
               extend: 'pdf', 
               text: 'Export PDF', 
               className: 'pdf btn btn-primary'
            },
            {
               extend: 'excel', 
               text: 'Export Excel',
               className: 'excel btn btn-success'
            },
            {
               extend: 'print', 
               text: 'Print',
               className: 'print btn btn-info'
            }
         ],
        "processing" : true,
        "ajax" : {
          "url" : "<?= BASE_PATH ?>/admin/laporan/listData/"+mulai+"_"+sampai,
          "type" : "POST"
        }
      });
    
	//Me-refresh tabel ketika tombol Tampilkan diklik
   $('#form-laporan').submit(function(){
      mulai = $('#mulai').val();
      sampai = $('#sampai').val();
      document.title = "Laporan Penjualan Dari "+mulai+" Sampai "+sampai;
      table.ajax.url("<?= BASE_PATH ?>/admin/laporan/listData/"+mulai+"_"+sampai);
      table.buttons();
      table.ajax.reload();
      return false;
    });
   
   //Membuat tombol menjadi grup tombol
   table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    
	//Menambahkan ikon pada tombol
    $('.pdf').prepend('<i class="glyphicon glyphicon-file"></i> ');
    $('.excel').prepend('<i class="glyphicon glyphicon-list-alt"></i> ');
    $('.print').prepend('<i class="glyphicon glyphicon-print"></i> ');
    
});
</script>