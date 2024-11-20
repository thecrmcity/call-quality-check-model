<?php
define('APPLICATION_LOADED', true);
require_once('../config/Connect.php');
if(!isset($_SESSION['uemail']))
{
 header('Location:../index.php');
 session_destroy();
}
$page_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
$pageName = ucfirst($page_name);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo CRM_NAME;?></title>
	<?php $obj->dispatchHead();?>
</head>
<body>
	
