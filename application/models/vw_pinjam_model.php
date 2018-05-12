<?php

class Vw_pinjam_Model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->_database = $this->db;
		$this->_table = "vw_pinjam";
	}
}
?>