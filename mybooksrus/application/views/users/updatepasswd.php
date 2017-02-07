<div class="row well">
	<div class="col-md-12">
		<?php $attributes = array("name" => "updatepasswd","method"=>"post","class"=>"form-horizontal");
					echo form_open("users/updatepasswd", $attributes);?>
        <fieldset>
          <!-- Form Name -->
          <legend>Update password</legend>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-5 control-label" for="textinput">Current password:<span style="color:red;">*</span></label>
            <div class="col-sm-7">
              <input type="password" placeholder="Current password" class="form-control" id="cpasswd" name="cpasswd" value="">
			  <span class="text-danger"><?php echo form_error('cpasswd'); ?></span>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-5 control-label" for="textinput">New password:<span style="color:red;">*</span></label>
            <div class="col-sm-7">
              <input type="password" placeholder="New password" class="form-control" id="newpasswd" name="newpasswd" value="">
			  <span class="text-danger"><?php echo form_error('newpasswd'); ?></span>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-5 control-label" for="textinput">Confirm New password:<span style="color:red;">*</span></label>
            <div class="col-sm-7">
              <input type="password" placeholder="Confirm New password" class="form-control" id="cnewpasswd" name="cnewpasswd" value="">
			  <span class="text-danger"><?php echo form_error('cnewpasswd'); ?></span>
            </div>
          </div>
		  <div class="form-group row">
				<label class="col-sm-3 control-label">&nbsp;</label>
				<div class="col-sm-9">
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
			</div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <a href="<?php echo base_url('dashboard')?>" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
		</fieldset>
    <?php echo form_close(); ?>
	</div>
</div>
</div>