<?php

include('header.php');
?>
<div class="wrapper-blk">
		<div class="sidebar-blk">
			<?php include('setting-sidebar.php');?>
		</div>
		<div class="mainbar-blk">
			<div class="top-strip">
				<?php include('top-strip.php');?>
				<div class="brudcrumb">
						<span>Breadcrumb : <?php echo $pageName;?></span>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="col-lg-3 col-md-3">
						<div class="card card-info">
							<div class="card-header">
								<button class="right-btn" onclick="document.getElementById('posform').style.display='block'"><i class="fa fa-plus"></i> Add Position</button>
							</div>
							<div class="card-body">
								<div class="data-table table-responsive">
									<table class="table table-striped">
										<tr>
										<td>S.No</td>
										<td>Details</td>
										<td>Action</td>
										</tr>
										<?php
										$nums =1;
										$reuse = new Retrieve();
										$table = "qc_empost";
										$cond = array(
											'qc_status' => '1',
											'qc_createdby' => $uemail
										);
										$desta	= $reuse->allDatacond($table,$cond);
										if(is_array($desta) || is_object($desta))
										{
											foreach($desta as $des)
											{
												?>
												<tr>
												<td><?php echo $nums;?></td>
												<td><?php echo $des['qc_empost'];?></td>
												<td><a href="add-position.php?g=<?php echo $des['qc_sno'];?>" class="text-primary"><i class="fa fa-edit"></i></a> | <a href="functions.php?case=delpos&p=<?php echo basename($_SERVER['PHP_SELF'])?>&g=<?php echo $des['qc_sno'];?>" class="text-danger" onclick="return confirm('Are you Sure!')"><i class="fa fa-trash"></i></a></td>
											</tr>
												<?php
												$nums++;
											}
										}
										?>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-9">
						<?php
						if(isset($_GET['g']))
						{
							$g = $_GET['g'];
							$table = "qc_empost";
							$cond = array(
								'qc_sno' => $g
							);
							$reuse = new Retrieve();
							$sdata = $reuse->singleData($table, $cond)
							?>
							<form class="" method="POST" action="functions.php?case=posupdate&p=<?php echo basename($_SERVER['PHP_SELF'])?>&g=<?php echo $_GET['g'];?>">
			<div class="paraform">
				<h4>Add Position</h4>

			
			<div class="form-group">
				<label>Position Name :</label>
				<input type="text" name="position" value="<?php echo $sdata['qc_empost'];?>" placeholder="Enter Position Name" class="form-control" required>
			</div>
			<br>
			
			</div>
			
			<div class="form-group popbtn">
				<input type="submit" name="updatepos" value="Submit" class="btn btn-primary">
				
			</div>
		</form>
							<?php

						}
						?>
					</div>

				</div>
			</div>
		</div>
	</div>

<div class="popupform" id="posform">
	<div class="popform">
		<form class="" method="POST" action="functions.php?case=position&p=<?php echo basename($_SERVER['PHP_SELF'])?>">
			<div class="paraform">
				<h4>Add Position</h4>

			
			<div class="form-group">
				<label>Position Name :</label>
				<input type="text" name="position" value="" placeholder="Enter Position Name" class="form-control" required>
			</div>
			<br>
			
			</div>
			
			<div class="form-group popbtn">
				<input type="submit" name="savepos" value="Submit" class="btn btn-primary">
				<span class="btn btn-danger ms-2" onclick="document.getElementById('posform').style.display='none'"><i class="fa fa-close"></i> Close</span>
			</div>
		</form>
	</div>
</div>

<?php

include('footer.php');
?>