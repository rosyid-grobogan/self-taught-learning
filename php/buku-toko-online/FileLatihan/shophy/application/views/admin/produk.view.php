<?php
create_title("Data Produk");

//Membuat tabel   
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Gambar Produk", "Nama Produk", "Kategori", "Berat", "Stok", "Harga", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Nama Produk", "produk", "text", 5, "", "required");
   form_input("Slug", "slug", "text", 5, "", "required");
   
   $list = array();
   foreach($data as $d){
      $key = $d['id_kategori'];
      $list[$key] = $d['nama_kategori'];
   }
   form_combobox('Kategori Produk', 'kategori', $list, 4);
   
   form_mediapicker("Gambar Produk", "gambar", 4, 0, "modal-form");
   
   form_input("Harga", "harga", "number", 4, "", "required");
   form_input("Berat (Kg)", "berat", "text", 2, "", "required");
   form_input("Stok", "stok", "number", 2, "", "required");
   form_textarea("Deskripsi", "deskripsi", "richtext");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/produk/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Produk');
   $('#img-gambar').html('');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/produk/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Produk');
         
         $('#id').val(data.id_produk);
         $('#produk').val(data.nama_produk);
         $('#slug').val(data.slug);
         $('#kategori').val(data.id_kategori);
         $('#gambar').val(data.gambar);
       $('#img-gambar').html('<br><img src="<?= BASE_PATH ?>/public/images/source/'+data.gambar+'" width="150">');
         $('#harga').val(data.harga);
         $('#stok').val(data.stok);
         $('#berat').val(data.berat);
         tinymce.get('deskripsi').setContent(data.deskripsi);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/produk/insert";
   else url = "<?= BASE_PATH ?>/admin/produk/update";
   
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form form').serialize(),
      success : function(data){
         if(data=='success'){
            $('#modal-form').modal('hide');
            table.ajax.reload();
         }else{
            alert(data);
         }
      },
        error : function(){
        alert("Tidak dapat menyimpan data!");
      }   
   });
   return false;
}

//Menghapus data dengan AJAX
function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/produk/delete/"+id,
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