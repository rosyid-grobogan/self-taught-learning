<?php 
function create_action($id, $edit=true, $delete=true){
	$button = "";
	if($edit) $button .= '<a class="btn btn-primary" onclick="editForm('.$id.')"><i class="glyphicon glyphicon-pencil"></i></a>';
	
	if($delete) $button .= ' <a class="btn btn-danger" onclick="deleteData('.$id.')"><i class="glyphicon glyphicon-trash"></i></a>';
	
	return $button;
}