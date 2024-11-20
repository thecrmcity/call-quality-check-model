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
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="col-lg-3 col-md-3">

						<div class="card orangecard">
							<div class="card-body">
								<div class="setcard-left">

									<h6> ADD <br><strong style="color:#9d3506">Position</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-plus"></i></span>
								</div>

							</div>
							<div class="card-footer">
								<a href="add-position.php">Go to Page <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3">
						<div class="card greencard">
							<div class="card-body">
								<div class="setcard-left">

									<h6> ADD <br><strong style="color:#018d5c">Team Head</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-plus"></i></span>
								</div>

							</div>
							<div class="card-footer">
								<a href="add-teamhead.php">Go to Page <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3">
						<div class="card bluecard">
							<div class="card-body">
								<div class="setcard-left">

									<h6> ADD <br><strong style="color:#02817e">Blank</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-plus"></i></span>
								</div>

							</div>
							<div class="card-footer">
								<a href="">Go to Page <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3">
						<div class="card redcard">
							<div class="card-body">
								<div class="setcard-left">

									<h6> ADD <br><strong style="color:#b52634">Blank</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-plus"></i></span>
								</div>

							</div>
							<div class="card-footer">
								<a href="">Go to Page <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>



<?php

include('footer.php');
?>