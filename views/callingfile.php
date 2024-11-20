<?php
define('APPLICATION_LOADED', true);
require_once('../config/Config.php');
require_once('../config/Connect.php');

include_once('../public/PHPExcel/IOFactory.php');
include("../public/PHPExcel.php");



$case = $_GET['case'];
switch($case)
{
	case "addfile":
	if(isset($_POST['addfile']))
	{
		$p = $_GET['p'];
		$fileName = $_FILES['fileupload']['name'];
		$fileTemp = $_FILES['fileupload']['tmp_name'];

		$pprocess = $_POST['pprocess'];
		$cprocess = $_POST['cprocess'];
		$reporting = $_POST['reporting'];
		$campaign = $_POST['campaign'];

		$objExcel = PHPExcel_IOFactory::load($fileTemp);
		foreach($objExcel->getWorksheetIterator() as $worksheet)
		{
			$highestrow = $worksheet -> getHighestRow();

			for($row=2;$row<=$highestrow;$row++)
			{
				$empid = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
				$empname = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
				$emppdoj = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
				$unix_date = ($emppdoj - 25569) * 86400;
				$excel_date = 25569 + ($unix_date / 86400);
				$unix_date = ($excel_date - 25569) * 86400;
				$empdoj =  gmdate("Y-m-d", $unix_date);
				
				if($cprocess != "")
				{
					
					$sql = "INSERT INTO `qc_employdata`(`qc_empname`,`qc_empid`,`qc_empdoj`,`qc_emppro`,`qc_empchild`,`qc_reportingh`,`qc_campaign`,`qc_createdby`,`qc_createdon`,`qc_status`) VALUES('$empname','$empid','$empdoj','$pprocess','$cprocess','$reporting','$campaign','$uemail','$fulDate','1')";
					$resd = mysqli_query($conn->conn,$sql);
					if($resd == true)
					{
						echo "<script> alert('Data Save Successufully!'); window.location.href='".VIEW."$p';</script>";
					}
					else
					{
						echo "<script> alert('Somthing Went Wrong! Contact Admin'); window.location.href='".VIEW."$p';</script>";
					}
				}
				else
				{
					$sql = "INSERT INTO `qc_employdata`(`qc_empname`,`qc_empid`,`qc_empdoj`,`qc_emppro`,`qc_empchild`,`qc_reportingh`,`qc_campaign`,`qc_createdby`,`qc_createdon`,`qc_status`) VALUES('$empname','$empid','$empdoj','$pprocess','Null','$reporting','$campaign','$uemail','$fulDate','1')";
					$resd = mysqli_query($conn->conn,$sql);
					if($resd == true)
					{
						echo "<script> alert('Data Save Successufully!'); window.location.href='".VIEW."$p';</script>";
					}
					else
					{
						echo "<script> alert('Somthing Went Wrong! Contact Admin'); window.location.href='".VIEW."$p';</script>";
					}
				}
				

				
			}
		}
	}
	break;
}


?>