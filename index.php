<?php
// Front of this application calling from config files
define('APPLICATION_LOADED', true);
require __DIR__.'/config/Connect.php';


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
	<div class="loginpage">
		<div class="login-head">
				<img src="<?php  echo ASET?>img/silaris-qc.png">
			<p><strong>Dialer Quality Control Software</strong></p>
				<span><small><?php echo date('Y')?> &reg; by Silaris Informations Pvt Ltd</small></span>
			</div>
		<div class="login-blk">
			
			
				<form class="" method="POST" action="<?php echo CONT?>Logpage.php">
					<div class="login-form">
					<br>
				<div class="row">
					<div class="col-lg-4 col-md-4">Username / Email :</div>
					<div class="col-lg-8 col-md-8"><input type="text" name="usernam" class="form-control" required placeholder="email"> </div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-4 col-md-4">Password :</div>
					<div class="col-lg-8 col-md-8"><input type="password" name="userpas" class="form-control" required placeholder="password"></div>
				</div>
				</div>
				<br>
				<div class="btnset">
					<input type="submit" name="userlogin" class="logbtn" value="Login">
				</div>
				
				</form>
			
		</div>
	</div>
<?php $obj->dispatchFoot();?>

</body>
</html>
