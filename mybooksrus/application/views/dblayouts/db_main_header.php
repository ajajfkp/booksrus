<nav class="navbar navbar-inverse navbar-fixed-top" id="mainNave" style="box-shadow: 0 1px 2px #bbb;">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo base_url();?>" class="navbar-brand" ><img src="<?php echo base_url('assets/images/100x40.png');?>" alt="collegeboohsrus.com" /></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li id="topdashboard" class="active">
				<?php if( $this->utilities->getUserType() == 'admin'){ ?>
					<a href="<?php echo base_url('dashboard/admin');?>">
						<span class="glyphicon glyphicon-dashboard"></span> Dashboard
					</a>
				<?php }else{?>
				<a href="<?php echo base_url('dashboard');?>">
						<span class="glyphicon glyphicon-dashboard"></span> Dashboard
					</a>
				<?php }?>
				</li>
							<li id="topabout">
					<a href="<?php echo base_url('index/about');?>">
						About Us
					</a>
				</li>
				<li id="topcontact">
					<a href="<?php echo base_url('index/contact');?>">
						Contact Us
					</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!--<li>
					<a href="<?php echo base_url('dashboard');?>">
						<span class="glyphicon glyphicon-shopping-cart"></span> 4
					</a>
				</li>-->
				<?php if ($this->utilities->isAuth()){ ?>
				<li>
					<p class="navbar-text">
						Hello <?php echo $this->utilities->getSessionUserData('uname'); ?>
					</p>
				</li>
				<li>
					<a href="<?php echo base_url('auth/logout'); ?>">
						<span class="glyphicon glyphicon-off"></span> Log Out
					</a>
				</li>
				<?php } else { ?>
				<li id="topsignup">
					<a href="<?php echo base_url('auth/signup');?>">
						<span class="glyphicon glyphicon-user"></span> Sign Up
					</a>
				</li>
				<li id="topsignin">
					<a href="<?php echo base_url('auth/signin');?>">
						<span class="glyphicon glyphicon-log-in"></span> Login
					</a>
				</li>
				<?php } ?>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>
<header>
	<nav class="my-navbar-inverse" style="">
		<div class="container">
			<div class="row">
			  <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 hidden-xs">
				<div class="myclass">
					<a href="<?php echo base_url();?>" class="" >
						<img src="<?php echo base_url('assets/images/300x120.png');?>" alt="collegeboohsrus.com" width="85%" />
					</a>
				</div>
			  </div>
			  <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 hidden-xs">
				<div class="myclass">
					<div class="navbar navbar-default mynavbar">
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li id="intopdashboard" class="active">
									<?php if( $this->utilities->getUserType() == 'admin'){ ?>
									<a href="<?php echo base_url('dashboard/admin');?>">
										<span class="glyphicon glyphicon-dashboard"></span> Dashboard
									</a>
									<?php }else{?>
									<a href="<?php echo base_url('dashboard');?>">
										<span class="glyphicon glyphicon-dashboard"></span> Dashboard
									</a>
								<?php }?>
								</li>
								<li id="intopabout">
									<a href="<?php echo base_url('index/about');?>">About Us</a>
								</li>
								<li id="intopcontact">
									<a href="<?php echo base_url('index/contact');?>">Contact Us</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			  </div>
			  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<div class="head-btns myclass">
				<?php if (!$this->utilities->isAuth()){ ?>
					<a href="<?php echo base_url('auth/signup');?>" class="btn btn-default btn-sm">Sign Up</a>
					<a href="<?php echo base_url('auth/signin');?>" class="btn login-btn btn-sm">Sign In</a>
				<?php }else{ ?>
					<span style="color: #fff;margin-right: 10px;">
						Welcome! <?php echo ucfirst($this->utilities->getSessionUserData('uname')); ?>
					</span>
					<a href="<?php echo base_url('auth/logout'); ?>" class="btn login-btn btn-sm">Log Out</a>
				<?php } ?>
				</div>
			  </div>
			</div>
		</div>
	</nav>
</header>