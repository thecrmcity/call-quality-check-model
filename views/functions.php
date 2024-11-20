<?php
define('APPLICATION_LOADED', true);
require_once('../config/Config.php');
require_once('../config/Connect.php');

$reuse = new Retrieve();
$calls = new Calling();


if(isset($_POST['parasave']))
{
	$p = $_GET['p'];
	$paramet = $_POST['paramet'];
	$filpara = str_replace("'", "\'", $paramet);
	$orderno = $_POST['orderno'];
	
	$table = "qc_parameters";
	
	$data = array(
		'qc_parameterdel' => $filpara,
		'qc_orderno' => $orderno,
		
		'qc_status' => '1',
		'qc_createdate' => $fulDate,
		'qc_createdby' => $uemail
	);
	$calls->insertData($table, $data, $p);


}
if(isset($_POST['paraupdate']))
{
	$p = $_GET['p'];
	$e =  $_GET['e'];
	$paramet = $_POST['paramet'];
	$filpara = str_replace("'", "\'", $paramet);
	$orderno = $_POST['orderno'];
	

	$table = "qc_parameters";
	$data = array(
		'qc_orderno' => $orderno,
		'qc_parameterdel' => $filpara,
		
		'qc_createdate' => $fulDate 
	);
	$cond = array(
		'qc_sno' => $e,
		'qc_status' => '1'
	);
	$calls->updateData($table, $data, $cond, $p);
}

if(isset($_GET['case']))
{
	$case = $_GET['case'];

	switch($case)
	{
		case "position":
		if(isset($_POST['savepos']))
		{
			$p = $_GET['p'];
			$position = $_POST['position'];

			$table = "qc_empost";
			$data = array(
				'qc_empost' => $position,
				'qc_createdby' => $uemail,
				'qc_createdon' => $fulDate,
				'qc_status' => '1'

			);
			$calls->insertData($table, $data,$p);
		}
		break;
		case "posupdate":
		if(isset($_POST['updatepos']))
		{
			$p = $_GET['p'];
			$g = $_GET['g'];
			$position = $_POST['position'];

			$table = "qc_empost";
			$data = array(
				'qc_empost' => $position
			);
			$cond = array(
				'qc_sno' => $g
			);
			$calls->updateData($table, $data, $cond, $p);

		}
		break;
		case "delpos":
		$p = $_GET['p'];
		$g = $_GET['g'];
		$position = $_POST['position'];

		$table = "qc_empost";
		$data = array(
			'qc_createdon' => $fulDate,
			'qc_status' => '0'

		);
		$cond = array(
			'qc_sno' => $g
		);
		$calls->deleteData($table, $data, $cond, $p);
		break;
		case "ques":
		if(isset($_POST['quesave']))
		{
			$p = $_GET['p'];
			$parameter = $_POST['parameter'];
			$fatal = $_POST['fatal'];
			$weightage = $_POST['weightage'];
			$qdetail = $_POST['qdetail'];
			$filparas = str_replace("'", "\'", $qdetail);

			$table = "qc_questions";
			$data = array(
				'qc_parameter' => $parameter,
				'qc_questions' => $filparas,
				'qc_createdon' => $fulDate,
				'qc_createdby' => $uemail,
				'qc_weightage' => $weightage,
				'qc_action' => $fatal,
				'qc_status' => '1'

			);
			$calls->insertData($table, $data,$p);
		}
		break;
		case "team":
		if(isset($_POST['saveteam']))
		{
			$p = $_GET['p'];
			$fname = $_POST['fname'];
			$preid = $_POST['preid'];
			$fempid = $_POST['fempid'];
			$empid = $preid.$fempid;
			$design = $_POST['design'];
			$fhead = $_POST['fhead'];
			$femail = $_POST['femail'];
			

			$table = "qc_suboprators";
			$data = array(
				'qc_name' => $fname,
				'qc_empid' => $empid,
				'qc_email' => $femail,
				'qc_post' => $design,
				'qc_reporting' => $fhead,
				'qc_createdby' => $uemail,
				'qc_createdon' => $fulDate,
				'qc_status' => '1'

			);
			$calls->insertData($table, $data,$p);
		}
		break;
		case "process":
		if(isset($_POST['savepro']))
		{
			$p = $_GET['p'];
			$process = $_POST['process'];
			$parent = $_POST['parent'];
			
			$table = "qc_subprocess";
			if($parent == "Parent")
			{
				$data = array(
					'qc_process' => $process,
					'qc_protype' => $parent,
					'qc_createdon' => $fulDate,
					'qc_createdby' => $uemail,
					'qc_status' => '1'

				);
			$calls->insertData($table, $data,$p);
			}
			else
			{
				$whichpar = $_POST['whichpar'];
			$data = array(
					'qc_process' => $process,
					'qc_protype' => $parent,
					'qc_parentnam' => $whichpar,
					'qc_createdon' => $fulDate,
					'qc_createdby' => $uemail,
					'qc_status' => '1'

				);
			$calls->insertData($table, $data,$p);
			}
			

			
		}
		break;
		case "campaign":
		if(isset($_POST['savecamp']))
		{
			$p = $_GET['p'];
			$campaign = $_POST['campaign'];
			$pprocess = $_POST['pprocess'];
			$cprocess = $_POST['cprocess'];
			$stime = $_POST['stime'];
			$etime = $_POST['etime'];

			if($cprocess != "")
			{
				$table = "qc_campaign";
				$data = array(
					'qc_campname' => $campaign,
					'qc_maprocess' => $pprocess,
					'qc_childprocess' => $cprocess,
					'qc_campstart' => $stime,
					'qc_campend' => $etime,
					'qc_createdby' => $uemail,
					'qc_createdon' => $fulDate,
					'qc_status' => '1'

				);
				$calls->insertData($table, $data,$p);
			}
			else
			{
				$table = "qc_campaign";
				$data = array(
					'qc_campname' => $campaign,
					'qc_maprocess' => $pprocess,
					'qc_childprocess' => "Null",
					'qc_campstart' => $stime,
					'qc_campend' => $etime,
					'qc_createdby' => $uemail,
					'qc_createdon' => $fulDate,
					'qc_status' => '1'

				);
				$calls->insertData($table, $data,$p);
			}

			
		}
		break;
		case "qagent":
		if(isset($_POST['saveagent']))
		{
			$p = $_GET['p'];
			$fname = $_POST['fname'];
			$preid = $_POST['preid'];
			$fempid = $_POST['fempid'];
			$empid = $preid.$fempid;
			$pprocess = $_POST['pprocess'];
			$cprocess = $_POST['cprocess'];
			$reporting =  $_POST['reporting'];
			$design = $_POST['design'];

			if($cprocess != "")
			{
				$table = "qc_agentdata";
				$data = array(
					'qc_agentname' => $fname,
					'qc_agentid' => $empid,
					'qc_agentprocess' => $pprocess,
					'qc_agentchildpro' => $cprocess,
					'qc_reportingm' => $reporting,
					'qc_designation' => $design,
					'qc_createdby' => $uemail,
					'qc_createdon' => $fulDate,
					'qc_status' => '1'

				);
				$calls->insertData($table, $data,$p);
			}
			else
			{
				$table = "qc_agentdata";
				$data = array(
					'qc_agentname' => $fname,
					'qc_agentid' => $empid,
					'qc_agentprocess' => $pprocess,
					'qc_agentchildpro' => "Null",
					'qc_reportingm' => $reporting,
					'qc_designation' => $design,
					'qc_createdby' => $uemail,
					'qc_createdon' => $fulDate,
					'qc_status' => '1'

				);
				$calls->insertData($table, $data,$p);
			}
		}
		break;
	}
}