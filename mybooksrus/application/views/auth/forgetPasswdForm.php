</header>
<div class="container varify-email-card" style="margin-top: 60px;">
	<div class="row su-frm-bcgrnd">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="text-center">
					  <h3><i class="fa fa-lock fa-4x"></i></h3>
					  <h2 class="text-center">Forget Password</h2>
					  <p>You can send reset password link.</p>
						<div class="panel-body">
						  
						<?php $attributes = array("name" => "sendvarifyemail");
						echo form_open("auth/forgetpasswdemail", $attributes);?>
							<fieldset>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

										<input id="emailInput" name="emailInput" placeholder="email address" class="form-control" type="email" value="<?php echo set_value('emailInput'); ?>" oninvalid="setCustomValidity('Please enter a valid email address!')" onchange="try{setCustomValidity('')}catch(e){}" required="">
									</div>
									<span class="text-danger"><?php echo form_error('emailInput'); ?></span>
								</div>
								<div class="form-group">
									<input class="btn btn-lg btn-primary btn-block" value="Send Email" type="submit">
								</div>
								<div class="form-group">
									<?php echo $this->session->flashdata('msg'); ?>
								</div>
							</fieldset>
						<?php echo form_close(); ?>
						  
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>