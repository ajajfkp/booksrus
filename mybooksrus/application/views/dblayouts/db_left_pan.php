<div class="container-fluid" style="padding-top: 20px;padding-bottom: 50px;background-color:#fff">
<div class="row">
<div class="col-sm-3">
	<!-- Left column -->
	<a href="<?php echo base_url('dashboard'); ?>"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>
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
				<?php if( $this->utilities->getUserType() == 'admin'){ ?>
				<li id="lefthome" class="">
					<a href="<?php echo base_url('dashboard/admin')?>">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a>
				</li>
				<li id="leftuseraria" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Setting<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
					<ul class="dropdown-menu forAnimate" role="menu">
						<li id="registeruser">
							<a href="<?php echo base_url('admindb/userlist'); ?>">
								Registered users
							</a>
						</li>
						<li class="divider"></li>
						<li id="schoollist">
							<a href="<?php echo base_url('admindb/schoolList'); ?>">
								School list
							</a>
						</li>
						<!--<li class="divider"></li>
						<li id="listad">
							<a href="<?php echo base_url('postyouradd/listuseradsetails'); ?>">
								Visitors
							</a>
						</li>-->
						<li class="divider"></li>
						<li id="addschool">
							<a href="<?php echo base_url('university'); ?>">
								Add school
							</a>
						</li>
					</ul>
				</li>
				<?php }else{ ?>
				<li id="lefthome" class="">
					<a href="<?php echo base_url('dashboard')?>">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a>
				</li>
				<?php } ?>
				
				<li id="leftsellbooks">
				<a href="<?php echo base_url('postyouradd')?>">Sell Books<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-usd"></a>
				</li>
				<li id="leftsearcby">
					<a href="<?php echo base_url('search/searchbooks'); ?>">Buy Books<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search"></a>
				</li>
				<!--<li id="leftbybook">
					<a href="<?php echo base_url('dashboard')?>">Buy Books<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></a>
				</li>-->
				<li id="leftuseraria" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Profile<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
					<ul class="dropdown-menu forAnimate" role="menu">
						<li id="changename"><a href="<?php echo base_url('users/updateprofile'); ?>">Update profile</a></li>
						<li class="divider"></li>
						<li id="changepasswd"><a href="<?php echo base_url('users/updatepasswd'); ?>">Change password</a></li>
						<li class="divider"></li>
						<?php if( $count = $this->utilities->listuserad($this->utilities->getSessionUserData('uid'))){?>
						<li id="listad">
							<a href="<?php echo base_url('postyouradd/listuseradsetails'); ?>">
								Books for sale
								<span class="badge badge-info"><?php echo $count; ?></span>
							</a>
						</li>
						<?php } ?>
						<!--<li class="divider"></li>
						<li id="changeaddr"><a href="<?php echo base_url('users/updateaddress'); ?>">Update address</a></li>
						<li class="divider"></li>
						<li id="changenotyfy"><a href="#">Email notifications</a></li>-->
					</ul>
				</li>
				<li id="messages">
					<a href="<?php echo base_url('message'); ?>">
						Messages
						<?php 
						$urcount = $this->utilities->getunreadcount($this->utilities->getSessionUserData('uid'));
						if($urcount){
						?>
						<span class="badge badge-info"><?php echo $urcount; ?></span>
						<?php
						}
						?>
					</a>
				</li>
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
<ul class="list-inline pull-right">
<li class="dropdown">
	<?php 
		$urcount = $this->utilities->getunreadcount($this->utilities->getSessionUserData('uid'));
		if($urcount){
	?>
	<a href="<?php echo base_url('message');?>" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		<i class="glyphicon glyphicon-comment"></i><span class="badge badge-info"><?php echo $urcount;?></span>
	</a>
	<?php 
		}
	?>
	<!--<ul class="dropdown-menu" role="menu" style="left: -150px;">
		<li><a href="#">1. Is there a way..</a></li>
		<li><a href="#">2. Hello, admin. I would..</a></li>
		<li><a href="#"><strong>All messages</strong></a></li>
	</ul>-->
</li>
</ul>
<a><strong><?php echo $title_for_page; ?></strong></a>
<hr>
<div class="row">
<!-- center left-->
<div class="col-md-8">