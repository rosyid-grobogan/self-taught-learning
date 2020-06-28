<?php
create_title("Data Pesan");
   
start_content();
   create_table(array("Pengirim", "Pesan", "Aksi"));
end_content();

?>

<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/pesan/listData",
         "type" : "POST"
      }
   }); 
});

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/pesan/delete/"+id,
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