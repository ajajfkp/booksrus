<div class="container" style="margin-top: 60px;">
	<div class="" style="height: 500px;">
		<div class="row">
			<div class="col-md-4 well">
			<?php $attributes = array("name" => "loginform");
				echo form_open("auth/signinauth", $attributes);?>
				<legend>Login</legend>
				<div class="form-group">
					<label for="name">Email-ID</label>
					<input class="form-control" name="email" placeholder="Enter Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
					<span class="text-danger"><?php echo form_error('email'); ?></span>
				</div>
				<div class="form-group">
					<label for="name">Password</label>
					<input class="form-control" name="passwd" placeholder="Password" type="password" value="<?php echo set_value('passwd'); ?>" />
					<span class="text-danger"><?php echo form_error('passwd'); ?></span>
				</div>
				<div class="form-group">
					<button name="submit" type="submit" class="btn btn-info">Login</button>
					<a href="<?php echo base_url();?>" class="btn btn-info">Cancel</a>
				</div>
			<?php echo form_close(); ?>
			<?php echo $this->session->flashdata('msg'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 text-center">	
			New User? <a href="<?php echo base_url(); ?>auth/signup">Sign Up Here</a>
			</div>
		</div>
	</div>
<hr>