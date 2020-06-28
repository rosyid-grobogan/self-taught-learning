<?php
load_css('dataTables/css/dataTables.bootstrap.min.css');
load_script('dataTables/js/jquery.dataTables.min.js');
load_script('dataTables/js/dataTables.bootstrap.min.js');
?>
<div class="panel panel-default">
   <div class="panel-body">
   
<h2 class="page-header">Keranjang Belanja</h2>
<form id="form-keranjang">
<table class="table table-striped table-keranjang">
   <thead>
      <tr>
         <th>No</th>
         <th>Gambar</th>
         <th>Nama Produk</th>
         <th>Harga</th>
         <th>Jumlah</th>
         <th>Total</th>
         <th>Batal</th>
      </tr>
   </thead>
   <tbody>

   </tbody>
</table>
</form>

<?php
if(count($data['keranjang']) != 0){
?>
<a href="<?= BASE_PATH ?>/biodata" class="btn btn-primary">
   <i class="glyphicon glyphicon-check"></i> Selesai Belanja
</a>
<?php
}else{
?>
<a  class="btn btn-primary disabled"><i class="glyphicon glyphicon-check"></i> Selesai Belanja</a>
<?php } ?>

   </div>
</div>

<script type="text/javascript">
var table;
$(function(){
   table = $('.table-keranjang').DataTable({
      "dom" : 'rt',
      "bSort" : false,
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/keranjang/dataOrder",
         "type" : "POST"
      }
   }); 
});

function changeValue(){
   $.ajax({
      url : "<?= BASE_PATH ?>/keranjang/update",
      type : "POST",
     data : $('#form-keranjang').serialize(),
      success : function(data){
      table.ajax.reload();
      },
      error : function(){
         alert("Tidak dapat mengubah data!");
      }
   });
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/keranjang/batal/"+id,
         type : "GET",
         success : function(data){
            table.ajax.reload();
         },
         error : function(){
           alert("Tidak dapat menghapus data!");
         }
      });
   }
}
</script>
