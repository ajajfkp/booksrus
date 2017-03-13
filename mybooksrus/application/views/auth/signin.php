</header>
<section class="well5 bg-alt">
<div class="container">
	<div class="row">
		<div class="su-frm-bcgrnd">
			<div class="row">
				<legend>Login</legend>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?php $attributes = array("name" => "loginform","class" => "form-horizontal");
						echo form_open("auth/signinauth", $attributes);?>
					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">Email ID</label>
						<div class="col-sm-8">
							<input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
							<span class="text-danger"><?php echo form_error('email'); ?></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="passwd" class="col-sm-4 control-label">Password</label>
						<div class="col-sm-8">
							<input class="form-control" name="passwd" placeholder="Password" type="password" />
							<span class="text-danger"><?php echo form_error('passwd'); ?></span>
						</div>
					</div>
					<?php 
						$attempt = $this->utilities->getWrongPasswdAtempt();
						if( $attempt > 3 ){
					?>
					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">&nbsp;</label>
						<div class="col-sm-8">
							<div class="g-recaptcha" data-sitekey="<?php echo RE_CAPTCHA_SITEKEY; ?>"></div>
						</div>
					</div>
					<?php
						}
					?>
					<div class="form-group">
						<label class="col-sm-4 control-label">&nbsp;</label>
						<div class="col-sm-8">
							<button name="submit" type="submit" class="btn btn-info">Login</button>
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
						<div class="col-md-12 text-center">
							New User ? <a href="<?php echo base_url(); ?>auth/signup">Sign Up Here</a>
							<a href="<?php echo base_url(); ?>auth/forgetpasswd" class="pull-right">Forgot Password ?</a>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12 text-center">
							
						</div>
					</div>

					<?php echo form_close(); ?>
				</div>
				<div class="col-md-6">
					<div class='whysign' style="margin-left:20px;">
						<h3 class="text-center">Collegegebooks'R'us</h3>
						<br />
						<br />
						<p><h5>&#x25CF; Sign in to Collegegebooksrus with one-click!</h5></p>
						<p><h5>&#x25CF; Buy and sell books with Collegegebooksrus</h5></p>
						<p><h5>&#x25CF; By signing-in, you agree to the Collegegebooksrus.com <a href="<?php echo base_url('index/termsandpolicy')?>" target="_blank">Privacy Policy and Terms & Conditions.</a></h5></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
