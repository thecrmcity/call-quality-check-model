<?php


if(!defined('APPLICATION_LOADED') || !APPLICATION_LOADED)
{
	die('No Directory Script Access');
}

// Database Configration 
require_once('Database.php');
class Config
{
	public $conn = "";
	

	public function __construct()
	{
		$conx = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die('Connection Lost! Please Check Database Connection.'. mysqli_connect_error());
		return $this->conn=$conx;
	}
}

$conn = new Config();

?>