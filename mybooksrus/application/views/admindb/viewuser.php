<div class="row well">
    <div class="col-md-12">
	<?php $attributes = array("name" => "profile","method"=>"post","class"=>"form-horizontal");
					echo form_open("admindb/viewuser/".$userData['id']."/".$type, $attributes);?>
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
              <input type="text" placeholder="Email Id" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>" disabled >
			  <span class="text-danger"><?php echo form_error('email'); ?></span>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">School</label>
            <div class="col-sm-9">
				<select class="form-control selectpicker" id="university_id" name="university_id">
				<option value="">Select school</option>
				<?php 
					if($univList){ 
						foreach($univList as $univ){
						echo '<option value="'.$univ->id.'" '.(($userData['university_id']==$univ->id)?'selected':'').'>'.$univ->name .'</option>';
						}
					}
				?>
				</select>
				<span class="text-danger"><?php echo form_error('university_id'); ?></span>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">Status</label>
            <div class="col-sm-9">
				<select class="form-control selectpicker" id="active_status" name="active_status">
					<option value="1" <?php echo (($userData['active_status']==1)?"selected":"")?>>Active</option>
					<option value="0" <?php echo (($userData['active_status']==0)?"selected":"")?>>Inactive</option>
					<option value="2" <?php echo (($userData['active_status']==2)?"selected":"")?>>Delete</option>
				</select>
				<span class="text-danger"><?php echo form_error('active_status'); ?></span>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-sm-3 control-label" for="textinput">User type</label>
            <div class="col-sm-9">
				<select class="form-control selectpicker" id="user_type" name="user_type">
					<option value="1" <?php echo (($userData['user_type']==1)?"selected":"")?>>Admin</option>
					<option value="0" <?php echo (($userData['user_type']==0)?"selected":"")?>>User</option>
				</select>
				<span class="text-danger"><?php echo form_error('user_type'); ?></span>
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
				<?php
					if($type=='act'){
				?>
				<a href="<?php echo base_url('admindb/userlist')?>" type="submit" class="btn btn-default">Cancel</a>
				<?php
					}else if($type=='inact'){
						?>
				<a href="<?php echo base_url('admindb/inactivuserlist')?>" type="submit" class="btn btn-default">Cancel</a>
				<?php
					}else if($type=='del'){
				?>
				<a href="<?php echo base_url('admindb/deleteuserlist')?>" type="submit" class="btn btn-default">Cancel</a>
				<?php
					}
				?>
				
                <button type="submit" id="uderupdatebyadmin" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </fieldset>
      <?php echo form_close(); ?>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
</div>