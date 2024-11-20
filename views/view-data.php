<?php

include('header.php');
?>
<div class="wrapper-blk">
		<div class="sidebar-view">
			<div class="sidebar-head">
				<div class="head-img">
					<a href=""><img src="<?php echo ASET.'img/silaris-qc.png'?>" alt="SilarisQC-Logo"></a>
				</div>
				<div class="head-link-view">
					<a href="dashboard.php" class="text-success" title="Home"><i class="fa fa-home"></i></a>
					<a href="" class="text-primary" onclick="window.location.reload();" title="Reload"><i class="fa fa-refresh"></i></a>
					<a href="setting.php" class="text-secondary" title="Master Maping"><i class="fa fa-cog"></i></a>
					<a href="logout.php" class="text-danger" title="Logout"><i class="fa fa-power-off"></i></a>

				</div>
			</div>
		</div>
		<div class="mainbar-blk">
			<div class="top-strip">
				<?php include('top-strip.php');?>
			</div>
			<div class="main-wrapper-view">
				<?php
					if(isset($_GET['id']))
					{
						$id = $_GET['id'];
						?>
						<div class="card">
							<div class="card-header bgcustom">Agent Details</div>
								<div class="card-body">
									<div class="userFrm">
										<div class="form-group row">
											<div class="col-lg-4 col-md-4 form-group">
												<label>Process Name </label>:
												<label> SBI Flexi Pay</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Agent Age </label>:
												<label> 0 Days</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>FTR Status </label>:
												<select>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>

										
											<div class="col-lg-4 col-md-4 form-group">
												<label>Customer Name </label>:
												<label> Dilip</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Lead Ref Number </label>:
												<label> 26095092206</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>SEX </label>:
												<label>Male</label>
											</div>

										
											<div class="col-lg-4 col-md-4 form-group">
												<label>State </label>:
												<label> ORI</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Surname </label>:
												<label> Shankar</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Title </label>:
												<label>MR</label>
											</div>

										
											<div class="col-lg-4 col-md-4 form-group">
												<label>EMI Offered </label>:
												<label> </label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>EMI Tenure </label>:
												<label> </label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>EMI Flag </label>:
												<label></label>
											</div>

										
											<div class="col-lg-4 col-md-4 form-group">
												<label>P Block </label>:
												<label> N</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Plan Type </label>:
												<label> </label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Plan Value </label>:
												<label></label>
											</div>

										
											<div class="col-lg-4 col-md-4 form-group">
												<label>Premium Amount </label>:
												<label> N</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Product Name </label>:
												<label> </label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Remarks </label>:
												<label></label>
											</div>

										
											<div class="col-lg-4 col-md-4 form-group">
												<label>Sub Disposition 1 </label>:
												<label> Ringing</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Sub Disposition 2 </label>:
												<label> Ringing</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Sub Disposition 3 </label>:
												<label>Ringing</label>
											</div>

										
											<div class="col-lg-4 col-md-4 form-group">
												<label>Verified By </label>
												:
												<label> </label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label></label>
												<label> </label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label></label>
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Agent Name</label>:
												<label>Rishi Kumar Jha</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Employee IDs</label>:
												<label>SIPLIND11227</label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Auditor's Name</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Week</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Call Date</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Call Class</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>TL Name</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Date of Audit</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>No of Call Recording</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Manager Name</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Verifier Code</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Available Recordings</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Wrong Disposition</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Dispostion</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Call Duration (Mins)</label>:
												<label></label>
											</div>
											
											<div class="col-lg-4 col-md-4 form-group">
												<label>Authentication Code</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>EMI Consent</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>IVR Consent Status</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Status Timing</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Caller on Call</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>IVR Same Caller</label>:
												<label></label>
											</div>
											<div class="col-lg-4 col-md-4 form-group">
												<label>Recording</label>:
												<label><button class="mediabtn" id="mediaid"><i class="fa fa-play"></i> Media</button></label>
											</div>
											<div class="card-footer" id="callmedia" style="display: none;margin-top: 10px;">
												<div class="col-lg-12 col-md-12 form-group">
													<table class="table-bordered">
														<tr>
															<td>Date of Recordings</td>
															
															<td>Audio</td>
															
														</tr>
														<tr>
															<td>5/1/2023 10:26:13 AM</td>
															
															<td>
																<audio controls>
																  <source src="<?php echo PUB?>uploads/archive/26095092206.mp3" type="audio/mpeg">
																</audio>
															</td>
														</tr>
													</table>
												</div>
											</div>
											
											

										</div>

									</div>  <!-- close form set-->
								 </div> <!-- card body close  -->
							</div> <!--  close card  -->
							<div class="card">
								<div class="card-header bgcustom text-center">Call Summary</div>
								<div class="card-body">
									<div class="col-lg-12 col-md-12 form-group">
										<textarea class="form-control" name="callsummary"></textarea>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header bgcustom text-center">AREAS OF STRENGTH - (Document positive areas of the AC's performance)</div>
								<div class="card-body">
									<div class="col-lg-12 col-md-12 form-group">
										<textarea class="form-control" name="callsummary"></textarea>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header bgcustom text-center">AREAS OF DEVELOPMENT - (Document any areas the AC requires development)</div>
								<div class="card-body">
									<div class="col-lg-12 col-md-12 form-group">
										<textarea class="form-control" name="callsummary"></textarea>
									</div>
									<div class="form-group row fw-bold">
										<div class="col-lg-4 col-md-4 form-group">
												<label>EXTERNAL PERFORMANCE % </label> :
												<label>100%</label>
										</div>
										<div class="col-lg-4 col-md-4 form-group">
												<label>INTERNAL PERFORMANCE % </label> :
												<label>100%</label>
										</div>
										<div class="col-lg-4 col-md-4 form-group">
												<label>FATAL ERROR CALLS </label> :
												<label>0</label>
										</div>
									</div>
									<div class="form-group row ">
										<div class="col-lg-4 col-md-4 form-group">
												<label>EXTERNAL PERFORMANCE % </label> :
												<label>100%</label>
										</div>
										<div class="col-lg-4 col-md-4 form-group">
												<label>INTERNAL PERFORMANCE % </label> :
												<label>100%</label>
										</div>
										<div class="col-lg-4 col-md-4 form-group">
												<label>FATAL ERROR CALLS </label> :
												<label>0</label>
										</div>
									</div>
										
								</div>

							</div>

						
						<?php
					}
				?>
				
			</div>
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
  $("#mediaid").click(function(){
    $("#callmedia").toggle();
  });
});
</script>

<?php

include('footer.php');
?>