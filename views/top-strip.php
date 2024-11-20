<div class="breadcrumb-content">
		<span><?php  echo "User : ".$_SESSION['uname']." / ";?><?php  
				echo "Computer IP ".$_SERVER['REMOTE_ADDR'];
			
		?></span>			
</div>
<div class="top-strip-menu">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="collapsibleNavbar">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link" href="parameters.php"><i class="fa fa-cogs"></i> Parameters</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="questions.php"><i class="fa fa-ticket"></i> Questions</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="qamaster.php"><i class="fa fa-universal-access"></i> QA Master</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="qaagent.php"><i class="fa fa-user-secret"></i> QA Agent</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="callsaudit.php"><i class="fa fa-headphones"></i> Calls Audit</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="qareports.php"><i class="fa fa-bar-chart"></i> QA Reports</a>
	        </li>
	      </ul>
	    </div>
	</nav>
</div>