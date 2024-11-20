<?php

session_start();
if(!defined('APPLICATION_LOADED') || !APPLICATION_LOADED)
{
	die('No Directory Script Access');
}

if(isset($_SESSION['uemail']))
{
$uname = $_SESSION['uname'];
$uemail = $_SESSION['uemail'];
}
date_default_timezone_set('Asia/Kolkata');
$fulDate = date('Y-m-d h:i:s');
$onlyDate = date('Y-m-d');
$act = "1";
$dct = "0";
class Connect
{
	public function __construct()
	{
		$this->init();
		$this->autoload();
		
	}
	public function init()
	{
			
			$link = "http://localhost/qcmodel/";
			define('BASE_URL',$link);
			define("CRM_NAME","Silaris QC Modal");
			define("DS", DIRECTORY_SEPARATOR);
			define("US", "/");

			define("ASET",BASE_URL.'assets'.US);
			define("CONF",BASE_URL.'config'.US);
			define("CONT",BASE_URL.'controllers'.US);
			define("MODL",BASE_URL.'models'.US);
			define("VIEW",BASE_URL.'views'.US);
			define("PUB",BASE_URL.'public'.US);

			define("DPC",CONF.'Config'.US);
			define("CNT",CONF.'Connect'.US);

			
			

	}
	public function autoload()
	{
		spl_autoload_register(array(__CLASS__,'load'));
	}
	public function load($classname)
	{
		switch($classname)
		{
			case "Logpage":
			require_once("../controllers/$classname.php");
			break;
			case "Calling":
			require_once("../controllers/$classname.php");
			break;

			case "Retrieve":
			require_once("../models/$classname.php");
			break;
			
		}
	}
	public function dispatchHead()
	{
		echo '
			<link rel="stylesheet" type="text/css" href="'.ASET.'css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="'.ASET.'css/font-awesome.css">
			<link rel="stylesheet" type="text/css" href="'.ASET.'css/style.css">
			<link rel="icon" type="image/x-icon" href="'.ASET.'img/fevicon.png">
			<link rel="stylesheet" type="text/css" href="'.ASET.'css/responsive.css">
			<script src="'.ASET.'js/jquery.js" type="text/javascript" charset="utf-8"></script>
			<script src="'.ASET.'js/Chart.min.js" type="text/javascript" charset="utf-8"></script>
		';
	}
	public function dispatchFoot()
	{
		echo '
			<script src="'.ASET.'js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
			<script src="'.ASET.'js/Chart.min.js" type="text/javascript" charset="utf-8"></script>
			<script src="'.ASET.'js/loader.js" type="text/javascript" charset="utf-8"></script>
		';
	}
}
$obj = new Connect();