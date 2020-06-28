<div class="panel panel-default">
   <div class="panel-body">
   
<h2 class="page-header">Biodata Pemesan</h2>
<form class="form form-horizontal form-biodata" data-toggle="validator" method="post" action="<?= BASE_PATH ?>/biodata/simpan">

   
<?php
form_input("Nama Penerima", "nama", "text", 8, "", "required data-error='Nama harus diisi'");
form_input("Email", "email", "email", 8, "", "required data-error='Email harus diisi dengan yang valid'");
form_input("Telepon", "telepon", "text", 8, "", "required data-error='Telepon harus diisi'");
form_input("Alamat Lengkap", "alamat", "text", 8, "", "required data-error='Alamat Lengkap harus diisi'");

$list = array();
form_combobox("Provinsi", "provinsi", $list, 8, "", "required data-error='Provinsi harus diisi'");

$list = array();
form_combobox("Kabupaten / Kota", "kota", $list, 8, "", "required  data-error='Kabupaten harus diisi'");

echo '<div class="col-sm-offset-2"> &nbsp;';
create_button("Simpan Biodata", "primary", "", "floppy-disk");
echo '</div>';
?>
</form>

   </div>
</div>

<script>
$(function(){
   $('.form-biodata .form-control').after('<div class="help-block with-errors"></div>');
    $.ajax({
      url : "<?= BASE_PATH ?>/biodata/get_provinsi",
      type : "GET",
      dataType : "JSON",
      success : function(data){
      var prov = data.rajaongkir.results;
      for(i=0; i<prov.length; i++){
         $('#provinsi').prepend('<option value="'+prov[i].province_id+'">'+prov[i].province+'</option>');
      }
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
    });
   
   $('#provinsi').change(function(){
      $('#kota').html('<option>- Pilih -</option>');
      $.ajax({
        url : "<?= BASE_PATH ?>/biodata/get_kota/"+$(this).val(),
        type : "GET",
        dataType : "JSON",
        success : function(data){
         var city = data.rajaongkir.results;
         for(a=0; a<city.length; a++){
            $('#kota').prepend('<option value="'+city[a].city_id+'">'+city[a].city_name+'</option>');
         }
        },
        error : function(){
          alert("Tidak dapat menampilkan data!");
        }
      });
   });
});
</script>
