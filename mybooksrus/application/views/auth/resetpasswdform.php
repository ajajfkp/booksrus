<div class="container varify-email-card" style="margin-top: 60px;">
	<div class="text-center su-frm-bcgrnd">
		<div class="row">
			<div class="col-sm-12">
			<h1>Change Password</h1>
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-4 col-sm-offset-4 panel panel-default panel-body">
				<p class="text-center">Use the form below to change your password.</p>
				<?php $attributes = array("name" => "sendvarifyemail");
						echo form_open("auth/resetpasswd/".$vfyId, $attributes);?>
					<div class="form-group">
							<input type="password" class="input-lg form-control" name="passwd" id="passwd" placeholder="New Password" autocomplete="off">
							<span class="text-danger"><?php echo form_error('passwd'); ?></span>
					</div>
					<div class="form-group">
						<input type="password" class="input-lg form-control" name="repasswd" id="repasswd" placeholder="Repeat Password" autocomplete="off">
						<span class="text-danger"><?php echo form_error('repasswd'); ?></span>
					</div>
					<div class="form-group">
						<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
					</div>
					<div class="form-group">
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
					<input type="hidden" name="vfyId" value="<?php echo $vfyId; ?>">
				<?php echo form_close(); ?>
			</div>
		</div><!--/col-sm-6-->
	</div><!--/row-->
</div>