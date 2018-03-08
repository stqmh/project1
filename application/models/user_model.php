<?php

class User_Model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->_database = $this->db;
		$this->_table = "user";
	}
}
?>