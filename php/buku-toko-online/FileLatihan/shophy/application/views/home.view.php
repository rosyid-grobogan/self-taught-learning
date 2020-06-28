<div class="row" id="produk">

<?php
foreach($data['produk'] as $produk){
   echo "<div class='col-md-3 col-sm-4 col-xs-6'>
         <div class='box-produk'>
         <img src='".BASE_PATH."/public/images/thumbs/".$produk['gambar']."'>
         <h4 class='judul-produk'>$produk[nama_produk]</h4>
         <b class='harga-produk'>Rp. ".format_rupiah($produk['harga']).",-</b>
         <a href='".BASE_PATH."/produk/detail/$produk[slug]' class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-plus-sign'></i> More Info</a>
         </div>
      </div>";
}
?>   

</div>
<div class="loading"><img src="<?= BASE_PATH ?>/public/images/loading.gif"></div>
<button class="btn btn-default btn-load text-center" data-posisi="8">Load More ...</button>
   
<script type="text/javascript">
   var posisi;
   $(function(){
      $('.loading').hide();
      $('.btn-load').click(function(){
         $('.loading').show();
         posisi = parseInt($(this).attr('data-posisi'));
         $.ajax({
           url : "<?= BASE_PATH ?>/home/load/"+posisi,
           type : "GET",
           success : function(data){
             $('#produk').append(data);
             $('.btn-load').attr('data-posisi', posisi+8);
             $('.loading').hide();
           }
         });
      });
   });
</script>