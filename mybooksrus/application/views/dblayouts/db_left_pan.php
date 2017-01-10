<div class="container" style="margin-top: 75px;">
<div class="row">
<div class="col-sm-3">
	<!-- Left column -->
	<a href="<?php base_url('dashboard/index')?>"><strong><i class="glyphicon glyphicon-home"></i> Home</strong></a>
	<hr>
	<ul class="nav nav-stacked">
		<?php 
		$getuserAuth = $this->utilities->getUserTypeAndStatus();
		if ($getuserAuth['user_type']=='admin') { ?>
		<li class="nav-header">
			<a href="#" data-toggle="collapse" data-target="#userAdminMenu">
				<span class="glyphicon glyphicon-tasks"></span> Administrator 
				<i class="glyphicon glyphicon-chevron-down"></i>
			</a>
			<ul class="nav nav-stacked collapse in" id="userAdminMenu">
				<li class="active">
					<a href="#"><i class="glyphicon glyphicon-user"></i> New user
						<span class="badge badge-info">4</span>
					</a>
				</li>
				<li>
					<a href="#"><i class="glyphicon glyphicon-envelope"></i> Users messages
						<span class="badge badge-info">4</span>
					</a>
				</li>
				<li><a href="#"><i class="glyphicon glyphicon-pencil"></i> Set permission</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-comment"></i> Approve adds</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-user"></i> User list</a></li>
			</ul>
		</li>
		<?php } else { ?>
		<li class="nav-header">
			<a href="#" data-toggle="collapse" data-target="#userMenu">
				<span class="glyphicon glyphicon-cog"></span> Settings 
				<i class="glyphicon glyphicon-chevron-down"></i>
			</a>
			<ul class="nav nav-stacked collapse in" id="userMenu">
				<li class="active"> <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Messages <span class="badge badge-info">4</span></a></li>
				<li><a href="#"><i class="glyphicon glyphicon-cog"></i> Options</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-comment"></i> Shoutbox</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-user"></i> Staff List</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-flag"></i> Transactions</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-exclamation-sign"></i> Rules</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
			</ul>
		</li>
		<?php } ?>
		<li class="nav-header">
			<a href="#" data-toggle="collapse" data-target="#menu2"> Reports <i class="glyphicon glyphicon-chevron-right"></i></a>
			<ul class="nav nav-stacked collapse" id="menu2">
				<li><a href="#">Information &amp; Stats</a>
				</li>
				<li><a href="#">Views</a>
				</li>
				<li><a href="#">Requests</a>
				</li>
				<li><a href="#">Timetable</a>
				</li>
				<li><a href="#">Alerts</a>
				</li>
			</ul>
		</li>
		<li class="nav-header">
			<a href="#" data-toggle="collapse" data-target="#menu3"> Social Media <i class="glyphicon glyphicon-chevron-right"></i></a>
			<ul class="nav nav-stacked collapse" id="menu3">
				<li><a href=""><i class="glyphicon glyphicon-circle"></i> Facebook</a></li>
				<li><a href=""><i class="glyphicon glyphicon-circle"></i> Twitter</a></li>
			</ul>
		</li>
	</ul>
	<hr>
</div>
<!-- /col-3 -->
<div class="col-sm-9">
<a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>
<hr>
<div class="row">
<!-- center left-->
<div class="col-md-8">