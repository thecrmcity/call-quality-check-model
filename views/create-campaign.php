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
					<div class="col-lg-6 col-md-6">
						<div class="card card-info">
							<div class="card-header">
								<button class="right-btn" onclick="document.getElementById('posform').style.display='block'"><i class="fa fa-plus"></i> Campaign</button>
							</div>
							<div class="card-body">
								<div class="data-table">
									<table class="table table-striped">
										<tr>
										<td>S.No</td>
										<td>Campaign</td>
										<td>Map_Process</td>
										<td>Map_Child</td>
										<td>Start</td>
										<td>End</td>
										<td>Action</td>
										</tr>
										<?php
										$nums =1;
										$reuse = new Retrieve();
										$table = "qc_campaign";
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
												<td><?php echo $des['qc_campname'];?></td>
												<td><?php echo $des['qc_maprocess'];?></td>
												<td><?php echo $des['qc_childprocess'];?></td>
												<td><?php echo $des['qc_campstart'];?></td>
												<td><?php echo $des['qc_campend'];?></td>
												<td><a href="create-campaign.php?g=<?php echo $des['qc_sno'];?>" class="text-primary"><i class="fa fa-edit"></i></a> | <a href="functions.php?case=delpos&p=<?php echo basename($_SERVER['PHP_SELF'])?>&g=<?php echo $des['qc_sno'];?>" class="text-danger" onclick="return confirm('Are you Sure!')"><i class="fa fa-trash"></i></a></td>
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
					<div class="col-lg-6 col-md-6">
						<?php
						if(isset($_GET['g']))
						{
							$g = $_GET['g'];
							$table = "qc_campaign";
							$cond = array(
								'qc_sno' => $g
							);
							$reuse = new Retrieve();
							$sdata = $reuse->singleData($table, $cond)
							?>
							<form class="" method="POST" action="functions.php?case=campupdate&p=<?php echo basename($_SERVER['PHP_SELF'])?>&g=<?php echo $_GET['g'];?>">
			<div class="paraform">
				<h4>Edit Campaign</h4>

			
			<div class="form-group">
				<label>Campaign Name :</label>
				<input type="text" name="campaign" value="<?php echo $sdata['qc_campname'];?>"  class="form-control" required>
			</div>
			<br>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Select Parent Process :</label>
				<select class="form-control" name="pprocess" required>
					<option value="<?php echo $sdata['qc_maprocess'];?>" selected><?php echo $sdata['qc_maprocess'];?></option>
					<?php
						$reuse = new Retrieve();
						$table = "qc_subprocess";
						$cond = array(
							'qc_protype' => 'Parent',
							'qc_status' => '1',
							'qc_createdby' => $uemail
						);
						$desta	= $reuse->allDatacond($table,$cond);
						if(is_array($desta) || is_object($desta))
						{
							foreach($desta as $des)
							{

							?>
							<option value="<?php echo $des['qc_process'];?>"><?php echo $des['qc_process'];?></option>
							<?php
						}
					}
							?>
				</select>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Select Child Process :</label>
				<select class="form-control" name="cprocess">
					<option value="<?php echo $sdata['qc_childprocess'];?>" selected><?php echo $sdata['qc_childprocess'];?></option>
					<?php
						$reuse = new Retrieve();
						$table = "qc_subprocess";
						$cond = array(
							'qc_protype' => 'Child',
							'qc_status' => '1',
							'qc_createdby' => $uemail
						);
						$desta	= $reuse->allDatacond($table,$cond);
						if(is_array($desta) || is_object($desta))
						{
							foreach($desta as $des)
							{

							?>
							<option value="<?php echo $des['qc_process'];?>"><?php echo $des['qc_process'];?></option>
							<?php
						}
					}
							?>
				</select>
				</div>

			</div>
			<br>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Start Time :</label>
					<input type="time" name="stime" value="<?php echo $sdata['qc_campstart'];?>" required class="form-control">
				</div>
				<div class="col-lg-6 col-md-6">
					<label>End Time :</label>
					<input type="time" name="etime" value="<?php echo $sdata['qc_campend'];?>" required class="form-control">
				</div>
			</div>
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
		<form class="" method="POST" action="functions.php?case=campaign&p=<?php echo basename($_SERVER['PHP_SELF'])?>">
			<div class="paraform">
				<h4>Create Campaign</h4>

			
			<div class="form-group">
				<label>Campaign Name :</label>
				<input type="text" name="campaign" value="" placeholder="Enter Campaign Name" class="form-control" required>
			</div>
			<br>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Select Parent Process :</label>
				<select class="form-control" name="pprocess" required>
					<option hidden>Parent Process</option>
					<?php
						$reuse = new Retrieve();
						$table = "qc_subprocess";
						$cond = array(
							'qc_protype' => 'Parent',
							'qc_status' => '1',
							'qc_createdby' => $uemail
						);
						$desta	= $reuse->allDatacond($table,$cond);
						if(is_array($desta) || is_object($desta))
						{
							foreach($desta as $des)
							{

							?>
							<option value="<?php echo $des['qc_process'];?>"><?php echo $des['qc_process'];?></option>
							<?php
						}
					}
							?>
				</select>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Select Child Process :</label>
				<select class="form-control" name="cprocess">
					<option hidden>Child Process</option>
					<?php
						$reuse = new Retrieve();
						$table = "qc_subprocess";
						$cond = array(
							'qc_protype' => 'Child',
							'qc_status' => '1',
							'qc_createdby' => $uemail
						);
						$desta	= $reuse->allDatacond($table,$cond);
						if(is_array($desta) || is_object($desta))
						{
							foreach($desta as $des)
							{

							?>
							<option value="<?php echo $des['qc_process'];?>"><?php echo $des['qc_process'];?></option>
							<?php
						}
					}
							?>
				</select>
				</div>

			</div>
			<br>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Start Time :</label>
					<input type="time" name="stime" value="" required class="form-control">
				</div>
				<div class="col-lg-6 col-md-6">
					<label>End Time :</label>
					<input type="time" name="etime" value="" required class="form-control">
				</div>
			</div>
			</div>
			
			<div class="form-group popbtn">
				<input type="submit" name="savecamp" value="Submit" class="btn btn-primary">
				<span class="btn btn-danger ms-2" onclick="document.getElementById('posform').style.display='none'"><i class="fa fa-close"></i> Close</span>
			</div>
		</form>
	</div>
</div>

<?php

include('footer.php');
?>