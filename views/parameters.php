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
					<button class="right-btn" onclick="document.getElementById('posform').style.display='block'"><i class="fa fa-plus"></i> Add Parameters</button>
						</div>
					</div>

				</div>
				<div class="data-table table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<tr class="bgsky">
							<td>S.No</td>
							
							<td>Parameters</td>
							<td>Order No</td>
							
							<td>Edit</td>
						</tr>
						<?php
							$nums =1;
							$reuse = new Retrieve();
							$table = "qc_parameters";
							$cond = array(
								'qc_status' => '1',
								'qc_createdby' => $uemail
							);
							$splcon = "ORDER BY qc_orderno ASC";
							$rows = $reuse->allDatasplcond($table,$cond,$splcon);
							if(is_array($rows) || is_object($rows))
							{
								foreach($rows as $row)
								{
									
									?>
									<tr>
									<td><?php echo $nums;?></td>
									<td><?php echo $row['qc_parameterdel'];?></td>
									<td><?php echo $row['qc_orderno'];?></td>
									
									<td><a href="edit-parameter.php?e=<?php echo $row['qc_sno'];?>"><i class="fa fa-edit"></i></a></td>
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
		<form class="" method="POST" action="functions.php?p=<?php echo basename($_SERVER['PHP_SELF'])?>">
			<div class="paraform">
				<h4>Add Parameter</h4>

			
			<div class="form-group">
				<label>Parameter</label>
				<textarea name="paramet" class="form-control"></textarea>
			</div>
			<br>
			<div class="row form-group">
				<?php
					$reuse = new Retrieve();
					$table = "qc_parameters";
					$colname =  "qc_orderno";
					$olist = "ORDER BY qc_orderno DESC LIMIT 1";
					$coal = $reuse->singleRow($table, $colname, $olist);
				?>
				<div class="col-lg-4 col-md-4">
					<label>Order No</label>
					<input type="number" name="orderno" value="<?php echo $coal['qc_orderno']+1;?>" min="1" max="50" class="form-control">
				</div>
				

			</div>
			</div>
			
			<div class="form-group popbtn">
				<input type="submit" name="parasave" value="Submit" class="btn btn-primary">
				<span class="btn btn-danger ms-2" onclick="document.getElementById('posform').style.display='none'"><i class="fa fa-close"></i> Close</span>
			</div>
		</form>
	</div>
</div>


<?php

include('footer.php');
?>