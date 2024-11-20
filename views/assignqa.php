<?php

include('header.php');
?>
<div class="wrapper-blk">
		<div class="sidebar-blk">
			<?php include('master-sidebar.php');?>
		</div>
		<div class="mainbar-blk">
			<div class="top-strip">
				<?php include('top-strip.php');?>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						
					</div>
					<div class="col-lg-6 col-md-6">
						
					</div>

				</div>
				<form class="" method="POST" action="">
				<div class="data-table table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<tr class="bgsky">
							<td>S.No</td>
							<td>View</td>
							<td><input type="checkbox" name="" value="" class="chk_all" id="switch1"></td>
							<td>Master_ID</td>
							<td>Agent_Name</td>
							<td>Employee_ID</td>
							<td>Process</td>
							<td>Capaign_Name</td>
							<td>Start_Time</td>
							<td>End_Time</td>
							<td>Fist_Name</td>
							<td>Last_Name</td>
							<td>Lead_Ref_Number</td>
							<td>Sex</td>
							<td>State</td>
							<td>EMI_Offered</td>
							<td>EMI_Tenure</td>
							<td>EMI_Flag</td>
							<td>P_Block</td>
							<td>Plan_Type</td>
							<td>Plan_Value</td>
							<td>Premium_Amount</td>
							<td>Product_Name</td>
							<td>Remarks</td>
							<td>Sub_Disposition_1</td>
							<td>Sub_Disposition_2</td>
							<td>Sub_Disposition_3</td>
							<td>Verified_By</td>
							<td>Call_Status</td>
							<td>Sub_Disposition</td>
							<td>Disposition</td>
							<td>QA_Name</td>
							<td>QA_Manager</td>
							<td>PIDentifier</td>
						</tr>
						<?php
							$nums =1;
							$reuse = new Retrieve();
							$table = "qc_clientdata";
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
										<td><?php echo $nums; ?></td>
										<td><a href="view-data.php?id=<?php echo $des['qc_masterid'];?>" class="text-primary"><i class="fa fa-search"></i></a></td>
										<td><input type="checkbox" name="cantrash[]" class="chk_me" value="<?php echo $des['qc_callerempid'];?>"></td>
										<td><?php echo $des['qc_masterid'];?></td>
										<td><?php echo $des['qc_callername'];?></td>
										<td><?php echo $des['qc_callerempid'];?></td>
										<td><?php echo $des['qc_process'];?></td>
										<td><?php echo $des['qc_capigname'];?></td>
										<td><?php echo $des['qc_callstart'];?></td>
										<td><?php echo $des['qc_callend'];?></td>
										<td><?php echo $des['qc_clientname'];?></td>
										<td><?php echo $des['qc_surname'];?></td>
										<td><?php echo $des['qc_leadrefnum'];?></td>
										<td><?php echo $des['qc_sex'];?></td>
										<td><?php echo $des['qc_state'];?></td>
										<td><?php echo $des['qc_emioffered'];?></td>
										<td><?php echo $des['qc_emitenure'];?></td>
										<td><?php echo $des['qc_emiflag'];?></td>
										<td><?php echo $des['qc_pblock'];?></td>
										<td><?php echo $des['qc_plantype'];?></td>
										<td><?php echo $des['qc_planvalue'];?></td>
										<td><?php echo $des['qc_prmamount'];?></td>
										<td><?php echo $des['qc_productname'];?></td>
										<td><?php echo $des['qc_remark'];?></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<?php
									$nums++;
								}
							}
									?>
					</table>
				</div>
				
				
				<div class="row my-3 py-2 bgstrip">
					<div class="col">
						<select class="form-control" name="reporting">
					<option hidden>Assign to</option>
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
					<div class="col">
						<input type="submit" name="assign" value="Assign" class="btn btn-primary float-end mr-3" onclick="return confirm('Are you sure?')">
					</div>
				</div>
				
			</form>
			</div>
		</div>
	</div>

<script type="text/javascript">
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  
		  
		});
	</script>

<?php

include('footer.php');
?>