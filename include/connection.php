<?php
date_default_timezone_set("Asia/Manila");
class connection
{
	private $host = "localhost";
	private $db = "ns-track";
	private $db_user = "root";
	private $db_pass = "";
	
	function connectionString():mysqli{ 
		return new mysqli($this->host,$this->db_user,$this->db_pass,$this->db);
	}
	function __construct()
	{
		
	}
}
// $conn = new connection();
// $conn = $conn->connectionString();
?>