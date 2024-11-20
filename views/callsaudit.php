<?php

include('header.php');
?>
<div class="wrapper-blk">
		<div class="sidebar-blk">
			<?php include('call-sidebar.php');?>
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
						
					</div>

				</div>
				<div class="data-table table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<tr class="bgsky">
							<td>S.No</td>
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
			</div>
		</div>
	</div>



<?php

include('footer.php');
?>