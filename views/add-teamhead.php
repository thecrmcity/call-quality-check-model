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
								<button class="right-btn" onclick="document.getElementById('posform').style.display='block'"><i class="fa fa-plus"></i> Add Team</button>
							</div>
							<div class="card-body">
								<div class="data-table table-responsive">
									<table class="table table-striped">
										<tr>
										<td>S.No</td>
										<td>Employee_Name</td>
										<td>Employee_ID</td>
										<td>Designation</td>
										<td>Repoting_to</td>
										<td>Action</td>
										</tr>
										<?php
										$nums =1;
										$reuse = new Retrieve();
										$table = "qc_suboprators";
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
												<td><?php echo $des['qc_name'];?></td>
												<td><?php echo $des['qc_empid'];?></td>
												<td><?php echo $des['qc_post'];?></td>
												<td><?php echo $des['qc_reporting'];?></td>
												<td><a href="add-teamhead.php?g=<?php echo $des['qc_sno'];?>" class="text-primary"><i class="fa fa-edit"></i></a> | <a href="functions.php?case=delpos&p=<?php echo basename($_SERVER['PHP_SELF'])?>&g=<?php echo $des['qc_sno'];?>" class="text-danger" onclick="return confirm('Are you Sure!')"><i class="fa fa-trash"></i></a></td>
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
							$table = "qc_suboprators";
							$cond = array(
								'qc_sno' => $g
							);
							$reuse = new Retrieve();
							$sdata = $reuse->singleData($table, $cond)
							?>
							<form class="" method="POST" action="functions.php?case=teamupdate&p=<?php echo basename($_SERVER['PHP_SELF'])?>&g=<?php echo $_GET['g'];?>">

								<div class="paraform">
								<h4>Edit Team</h4>

							
							<div class="form-group">
								<label>Full Name :</label>
								<input type="text" name="fname" value="<?php echo $sdata['qc_name'];?>" placeholder="Enter Name" class="form-control" required>
							</div>
							<br>
							<div class="form-group">
								
									<label>Employee ID :</label>
									<input type="text" name="fempid" value="<?php echo $sdata['qc_empid'];?>" placeholder="Enter Employee ID" class="form-control" required>
							
								
							</div>
							
							<div class="form-group">
								<label>Designation :</label>
								<select class="form-control" name="design" required>
									<option value="<?php echo $sdata['qc_post'];?>" selected=""><?php echo $sdata['qc_post'];?></option>
									<?php
										
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
												<option value="<?php echo $des['qc_empost'];?>"><?php echo $des['qc_empost'];?></option>
												<?php
											}
										}
												?>
								</select>
							</div>
							<br>
							<div class="form-group row">
								<div class="col-lg-6 col-md-6">
									<label>Repoting to :</label>
									<input type="text" name="fhead" value="<?php echo $sdata['qc_reporting'];?>" placeholder="Repoting Head" class="form-control" required>
								</div>
								<div class="col-lg-6 col-md-6">
									<label>Email Address :<small>(optional)</small></label>
								<input type="text" name="femail" value="<?php echo $sdata['qc_email'];?>" placeholder="Enter Email" class="form-control">
								</div>

								
							</div>
							
							
							</div>
							
							<div class="form-group popbtn">
								<input type="submit" name="saveteam" value="Submit" class="btn btn-primary">
								
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
		<form class="" method="POST" action="functions.php?case=team&p=<?php echo basename($_SERVER['PHP_SELF'])?>">
			<div class="paraform">
				<h4>Add Team</h4>

			
			<div class="form-group">
				<label>Full Name :</label>
				<input type="text" name="fname" value="" placeholder="Enter Name" class="form-control" required>
			</div>
			<br>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					SIPLIND <input type="radio" name="preid" value="SIPLIND" checked> SIPLTEM <input type="radio" name="preid" value="SIPLTEM">
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Employee ID :<small>only numbers</small></label>
					<input type="number" name="fempid" value="" placeholder="Enter Employee ID" class="form-control" required>
				</div>
				
			</div>
			
			<div class="form-group">
				<label>Designation :</label>
				<select class="form-control" name="design" required>
					<option hidden>Select Designation</option>
					<?php
						
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
								<option value="<?php echo $des['qc_empost'];?>"><?php echo $des['qc_empost'];?></option>
								<?php
							}
						}
								?>
				</select>
			</div>
			<br>
			<div class="form-group row">
				<div class="col-lg-6 col-md-6">
					<label>Repoting to :</label>
					<input type="text" name="fhead" value="" placeholder="Repoting Head" class="form-control" required>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Email Address :<small>(optional)</small></label>
				<input type="text" name="femail" value="" placeholder="Enter Email" class="form-control">
				</div>

				
			</div>
			
			
			</div>
			
			<div class="form-group popbtn">
				<input type="submit" name="saveteam" value="Submit" class="btn btn-primary">
				<span class="btn btn-danger ms-2" onclick="document.getElementById('posform').style.display='none'"><i class="fa fa-close"></i> Close</span>
			</div>
		</form>
	</div>
</div>

<?php

include('footer.php');
?>