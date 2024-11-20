<?php
session_start();
define('APPLICATION_LOADED', true);
require_once('../config/Config.php');

class Logpage extends Config
{
	protected $keycol = "";
	protected $valcol = "";

	public function __construct()
	{
		parent::__construct();
	}
	public function login($table,$cond)
	{
		foreach($cond as $key => $val)
		{
			$this->keycol.="`$key` = '$val' AND ";
		}
		$keydata = rtrim($this->keycol,' AND ');
		$sql = "SELECT * FROM $table WHERE $keydata";
		$res = mysqli_query($this->conn,$sql);
		$row = mysqli_fetch_assoc($res);
		return $row;
	}
}
$log = new Logpage();
if(isset($_POST['userlogin']))
{
	$usernam = $_POST['usernam'];
	$userpas = $_POST['userpas'];
	$table = "qc_oprators";
	$cond = array(
		'qc_useremail' => $usernam,
		'qc_password' => $userpas,
		'qc_status' => '1'
	);
	$rows = $log->login($table,$cond);
	if($rows == true)
	{
		
		foreach($rows as $row)
		{
			$rod[] = $row;
		}

		$_SESSION['uname'] = $rod[1];
		$_SESSION['uemail'] = $rod[2];
		header('Location:../views/dashboard.php');
	}
	else
	{
	echo "<script> alert('Username and Password Wrong. Try Again'); window.location.href='../index.php';</script>";
	}
}