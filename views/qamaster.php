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
					<div class="col-lg-2 col-md-2">

						<div class="card orangecard">
							<div class="card-body">
								<div class="setcard-left">

									<h6> Total <br><strong style="color:#ff8303">Data</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-database"></i></span>
								</div>

							</div>
							
						</div>
					</div>
					<div class="col-lg-2 col-md-2">
						<div class="card greencard">
							<div class="card-body">
								<div class="setcard-left">

									<h6> Not <br><strong style="color:#018d5c">Assign</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-low-vision"></i></span>
								</div>

							</div>
							
						</div>
					</div>
					<div class="col-lg-2 col-md-2">
						<div class="card bluecard">
							<div class="card-body">
								<div class="setcard-left">

									<h6> Quality <br><strong style="color:#02817e">Approve</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-trophy"></i></span>
								</div>

							</div>
							
						</div>
					</div>
					<div class="col-lg-2 col-md-2">
						<div class="card redcard">
							<div class="card-body">
								<div class="setcard-left">

									<h6> Quality <br><strong style="color:#c79d03">Rework</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-retweet"></i></span>
								</div>

							</div>
							
						</div>
					</div>
					<div class="col-lg-2 col-md-2">
						<div class="card redcard">
							<div class="card-body">
								<div class="setcard-left">

									<h6> Quality <br><strong style="color:#ff8303">Hold</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-hand-stop-o"></i></span>
								</div>

							</div>
							
						</div>
					</div>
					<div class="col-lg-2 col-md-2">
						<div class="card redcard">
							<div class="card-body">
								<div class="setcard-left">

									<h6> Quality <br><strong style="color:#b52634">Rejected</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-microphone-slash"></i></span>
								</div>

							</div>
							
						</div>
					</div>


				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="chart-view mt-5">
							<canvas id="myChartt" style="width:100%;max-width:100%"></canvas>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>

<script>
var aValues = ["Rejected", "Pending", "Rework", "Hold", "Approved"];
var bValues = [55, 49, 44, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChartt", {
  type: "doughnut",
  data: {
    labels: aValues,
    datasets: [{
      backgroundColor: barColors,
      data: bValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Silaris Quality Agent Data Report"
    }
  }
});
</script>

<?php

include('footer.php');
?>