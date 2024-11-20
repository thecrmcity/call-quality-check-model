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
						
					</div>
					<div class="col-lg-6 col-md-6">
						<form class="mb-3" method="GET">
							<div class="row">
								<div class="col">
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
								<div class="col">
									<select class="form-control" name="cprocess">
								<option hidden>Reporting</option>
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
										<option value="<?php echo $des['qc_empid'];?>;<?php echo $des['qc_name'];?>"><?php echo $des['qc_empid'];?>;<?php echo $des['qc_name'];?></option>
										<?php
									}
								}
										?>
							</select>
								</div>
								<div class="col">
									<input type="submit" value="Get" class="btn btn-primary">
								</div>

							</div>
							
							
							
						</form>
					</div>

				</div>
				<div class="data-table table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<tr class="bgsky">
							<td>S.No</td>
							<td>Employee_ID</td>
							<td>Employee_Name</td>
							<td>Date_of_Joining</td>
							<td>Process</td>
							<td>Sub_Process</td>
							<td>Reporting</td>
							<td>Campaign</td>
							<td>Status</td>
							<td>Action</td>
						</tr>
						<?php
							$nums =1;
							$reuse = new Retrieve();
							$table = "qc_employdata";
							$cond = array(
									'qc_createdby' => $uemail,
									'qc_status' => '1'
								);
								$rows = $reuse->allDatacond($table,$cond);
								if(is_array($rows) || is_object($rows))
								{
									foreach($rows as $row)
									{
									
									?>
									<tr>
									<td><?php echo $nums;?></td>
									<td><?php echo $row['qc_empid'];?></td>
									<td><?php echo $row['qc_empname'];?></td>
									<td><?php echo $row['qc_empdoj'];?></td>
									<td><?php echo $row['qc_emppro'];?></td>
									<td><?php echo $row['qc_empchild'];?></td>
									<td><?php echo $row['qc_reportingh'];?></td>
									<td><?php echo $row['qc_campaign'];?></td>
									<td><?php 
									$acts = $row['qc_status'];
									if($acts == "1")
									{
										echo "<span class='badge bg-success'>Active</span>";
									}
									else
									{
										echo "<span class='badge bg-secondary'>Deactive</span>";
									}
									?></td>
									
									<td><a href="functions.php?case=delques&p=<?php echo basename($_SERVER['PHP_SELF'])?>&g=<?php echo $row['qc_sno'];?>" class="text-danger"><i class="fa fa-trash"></i></a></td>
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



<?php

include('footer.php');
?>