<?php
   create_title("Pengaturan");   
?>

<form id="form-pengaturan" class="form form-horizontal" method="post">   
<?php
$data = $data[0];
start_content();
   form_input("Judul Website", "judul", "text", 5, "", "value='$data[judul_website]'");
   form_mediapicker("Favicon", "favicon");
   form_input("Email", "email", "text", 5, "", "value='$data[email]'");
   form_input("Alamat", "alamat", "text", 5, "", "value='$data[alamat]'");

   $list = array();
   form_combobox("Provinsi", "provinsi", $list, 5, "", "value='$data[provinsi]'");

   $list = array();
   form_combobox("Kabupaten / Kota", "kota", $list, 5, "", "value='$data[kota]'");

   form_input("Telpon", "telp", "text", 5, "", "value='$data[telp]'");
   form_input("SMS", "sms", "text", 5, "", "value='$data[sms]'");
   form_input("Bank", "bank", "text", 5, "", "value='$data[bank]'");
   form_input("Pemilik Rekening", "pemilik", "text", 5, "", "value='$data[pemilik_rekening]'");
   form_input("No. Rekening", "rekening", "text", 5, "", "value='$data[rekening]'");
   form_input("Facebook", "facebook", "text", 5, "", "value='$data[facebook]'");
   form_input("Twitter", "twitter", "text", 5, "", "value='$data[twitter]'");
   form_input("Instagram", "instagram", "text", 5, "", "value='$data[instagram]'");
   
   echo '<div class="col-sm-offset-2"> ';
   create_button("Simpan Perubahan", "primary", "", "floppy-disk");
   echo '</div>';
   
end_content();
?>
</form>

<script type="text/javascript">
$(function(){
   $('#favicon').val('<?= $data['favicon'] ?>');
   $('#img-favicon').html('<br><img src="<?= BASE_PATH ?>/public/images/thumbs/<?= $data['favicon'] ?>" width="150">');
   
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/pengaturan/get_provinsi",
      type : "GET",
      dataType : "JSON",
      success : function(data){
      var prov = data.rajaongkir.results;
        for(i=0; i<prov.length; i++){
          $('#provinsi').prepend('<option value="' +prov[i].province_id+'">'+prov[i].province+'</option>');
        }
		$('#provinsi').val(<?= $data['provinsi'] ?>);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
    });
    
	ubahProvinsi();
	
    $('#provinsi').change(function(){
      ubahProvinsi();
    });

   $('#form-pengaturan').submit(function(){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/pengaturan/update",
         type : "POST",
         data : $('#form-pengaturan').serialize(),
         success : function(data){
            if(data == 'success') alert('Perubahan telah disimpan');
            else alert(data);
         },
         error : function(){
           alert("Tidak dapat menyimpan data!");
         }   
      });
      return false;
   });
});

function ubahProvinsi(){
	$('#kota').html('<option>- Pilih -</option>');
    $.ajax({
      url : "<?= BASE_PATH ?>/admin/pengaturan/get_kota/"+$('#provinsi').val(),
      type : "GET",
      dataType : "JSON",
      success : function(data){
       var city = data.rajaongkir.results;
       for(a=0; a<city.length; a++){
          $('#kota').prepend('<option value="' +city[a].city_id+'">'+city[a].city_name+'</option>');
       }
	   $('#kota').val(<?= $data['kota'] ?>);
      },
      error : function(){
        alert("Tidak dapat menampilkan data!");
      }
    });
}
</script>