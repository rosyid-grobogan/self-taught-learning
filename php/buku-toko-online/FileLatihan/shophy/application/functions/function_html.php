<?php
//Fungsi untuk memanggil file CSS
function load_css($path){
	echo '<link rel="stylesheet" type="text/css" href="'.BASE_PATH.'/public/'.$path.'">';
}

//Fungsi untuk memanggil file Javascript
function load_script($path){
	echo '<script type="text/javascript" src="'.BASE_PATH.'/public/'.$path.'"></script>';
}

//Fungsi untuk membuat menu pada halaman administrator
function create_menu($link, $icon, $title){
	global $url;
	$class = ($link==$url) ? "active" : "";
	echo '<li class="'.$class.'"><a href="'.BASE_PATH.'/'.$link.'"><i class="glyphicon glyphicon-'.$icon.'"></i> '.$title.'</a></li>';
}

//Fungsi untuk membuat ikon panel pada dashboard halaman administrator 
function create_panel($color, $icon, $number, $text){
	echo '<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-'.$color.' panel-widget ">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<i class="glyphicon glyphicon-'.$icon.'"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large">'.$number.'</div>
					<div class="text-muted">'.$text.'</div>
				</div>
			</div>
		</div>
	</div>';
}

//Fungsi untuk membuat judul halaman
function create_title($text){
	echo '<h2 class="page-header">'.$text.'</h2>';
}	

//Fungsi untuk mengawali bagian konten halaman administrator
function start_content(){
	echo '<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">';
}

//Fungsi untuk mengakhiri bagian konten halaman administrator
function end_content(){
	echo '</div></div></div></div>';
}

//Fungsi untuk membuat tombol
function create_button($text, $color, $onclick, $icon, $size='md'){
	echo '<button class="btn btn-'.$color.' btn-'.$size.'" onclick="'.$onclick.'"><i class="glyphicon glyphicon-'.$icon.'"></i> '.$text.'</button>';
}

//Fungsi untuk membuat tabel
function create_table($column, $content=""){
   echo'<hr/><div class="table-responsive">
   <table class="table table-striped" width="100%">
   <thead><tr>
   <th style="width: 10px">No</th>';

	foreach($column as $col){
	   echo '<th>'.$col.'</th>';
	}			
	
   echo '</tr></thead>
   <tbody>';
   if(is_array($content)){
      foreach($content as $cnt){
		echo '<td>'.$cnt.'</td>';
      }
   }
   echo '</tbody>
   </table>
   </div><br/>';
}

//Fungsi untuk mengawali modal form
function start_modal($id, $action=''){
	echo '<div class="modal" id="'.$id.'" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
	  
   <form class="form-horizontal" method="post" onsubmit="'.$action.'">
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title"></h3>
   </div>
				
   <div class="modal-body">
      <input type="hidden" name="id" id="id">';
}

//Fungsi untuk mengakhiri modal form
function end_modal(){
	echo '</div>
   
   <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-save"> 
		<i class="glyphicon glyphicon-floppy-disk"></i> Simpan 
      </button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">  	 
	    <i class="glyphicon glyphicon-remove-sign"></i> Batal
	  </button>
   </div>
		
   </form>

         </div>
      </div>
   </div>';
}

//Fungsi untuk membuat kotak input
function form_input($label, $name, $type="text", $width='5', $class="", $attr=""){
   echo'<div class="form-group">
   <label for="'.$name.'" class="col-sm-2 control-label"> '.$label.'</label>
   <div class="col-sm-'.$width.'">
      <input type="'.$type.'" class="form-control '.$class.'" id="'.$name.'" name="'.$name.'" '.$attr.'>
   </div> </div>';
}

//Fungsi untuk membuat textarea
function form_textarea($label, $name, $class='', $attr=''){
   echo'<div class="form-group">
   <label for="'.$name.'" class="col-sm-2 control-label"> '.$label.'</label>
   <div class="col-sm-10">
     <textarea class="form-control '.$class.'" id="'.$name.'" rows="8" name="'.$name.'" '.$attr.'></textarea>
   </div> </div>';
}

//Fungsi untuk membuat combobox / select box
function form_combobox($label, $name, $list, $width='5', $class="", $attr=""){
   echo'<div class="form-group">
   <label for="'.$name.'" class="col-sm-2 control-label"> '.$label.'</label>
   <div class="col-sm-'.$width.'">
      <select class="form-control '.$class.'" name="'.$name.'" id="'.$name.'" '.$attr.'>
         <option value="">- Pilih -</option>';

foreach($list as $key => $val){
   echo '<option value='.$key.'>'.$val.'</option>';
}
	
   echo '</select>
   </div> </div>';
}

//Fungsi untuk membuat media picker
function form_mediapicker($label, $nama, $lebar='4', $tipe="0", $modal_id="" ){
	?>
		<script>
			$(function(){
				$('#filemanager-<?= $nama ?>').on('hidden.bs.modal', function (e) {
					var url = $('#<?= $nama ?>').val();
					$('#<?= $modal_id ?>').modal('show');
					$('#img-<?= $nama ?>').html('<br><img src="<?= BASE_PATH ?>/public/images/thumbs/'+url+'">');
				})
			});
		</script>
	<?php
	echo '<div class="form-group">
			<label for="'.$nama.'" class="col-sm-2 control-label">'.$label.'</label>
			<div class="col-sm-'.$lebar.'">
			<div class="input-group">
			  <input type="text" class="form-control input-'.$nama.'" id="'.$nama.'" name="'.$nama.'"  readonly>
			  <a data-toggle="modal" data-target="#filemanager-'.$nama.'" class="input-group-addon btn btn-primary pilih-'.$nama.'">...</a>
			</div>
			<div id="img-'.$nama.'"></div>
			</div>
		</div>';
	
	echo '<div class="modal" id="filemanager-'.$nama.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="title" id="myModalLabel">File Manager</h4>
					</div>
					<div class="modal-body">
						<iframe src="'.BASE_PATH.'/public/filemanager/dialog.php?type='.$tipe.'&field_id='.$nama.'&relative_url=1" width="100%" height="400" style="border: 0"></iframe>
					</div>
				</div>
			</div>
		</div>';
}