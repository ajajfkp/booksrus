<div class="container" style="margin-top: 75px;">
<div class="row">
<div class="col-sm-3">
	<!-- Left column -->
	<a href="<?php echo base_url('dashboard/index'); ?>"><strong><i class="glyphicon glyphicon-dashboard"></i> Dashboard</strong></a>
	<hr>
	
	<nav class="navbar navbar-default sidebar" role="navigation">
		<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>      
		</div>
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="<?php echo base_url('dashboard/index')?>">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a>
				</li>
				<li>
				<a href="#">Sell books<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-usd"></a>
				</li>
				<li>
					<a href="<?php echo base_url('search/searchBooks'); ?>">Search & buy<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search"></a>
				</li>
				<li>
					<a href="<?php echo base_url('dashboard/index')?>">Buy Books<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">User aria <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
					<ul class="dropdown-menu forAnimate" role="menu">
						<li><a href="<?php echo base_url('users/changenamae'); ?>">Change Name</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url('users/changecontact'); ?>">Change address details</a></li>
						<li class="divider"></li>
						<li><a href="#">Change phone</a></li>
						<li class="divider"></li>
						<li><a href="#">Change password</a></li>
						<li class="divider"></li>
						<li><a href="#">Change email</a></li>
						<li class="divider"></li>
						<li><a href="#">Email notifications</a></li>
					</ul>
				</li>          
				<li ><a href="#">Libros<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>        
				<li ><a href="#">Tags<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
			</ul>
		</div>
		</div>
	</nav>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!--<ul class="nav nav-stacked">
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
				Dashboard <i class="glyphicon glyphicon-chevron-down"></i>
			</a>
			<ul class="nav nav-stacked collapse in" id="userMenu">
				<li class="active"> <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-book"></i> Buy Books</a></li>
				<li><a href="#"><i class="glyphicon glyphicon-usd"></i> Sell books</a></li>
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
	</ul>-->
</div>
<!-- /col-3 -->
<div class="col-sm-9">
<a><strong><?php echo $title_for_page; ?></strong></a>
<hr>
<div class="row">
<!-- center left-->
<div class="col-md-8">