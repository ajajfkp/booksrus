<div class="row well">
	<fieldset>
		<div class="row">
			<legend>Add School</legend>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php $attributes = array("name" => "adduniversity","class"=>"form-horizontal");
						echo form_open("admindb/viewuniv/".$univData['id']."/".$type, $attributes);?>
					<div class="form-group row">
						<label for="name" class="col-sm-3 control-label">School Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="name" name="name" placeholder="School name" value="<?php echo $univData['name']; ?>">
							<span class="text-danger"><?php echo form_error('name'); ?></span>
						</div>
					</div>	

					<div class="form-group row"> 
						<label for="nickname" class="col-sm-3 control-label">Nick Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nick name" value="<?php echo $univData['nickname']; ?>">
							<span class="text-danger"><?php echo form_error('nickname'); ?></span>
						</div>
					</div>
					
					<div class="form-group row"> 
						<label for="year_establis" class="col-sm-3 control-label">Year Establis</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="year_establis" name="year_establis" placeholder="Year establis" value="<?php echo $univData['year_establis']; ?>">
							<span class="text-danger"><?php echo form_error('year_establis'); ?></span>
						</div>
					</div>
					
					<div class="form-group row"> 
						<label for="website" class="col-sm-3 control-label">Website</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="website" name="website" placeholder="www.example.com" value="<?php echo $univData['website']; ?>">
							<span class="text-danger"><?php echo form_error('website'); ?></span>
						</div>
					</div>
					
					<div class="form-group row"> 
						<label for="address_one" class="col-sm-3 control-label">Street Address 1</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="address_one" name="address_one" placeholder="Address line two" value="<?php echo $univData['address_one']; ?>">
							<span class="text-danger"><?php echo form_error('address_one'); ?></span>
						</div>
					</div>
					
					<div class="form-group row"> 
						<label for="address_two" class="col-sm-3 control-label">Street Address 2</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="address_two" name="address_two" placeholder="Address line one" value="<?php echo $univData['address_two']; ?>">
							<span class="text-danger"><?php echo form_error('address_two'); ?></span>
						</div>
					</div>
					
					<!--<div class="form-group row"> 
						<label for="full_name_id" class="col-sm-3 control-label">Country</label>
						<div class="col-sm-9">
							<select placeholder="Country" class="form-control" id="countery" name="countery">
								<?php 
								$option = '';//'<option value="">Select Country</option>';
									$listCountery = $this->utilities->getAllCountry();
									if($listCountery){
										foreach($listCountery as $countrie){
											$option.="<option value='". $countrie->id ."'>".$countrie->name."</option>";
										}
										echo $option;
									}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('countery'); ?></span>
						</div>
					</div>-->
					
					<div class="form-group row"> 
						<label for="full_name_id" class="col-sm-3 control-label">State</label>
						<div class="col-sm-9">
							<select placeholder="Satate" class="form-control" id="uni_state" name="state" onchange="getCityByStateId(this)">
								<?php 
								$stateOption = '<option value="">Select state</option>';
									$listState = $this->utilities->getAllState('231');
									if($listState){
										foreach($listState as $state){
											$stateOption.="<option value='".$state->id . "'" . (($state->id==$univData['state'])?'selected':'')." >".$state->name."</option>";
										}
										echo $stateOption;
									}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('state'); ?></span>
						</div>
					</div>
					
					<div class="form-group row"> 
						<label for="full_name_id" class="col-sm-3 control-label">City</label>
						<div class="col-sm-9">
							<select placeholder="City" class="form-control" id="city" name="city">
								<?php 
								$cityOption = '<option value="">Select City</option>';
									$listCity = $this->utilities->getAllCity('3926');
									if($listCity){
										foreach($listCity as $city){
											$cityOption.="<option value='".$city->id ."'". (($city->id==$univData['city'])?'selected':'') .">".$city->name."</option>";
										}
										echo $cityOption;
									}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('city'); ?></span>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-sm-4 control-label">&nbsp;</label>
						<div class="col-sm-8">
							<?php echo $this->session->flashdata('msg'); ?>
						</div>
					</div>
					
					<div class="form-group row"> 
						<label for="full_name_id" class="col-sm-3 control-label">&nbsp;</label>
						<div class="col-sm-9">
							<div class="pull-right">
								<?php
									if($type=='act'){
								?>
								<a href="<?php echo base_url('admindb/schoolList')?>" type="submit" class="btn btn-default">Cancel</a>
								<?php
									}else if($type=='appr'){
										?>
								<a href="<?php echo base_url('admindb/univapproved')?>" type="submit" class="btn btn-default">Cancel</a>
								<?php
									}else if($type=='inact'){
								?>
								<a href="<?php echo base_url('admindb/inactiveUniv')?>" type="submit" class="btn btn-default">Cancel</a>
								<?php
									}
								?>
								<button type="submit" class="btn btn-md btn-primary">Submit</button>
							</div>
						</div>
					</div>    
				<?php echo form_close(); ?>
			</div>
		</div>
	<fieldset>
</div>
</div>
