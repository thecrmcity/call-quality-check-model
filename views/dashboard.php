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
					<div class="col-lg-5 col-md-5">
						<div class="chart-view mt-5">
							<canvas id="myCharts" style="width:100%;max-width:100%"></canvas>
						</div>
						<div class="chart-view mt-5">
							<canvas id="myCharto" style="width:100%;max-width:100%"></canvas>
						</div>
					</div>
					<div class="col-lg-5 col-md-5">
						<div class="chart-view mt-5">
							<canvas id="myChartt" style="width:100%;max-width:100%"></canvas>
						</div>
					</div>
					<div class="col-lg-2 col-md-2">
						<div class="card orangecard my-4">
							<div class="card-body">
								<div class="setcard-left">

									<h6> Quality <br><strong style="color:#ff8303">Pending</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-minus-circle"></i></span>
								</div>

							</div>
							
						</div>
						<div class="card orangecard mb-4">
							<div class="card-body">
								<div class="setcard-left">

									<h6> Complete <br><strong style="color:#c79d03">Rework</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-retweet"></i></span>
								</div>

							</div>
							
						</div>
						<div class="card greencard mb-4">
							<div class="card-body">
								<div class="setcard-left">

									<h6> TL <br><strong style="color:#02817e">Approved</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-trophy"></i></span>
								</div>

							</div>
							
						</div>
						<div class="card redcard mb-4">
							<div class="card-body">
								<div class="setcard-left">

									<h6> TL <br><strong style="color:#ff8303">Hold</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-hand-stop-o"></i></span>
								</div>

							</div>
							
						</div>
						<div class="card redcard mb-4">
							<div class="card-body">
								<div class="setcard-left">

									<h6> TL <br><strong style="color:#b52634">Calls</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-phone"></i></span>
								</div>

							</div>
							
						</div>
						<div class="card redcard mb-4">
							<div class="card-body">
								<div class="setcard-left">

									<h6> TL <br><strong style="color:#b52634">Rejected</strong></h6>
								</div>
								<div class="setcard-right">
									<span><i class="fa fa-microphone-slash"></i></span>
								</div>

							</div>
							
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

<script>
const eValues = [100,200,300,400,500,600,700,800,900,1000];

new Chart("myCharts", {
  type: "line",
  data: {
    labels: eValues,
    datasets: [{ 
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    }, { 
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    }, { 
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>

<script>
var xValues = ["Total", "Not Assign", "Rework", "Hold", "Rejected"];
var yValues = [55, 49, 44, 24, 15];
var barColors = ["#f56573", "#20c997","#0dcaf0","#ffc107","#d63384"];

new Chart("myCharto", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Silaris Quality Report"
    }
  }
});
</script>
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