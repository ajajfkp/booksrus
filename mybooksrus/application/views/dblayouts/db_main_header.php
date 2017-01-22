<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo base_url();?>" class="navbar-brand" >Collegebooksrus.com</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			<?php if ($this->session->userdata('login')){ ?>
				<li id="topdashboard" class="active">
					<a href="<?php echo base_url('dashboard');?>">
						<span class="glyphicon glyphicon-dashboard"></span> Dashboard
					</a>
				</li>
			<?php } else { ?>
				<li id="topdashboard" class="active">
					<a href="<?php echo base_url();?>">
						<span class="glyphicon glyphicon-home"></span> Home
					</a>
				</li>
			<?php } ?>
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
				<?php if ($this->session->userdata('login')){ ?>
				<li>
					<a>
						Hello <?php echo $this->session->userdata('uname'); ?>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>auth/logout">
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
			<!--<form class="navbar-form navbar-right">
				<div class="form-group">
					<input type="text" placeholder="Email" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" placeholder="Password" class="form-control">
				</div>
				<button type="submit" class="btn btn-success">Sign in</button>
			</form>-->
		</div><!--/.nav-collapse -->
	</div>
</div>
<!-- /Header -->