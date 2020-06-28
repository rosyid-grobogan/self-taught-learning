<?php
   create_title("Profil Admin");   
?>

<form id="form-setting" class="form form-horizontal" method="post">   
<?php
$data = $data[0];
start_content();
   form_input("Nama Lengkap", "nama_lengkap", "text", 4, "", 'value="'.$data['nama_lengkap'].'" readonly');
   form_input("Username", "username", "text", 4, "", 'value="'.$data['username'].'" readonly');
   form_input("Password Lama", "lama", "password", 4, "", "required");
   form_input("Password Baru", "baru", "password", 4, "", "required");
   form_input("Ulang Password", "ulang", "password", 4, "", "required");
   echo '<div class="col-sm-offset-2"> ';
   create_button("Simpan Perubahan", "primary", "", "floppy-disk");
   echo '</div>';
end_content();
?>
</form>

<script type="text/javascript">
$(function(){
   $('#form-setting').submit(function(){
      if($('#baru').val() != $('#ulang').val()){
         alert('Password Baru tidak sama dengan Ulang Password');
      }else{
         $.ajax({
            url : "<?= BASE_PATH ?>/admin/profil/update",
            type : "POST",
            data : $('#form-setting').serialize(),
            success : function(data){
               if(data == 'success') alert('Perubahan telah disimpan');
               else alert(data);
            },
            error : function(){
              alert("Tidak dapat menyimpan data!");
            }   
         });
      }
      return false;
   });
});
</script>