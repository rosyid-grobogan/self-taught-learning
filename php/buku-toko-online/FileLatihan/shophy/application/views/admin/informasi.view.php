<?php
create_title("Data Informasi");
   
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Judul", "Slug", "Aksi"));
end_content();

start_modal('modal-form', 'return saveData()');
   form_input("Judul", "judul", "text", 8, "", "required");
   form_input("Slug", "slug", "text", 6, "", "required");
   form_textarea("Konten", "konten", "richtext", "required");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/informasi/listData",
         "type" : "POST"
      }
   }); 
});

function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Informasi');
}

function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/informasi/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Informasi');
         
         $('#id').val(data.id_informasi);
         $('#judul').val(data.judul);
         $('#slug').val(data.slug);        
         tinymce.get('konten').setContent(data.konten);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/informasi/insert";
   else url = "<?= BASE_PATH ?>/admin/informasi/update";
   
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form form').serialize(),
      success : function(data){
         $('#modal-form').modal('hide');
         table.ajax.reload();
      },
        error : function(){
        alert("Tidak dapat menyimpan data!");
      }   
   });
   return false;
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/informasi/delete/"+id,
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