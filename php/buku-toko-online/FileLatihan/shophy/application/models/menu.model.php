<?php
class MenuModel extends Model{
	public function __construct(){
		$this->connect();
		$this->_table = "menu";		
	}
}