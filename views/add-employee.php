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
				<div class="row mb-3">
					<div class="col-lg-6 col-md-6">
						
					</div>
					<div class="col-lg-6 col-md-6">
						<a href="<?php echo PUB?>downloads/employee_format.xls" class="right-btn" download><i class="fa fa-download"></i> Excel Format</a>
					</div>

				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						
							<form class="" method="POST" action="functions.php?case=addemp&p=<?php echo basename($_SERVER['PHP_SELF'])?>">

								<div class="paraform">
				<h4>Add Employee</h4>

			
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
					<label>Select Campaign</label>
									<select class="form-control" name="cprocess">
										<option hidden>Choose Campaign</option>
										<?php
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
												<option value="<?php echo $des['qc_campname'];?>"><?php echo $des['qc_campname'];?></option>
												<?php
											}
										}
												?>
									</select>
				</div>

				
			</div>
			
			
			</div>
			
			<div class="form-group popbtn">
				<input type="submit" name="agentupdate" value="Submit" class="btn btn-primary">
				
			</div>
			
						</form>
							
					</div>
					<div class="col-lg-6 col-md-6">
						<form class="" method="POST" action="callingfile.php?case=addfile&p=<?php echo basename($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

							<div class="paraform">
								<h4>Add By File</h4>
								<div class="form-group">
									<label>Choose Data File :</label>
									<input type="file" name="fileupload" class="form-control">
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
										<label>Select Child Process</label>
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
										<label>Select Campaign</label>
									<select class="form-control" name="campaign">
										<option hidden>Choose Campaign</option>
										<?php
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
												<option value="<?php echo $des['qc_campname'];?>"><?php echo $des['qc_campname'];?></option>
												<?php
											}
										}
												?>
									</select>
									</div>

									
								</div>
							</div>
							
			
							<div class="form-group popbtn">
								<input type="submit" name="addfile" value="Submit" class="btn btn-primary">
								
							</div>
			
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>



<?php

include('footer.php');
?>