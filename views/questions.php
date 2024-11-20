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
				<div class="brudcrumb">
						<span>Breadcrumb : <?php echo $pageName;?></span>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row mb-4">
					<div class="col-lg-6 col-md-6">
						
						
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="rightbtn clearfix">
					<button class="right-btn" onclick="document.getElementById('posform').style.display='block'"><i class="fa fa-plus"></i> Add Questions</button>
						</div>
					</div>

				</div>
				<div class="data-table table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<tr class="bgsky">
							<td>S.No</td>
							<td>Parameters</td>
							<td>Question</td>
							<td>Weightage</td>
							<td>Status</td>
							<td>Action</td>
							
						</tr>
						<?php
							$nums =1;
							$reuse = new Retrieve();
							$table = "qc_questions";
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
									<td><?php echo $row['qc_parameter'];?></td>
									<td><?php echo $row['qc_questions'];?></td>
									<td><?php echo $row['qc_weightage'];?></td>
									<td><?php echo $row['qc_action'];?></td>
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
		</div> <!--  close mainbar blk -->
	</div> <!--  close wrapper blk -->
<div class="popupform" id="posform">
	<div class="popform">
		<form class="" method="POST" action="functions.php?case=ques&p=<?php echo basename($_SERVER['PHP_SELF'])?>">
			<div class="paraform">
				<h4>Questions Form</h4>

			
			<div class="form-group">
				<label>Select Parameter</label>
				<select class="form-control" name="parameter">
					<option hidden>Select Parameter</option>
					<?php
					$reuse = new Retrieve();
					$table = "qc_parameters";
					$cond = array(
						'qc_createdby' => $uemail,
						'qc_status' => '1'
					);
					$coal = $reuse->allDatacond($table,$cond);
					if(is_array($coal) || is_object($coal))
					{
						foreach($coal as $col)
						{
							echo "<option value='".$col['qc_parameterdel']."'>".$col['qc_parameterdel']."</option>";
						}
					}
					
					?>
				</select>
			</div>
			<br>
			<div class="row form-group">
				
				<div class="col-lg-4 col-md-4">
					<label>Select Status</label>
					<select class="form-control" name="fatal">
						<option selected value="Non Fatal">Non Fatal</option>
						<option value="Fatal">Fatal</option>
					</select>
				</div>
				<div class="col-lg-4 col-md-4">
					<label>Weightage</label>
					<input type="number" name="weightage" value="1" min="1" max="50" class="form-control">
				</div>

				

			</div>
			<br>
			<div class="form-group">
				<label>Quetions Details :</label>
				<textarea name="qdetail" class="form-control"></textarea>
			</div>
			</div>
			
			<div class="form-group popbtn">
				<input type="submit" name="quesave" value="Submit" class="btn btn-primary">
				<span class="btn btn-danger ms-2" onclick="document.getElementById('posform').style.display='none'"><i class="fa fa-close"></i> Close</span>
			</div>
		</form>
	</div>
</div>


<?php

include('footer.php');
?>