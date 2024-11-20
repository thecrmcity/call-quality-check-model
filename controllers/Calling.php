<?php

require_once('../config/Config.php');
require_once('../config/Connect.php');

class Calling extends Config
{
	protected $keycol = "";
	protected $valcol = "";

	public function __construct()
	{
		parent::__construct();
	}
	public function insertData($table, $data,$p)
	{
		foreach($data as $key => $val)
		{
			$this->keycol.="`$key`, ";
			$this->valcol.="'$val', ";
		}
		$keydata = rtrim($this->keycol,", ");
		$valdata = rtrim($this->valcol,", ");

		$sql = "INSERT INTO $table($keydata) VALUES($valdata)";
		$resd = mysqli_query($this->conn,$sql);
		if($resd == true)
		{
			echo "<script> alert('Data Save Successufully!'); window.location.href='".VIEW."$p';</script>";
		}
		else
		{
			echo "<script> alert('Somthing Went Wrong! Contact Admin'); window.location.href='".VIEW."$p';</script>";
		}

	}
	public function updateData($table, $data, $cond, $p)
	{
		foreach($data as $key => $val)
		{
			$this->keycol.="`$key`='$val', ";
			
		}
		$keydata = rtrim($this->keycol,", ");

		foreach($cond as $sey => $sal)
		{
			$this->valcol.="`$sey`='$sal' AND ";
			
		}
		$valdata = rtrim($this->valcol," AND ");

		$sql = "UPDATE $table SET $keydata  WHERE $valdata";
		
		$resm = mysqli_query($this->conn,$sql);
		if($resm == true)
		{
			echo "<script> alert('Data Update Successufully!'); window.location.href='".VIEW."$p';</script>";
		}
		else
		{
			echo "<script> alert('Somthing Went Wrong!'); window.location.href='".VIEW."$p';</script>";
		}

	}
	public function deleteData($table, $data, $cond, $p)
	{
		foreach($data as $key => $val)
		{
			$this->keycol.="`$key`='$val', ";
			
		}
		$keydata = rtrim($this->keycol,", ");

		foreach($cond as $sey => $sal)
		{
			$this->valcol.="`$sey`='$sal' AND ";
			
		}
		$valdata = rtrim($this->valcol," AND ");

		$sql = "UPDATE $table SET $keydata  WHERE $valdata";
		
		$resm = mysqli_query($this->conn,$sql);
		if($resm == true)
		{
			echo "<script> alert('Data Delete Successufully!'); window.location.href='".VIEW."$p';</script>";
		}
		else
		{
			echo "<script> alert('Somthing Went Wrong!'); window.location.href='".VIEW."$p';</script>";
		}

	}
}