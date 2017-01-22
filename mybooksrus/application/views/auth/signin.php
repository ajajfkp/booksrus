<div class="container" style="margin-top: 60px;">
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
					<div class='whysign'>
						<h1>Learn by Doing</h1>
						<p>Learning to code is not magic. It is as simply as opening your browser! See in real time the changes you make to HTMl, CSS, JavaScript, HAML, and more!</p>
						<p>Learn: 
							<span>HTML</span>
							<span>CSS</span>
							<span>JavaScript</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<hr>
