<div class="row">
    <div class="col-md-12 well">
      <?php $attributes = array("name" => "address","method"=>"post","class"=>"form-horizontal");
					echo form_open("users/updateaddress", $attributes);?>
        <fieldset>
          <!-- Form Name -->
		<legend>Address Details</legend>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-4 control-label" for="address_one">Address Line One:</label>
			<div class="col-sm-8">
				<input type="text" placeholder="Address Line 1" class="form-control" id="address_one" name="address_one" value="<?php echo $userData['address_one']; ?>">
				<span class="text-danger"><?php echo form_error('address_one'); ?></span>
			</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-4 control-label" for="address_two">Address Line Two:</label>
			<div class="col-sm-8">
				<input type="text" placeholder="Address Line 2" class="form-control" id="address_two" name="address_two" value="<?php echo $userData['address_two']; ?>">
				<span class="text-danger"><?php echo form_error('address_two'); ?></span>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-4 control-label" for="textinput">Postcode:</label>
			<div class="col-sm-8">
			  <input type="text" placeholder="Post Code" class="form-control" id="pincode" name="pincode" value="<?php echo $userData['pincode'] ? $userData['pincode'] : ''; ?>">
			  <span class="text-danger"><?php echo form_error('pincode'); ?></span>
			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-4 control-label" for="textinput">State:</label>
			<div class="col-sm-8">
				<select placeholder="State" class="form-control" id="state" name="state" onchange="getCityByStateId(this)">
					<?php 
						$stateOption = '<option value="">Select State</option>';
						if($allstates){
							foreach($allstates as $state){
								$stateOption.="<option value='". $state->id ."'" . (($state->id ==$userData['state_id'])?'selected':'') . ">".$state->name."</option>";
							}
							echo $stateOption;
						}
					?>
				</select>
				<span class="text-danger"><?php echo form_error('state'); ?></span>
			</div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-4 control-label" for="city">City:</label>
			<div class="col-sm-8">
				<select id="city" name="city" class="form-control">
					<?php 
					$option = '<option value="">Select city</option>';
					if($allcitys){
						foreach($allcitys as $allcity){
							$option.="<option value='". $allcity->id ."'" . (($allcity->id ==$userData['city_id'])?'selected':'') . ">".$allcity->name."</option>";
						}
					}
					echo $option;
				?>
				</select>
				<span class="text-danger"><?php echo form_error('city'); ?></span>
			</div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-4 control-label" for="textinput">Country:</label>
			<div class="col-sm-8">
			<select id="country" name="country" class="form-control" id="country">
				<?php 
					$option = '';//'<option value="">Select Country</option>';
					$listCountery = $this->utilities->getAllCountry();
					if($listCountery){
						foreach($listCountery as $countrie){
							$option.="<option value='". $countrie->id ."'>".$countrie->name."</option>";
						}
					}
					echo $option;
				?>
			</select>
			<span class="text-danger"><?php echo form_error('city'); ?></span>
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