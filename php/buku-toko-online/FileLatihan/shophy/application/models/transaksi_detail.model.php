<?php
class Transaksi_detailModel extends Model{
	public function __construct(){
		$this->connect();
		$this->_table = "transaksi_detail";		
	}
}