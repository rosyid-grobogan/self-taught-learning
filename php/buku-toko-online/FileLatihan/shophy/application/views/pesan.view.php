<div class="panel panel-default">
   <div class="panel-body">
   
<h2 class="page-header">Hubungi Kami</h2>
<form class="form form-horizontal form-pesan" method="post" data-toggle="validator" action="<?= BASE_PATH ?>/pesan/kirim_pesan">

<?php
   if(isset($data['msg'])){
      if(is_array($data['msg'])){
?>
   <div class="alert alert-danger">
      <ul>
<?php
      foreach($data['msg'] as $error){
         echo "<li>$error</li>";
      }
?>
      </ul>
   </div>
<?php
      }else{
         echo "<div class='alert alert-success'>$data[msg]</div>";
      }
   }
form_input("Nama", "nama", "text", 8, "", "required data-error='Nama harus diisi'");
form_input("Email", "email", "email", 8, "", "required data-error='Email harus diisi yang valid'");
form_input("subjek", "subjek", "text", 8, "", "required data-error='Subjek harus diisi'");
form_textarea("Pesan", "pesan", "", "required data-error='Pesan harus diisi'");
?>
   <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
         <div class="g-recaptcha" data-sitekey="6Ld1cRYTAAAAAKXeNX1yDkxW-PTElRCiwnB3460x"></div>
      </div>
   </div>
   
   <div class="col-sm-offset-2">&nbsp;
<?php create_button("Kirim Pesan", "primary", "", "send"); ?>
   </div>
</form>

   </div>
</div>
<script type="text/javascript">
   $(function(){
      $('.form-pesan .form-control').after('<div class="help-block with-errors"></div>');
   });
</script>