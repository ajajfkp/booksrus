</header>
<section class="well5 bg-alt">
<div class="container">

	<div class="row">
		<div class="su-frm-bcgrnd">
			<div class="row">
				<legend><center> SignUp - Collegebooks'r'us</center></legend>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?php $attributes = array("name" => "signupform","class" => "form-horizontal");
					echo form_open("auth/signupauth", $attributes);?>
					<div class="form-group">
						<label for="firstNname" class="col-sm-4 control-label">First Name</label>
						<div class="col-sm-8">
							<input class="form-control" name="first_name" placeholder="Your First Name" type="text" value="<?php echo set_value('first_name'); ?>" />
							<span class="text-danger"><?php echo form_error('first_name'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-4 control-label">Last Name</label>
						<div class="col-sm-8">
							<input class="form-control" name="last_name" placeholder="Last Name" type="text" value="<?php echo set_value('last_name'); ?>" />
							<span class="text-danger"><?php echo form_error('last_name'); ?></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="passwd" class="col-sm-4 control-label">Password</label>
						<div class="col-sm-8">
							<input class="form-control" name="passwd" placeholder="Password" type="password" />
							<span class="text-danger"><?php echo form_error('passwd'); ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="subject" class="col-sm-4 control-label">Confirm Password</label>
						<div class="col-sm-8">
							<input class="form-control" name="cpasswd" placeholder="Confirm Password" type="password" />
							<span class="text-danger"><?php echo form_error('cpasswd'); ?></span>
						</div>
					</div>
					
					
					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">Email ID</label>
						<div class="col-sm-8">
							<input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
							<span class="text-danger"><?php echo form_error('email'); ?></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">&nbsp;</label>
						<div class="col-sm-8">
							<div class="g-recaptcha" data-sitekey="<?php echo RE_CAPTCHA_SITEKEY; ?>"></div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label">&nbsp;</label>
						<div class="col-sm-8">
							<button name="submit" type="submit" class="btn btn-info">Signup</button>
							<a href="<?php echo base_url();?>" class="btn btn-info">Cancel</a>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-4 control-label">&nbsp;</label>
						<div class="col-sm-8">
							<?php echo $this->session->flashdata('msg'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12 text-center">Already Registered?
							<a href="<?php echo base_url(); ?>auth/signin">Login Here</a>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
				<div class="col-md-6">
					<div class='whysign' style="margin-left:20px;">
						<h3 class="text-center">Collegegebooks'R'us</h3>
						<br />
						<br />
						<p><h5>&#x25CF; Sign up to Collegegebooksrus with one-click!</h5></p>
						<p><h5>&#x25CF; Buy and sell books with Collegegebooksrus</h5></p>
						<p><h5>&#x25CF; By signing-up, you agree to the Collegegebooksrus.com <a href="<?php echo base_url('index/termsandpolicy')?>" target="_blank">Privacy Policy and Terms & Conditions.</a></h5></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>