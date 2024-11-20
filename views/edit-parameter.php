<?php

include('header.php');
?>
<div class="wrapper-blk">
		<div class="sidebar-blk">
			<?php include('sidebar.php');?>
		</div>
		<div class="mainbar-blk">
			<div class="top-strip">
				<?php include('top-strip.php');?>
			</div>
			<div class="main-wrapper">
				<form class="" method="POST" action="functions.php?p=parameters.php&e=<?php echo $_GET['e'];?>">
			<div class="paraform">
				<h4>Edit Parameter</h4>

				<?php
					$e = $_GET['e'];
					$reuse = new Retrieve();
					$table = "qc_parameters";
					$cond = array(
						'qc_sno' => $e,
						'qc_status' => 1
					);
					$coal = $reuse->singleData($table, $cond);
				?>
			<div class="form-group">
				<label>Parameter</label>
				<textarea name="paramet" class="form-control"><?php echo $coal['qc_parameterdel'];?></textarea>
			</div>
			<br>
			<div class="row form-group">
				
				<div class="col-lg-4 col-md-4">
					<label>Order No</label>
					<input type="number" name="orderno" value="<?php echo $coal['qc_orderno'];?>" min="1" max="50" class="form-control">
				</div>
				

			</div>
			</div>
			
			<div class="form-group popbtn">
				<input type="submit" name="paraupdate" value="Update" class="btn btn-primary">
				
			</div>
		</form>
				
			</div>
		</div>
	</div>



<?php

include('footer.php');
?>