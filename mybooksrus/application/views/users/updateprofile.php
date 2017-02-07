<div class="row well">
    <div class="col-md-12">
	<?php $attributes = array("name" => "profile","method"=>"post","class"=>"form-horizontal");
					echo form_open("users/updateprofile", $attributes);?>
        <fieldset>
          <!-- Form Name -->
          <legend>User profile</legend>
          <!-- Text input-->
          <div class="form-group row">
            <label class="col-sm-3 control-label" for="textinput">User Name:</label>
            <div class="col-sm-9">
              <input type="text" placeholder="User Name" class="form-control" id="username" name="username" value="<?php echo $userData['username']; ?>">
			  <span class="text-danger"><?php echo form_error('username'); ?></span>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">First Name:<span style="color:red;">*</span></label>
            <div class="col-sm-9">
              <input type="text" placeholder="First Name" class="form-control" id="first_name" name="first_name" value="<?php echo $userData['first_name']; ?>">
			  <span class="text-danger"><?php echo form_error('first_name'); ?></span>
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Middle Name</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Middle Name" class="form-control" id="middle_name" name="middle_name" value="<?php echo $userData['middle_name']; ?>">
				<span class="text-danger"><?php echo form_error('middle_name'); ?></span>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Last Name:<span style="color:red;">*</span></label>
            <div class="col-sm-9">
              <input type="text" placeholder="Last Name" class="form-control" id="last_name" name="last_name" value="<?php echo $userData['last_name']; ?>">
			  <span class="text-danger"><?php echo form_error('last_name'); ?></span>
            </div>
          </div>
          <!-- Text input-->
		  <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Mobile</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Mobile" class="form-control" id="mobile" name="mobile" value="<?php echo $userData['mobile']; ?>">
			  <span class="text-danger"><?php echo form_error('mobile'); ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Email Id</label>
            <div class="col-sm-9">
              <input type="text" placeholder="Email Id" class="form-control" id="email" name="email" value="<?php echo $userData['email_personal']; ?>">
			  <span class="text-danger"><?php echo form_error('email_personal'); ?></span>
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
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
</div>