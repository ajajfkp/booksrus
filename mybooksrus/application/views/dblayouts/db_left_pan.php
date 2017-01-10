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
<!-- column 2 -->
<ul class="list-inline pull-right">
	<li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a>
		<ul class="dropdown-menu" role="menu">
			<li><a href="#">1. Is there a way..</a></li>
			<li><a href="#">2. Hello, admin. I would..</a></li>
			<li><a href="#"><strong>All messages</strong></a></li>
		</ul>
	</li>
	<li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
	<li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span> Add Widget</a></li>
</ul>
<a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>
<hr>
<div class="row">
<!-- center left-->
<div class="col-md-8">