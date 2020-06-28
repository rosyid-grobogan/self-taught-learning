<?php
create_title("Data Menu");
   
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Nama Menu", "Jenis Link", "Link", "Urutan", "Aksi"));
end_content();

start_modal('modal-form', 'return saveData()');
   form_input("Nama Menu", "menu", "text", 5, "", "required");
   
   $list = array();
   foreach($data as $d){
      $key = $d['id_menu'];
      $list[$key] = $d['nama_menu'];
   }
   form_combobox('Induk', 'induk', $list, 4);
   
   $list = array('modul'=>'Modul', 'kategori'=>'Kategori', 'informasi'=>'Informasi');
   form_combobox('Jenis Link', 'jenis_link', $list, 4, '', 'required');
   
   $list = array();
   form_combobox('Link', 'link', $list, 5, '', 'required');
   
   form_input("Urutan", "urutan", "number", 2, "", "required");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/menu/listData",
         "type" : "POST"
      }
   }); 

//Memanggil fungsi getLink ketika jenis link dipilih
   $('#jenis_link').change(function(){
      getLink($(this).val());
   });
});

//Fungsi untuk mengubah pilihan link dengan AJAX
function getLink(val){
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/menu/datalink/"+val,
      type : "GET",
      success : function(data){
         $('#link').html(data);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Menu');
}

function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/menu/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Menu');
         
         $('#id').val(data.id_menu);
         $('#menu').val(data.nama_menu);
         $('#induk').val(data.induk);
         $('#jenis_link').val(data.jenis_link);
		 //Memanggil fungsi getLink
         getLink(data.jenis_link);
         $('#link').val(data.link);
         $('#urutan').val(data.urutan);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/menu/insert";
   else url = "<?= BASE_PATH ?>/admin/menu/update";
   
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
         url : "<?= BASE_PATH ?>/admin/menu/delete/"+id,
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