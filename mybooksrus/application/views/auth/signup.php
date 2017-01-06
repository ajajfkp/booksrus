<div class="container" style="margin-top: 60px;">
	<div class="row">
		<div class="col-md-4 well">
			<?php $attributes = array("name" => "signupform");
			echo form_open("auth/signupauth", $attributes);?>
			<legend><center> SignUp - Collegebooks'r'us</center></legend>
			
			<div class="form-group">
				<label for="firstNname" class="control-label">First Name</label>
				<input class="form-control" name="first_name" placeholder="Your First Name" type="text" value="<?php echo set_value('first_name'); ?>" />
				<span class="text-danger"><?php echo form_error('first_name'); ?></span>
			</div>			
		
			<div class="form-group">
				<label for="name">Last Name</label>
				<input class="form-control" name="last_name" placeholder="Last Name" type="text" value="<?php echo set_value('last_name'); ?>" />
				<span class="text-danger"><?php echo form_error('last_name'); ?></span>
			</div>
			
			<div class="form-group">
				<label for="passwd">Password</label>
				<input class="form-control" name="passwd" placeholder="Password" type="password" />
				<span class="text-danger"><?php echo form_error('passwd'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">Confirm Password</label>
				<input class="form-control" name="cpasswd" placeholder="Confirm Password" type="password" />
				<span class="text-danger"><?php echo form_error('cpasswd'); ?></span>
			</div>
			
			
			<div class="form-group">
				<label for="email">Email ID</label>
				<input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
				<span class="text-danger"><?php echo form_error('email'); ?></span>
			</div>

			

			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-info">Signup</button>
				<a href="<?php echo base_url();?>" class="btn btn-info">Cancel</a>
			</div>
			<?php echo form_close(); ?>
			<?php echo $this->session->flashdata('msg'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 text-center">	
		Already Registered? <a href="<?php echo base_url(); ?>auth/signin">Login Here</a>
		</div>
	</div>
<hr>