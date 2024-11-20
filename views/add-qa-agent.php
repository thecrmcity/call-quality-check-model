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
								<button class="right-btn" onclick="document.getElementById('posform').style.display='block'"><i class="fa fa-plus"></i> QA Agent</button>
							</div>
							<div class="card-body">
								<div class="data-table table-responsive">
									<table class="table table-striped">
										<tr>
										<td>S.No</td>
										<td>Agent_Name</td>
										<td>Employee_ID</td>
										<td>Process</td>
										<td>Sub Process</td>
										<td>Repoting_to</td>
										<td>Action</td>
										</tr>
										<?php
										$nums =1;
										$reuse = new Retrieve();
										$table = "qc_agentdata";
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
												<td><?php echo $des['qc_agentname'];?></td>
												<td><?php echo $des['qc_agentid'];?></td>
												<td><?php echo $des['qc_agentprocess'];?></td>
												<td><?php echo $des['qc_agentchildpro'];?></td>
												<td><?php echo $des['qc_reportingm'];?></td>
												<td><a href="add-qa-agent.php?g=<?php echo $des['qc_sno'];?>" class="text-primary"><i class="fa fa-edit"></i></a> | <a href="functions.php?case=delpos&p=<?php echo basename($_SERVER['PHP_SELF'])?>&g=<?php echo $des['qc_sno'];?>" class="text-danger" onclick="return confirm('Are you Sure!')"><i class="fa fa-trash"></i></a></td>
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
							$table = "qc_agentdata";
							$cond = array(
								'qc_sno' => $g
							);
							$reuse = new Retrieve();
							$sdata = $reuse->singleData($table, $cond)
							?>
							<form class="" method="POST" action="functions.php?case=agentupdate&p=<?php echo basename($_SERVER['PHP_SELF'])?>&g=<?php echo $_GET['g'];?>">

								<div class="paraform">
				<h4>Add QA Agent</h4>

			
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
					<label></label>
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
					<label>Reporting :</label>
				<select class="form-control" name="reporting">
					<option hidden>Reporting to</option>
					<?php
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
							<option value="<?php echo $des['qc_empid'];?>;<?php echo $des['qc_name'];?>"><?php echo $des['qc_name'];?> (<?php echo $des['qc_empid'];?>)</option>
							<?php
						}
					}
							?>
				</select>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Designation :<small>(optional)</small></label>
				<input type="text" name="design" value="Quality Analyst" class="form-control">
				</div>

				
			</div>
			
			
			</div>
			
			<div class="form-group popbtn">
				<input type="submit" name="agentupdate" value="Submit" class="btn btn-primary">
				
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
		<form class="" method="POST" action="functions.php?case=qagent&p=<?php echo basename($_SERVER['PHP_SELF'])?>">
			<div class="paraform">
				<h4>Add QA Agent</h4>

			
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
					<label></label>
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
					<label>Reporting :</label>
				<select class="form-control" name="reporting">
					<option hidden>Reporting to</option>
					<?php
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
							<option value="<?php echo $des['qc_empid'];?>;<?php echo $des['qc_name'];?>"><?php echo $des['qc_name'];?> (<?php echo $des['qc_empid'];?>)</option>
							<?php
						}
					}
							?>
				</select>
				</div>
				<div class="col-lg-6 col-md-6">
					<label>Designation :<small>(optional)</small></label>
				<input type="text" name="design" value="Quality Analyst" class="form-control">
				</div>

				
			</div>
			
			
			</div>
			
			<div class="form-group popbtn">
				<input type="submit" name="saveagent" value="Submit" class="btn btn-primary">
				<span class="btn btn-danger ms-2" onclick="document.getElementById('posform').style.display='none'"><i class="fa fa-close"></i> Close</span>
			</div>
		</form>
	</div>
</div>

<?php

include('footer.php');
?>