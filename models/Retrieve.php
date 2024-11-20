
<?php
require_once('../config/Config.php');

class Retrieve extends Config
{
	protected $keycol = "";
	protected $valcol = "";

	public function __construct()
	{
		parent::__construct();
	}

	public function singleData($table, $cond)
	{
		foreach($cond as $key => $val)
		{
			$this->keycol.="`$key` = '$val' AND ";
		}
		$keydata = rtrim($this->keycol,' AND ');
		$sql = "SELECT * FROM $table WHERE $keydata";
		$res = mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($res) > 0)
		{
		$row = mysqli_fetch_assoc($res);
		return $row;
		}
	}
	public function singleRow($table, $colname, $olist)
	{
		$sql = "SELECT $colname FROM $table $olist";
		$res = mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($res) > 0)
		{
		$row = mysqli_fetch_assoc($res);
		return $row;
		}
		
		
	}
	public function allData($table)
	{
		
		$sql = "SELECT * FROM $table";
		
		$res = mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($res) > 0)
		{
			while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
			{
				$rows[] = $row;
			}
			return $rows;
		}
		
	}
	public function allDatacond($table,$cond)
	{
		foreach($cond as $key => $val)
		{
			$this->keycol.="`$key` = '$val' AND ";
		}
		$keydata = rtrim($this->keycol,' AND ');
		
		$sql = "SELECT * FROM $table WHERE $keydata";
		$res = mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($res) > 0)
		{
			while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
			{
				$rows[] = $row;
			}
			return $rows;
		}
		
	}
	public function allDatasplcond($table,$cond,$splcon)
	{
		foreach($cond as $key => $val)
		{
			$this->keycol.="`$key` = '$val' AND ";
		}
		$keydata = rtrim($this->keycol,' AND ');
		
		$sql = "SELECT * FROM $table WHERE $keydata $splcon";
		$res = mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($res) > 0)
		{
			while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
			{
				$rows[] = $row;
			}
			return $rows;
		}
		
	}
}
?>