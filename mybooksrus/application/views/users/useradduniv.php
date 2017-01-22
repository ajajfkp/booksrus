<div class="sweet-overlay" tabindex="-1" style="opacity: 1.06; display:block;" id="addunivformclose">
	<div class="container" style="margin-top:60px;">
		<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
		<div class="row well">
			<fieldset>
				<div class="row">
					<div class="col-sm-12 pull-right">
						<span class="univ-pop-cross" id="univpopcross">X</span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<legend>Add University</legend>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<form name="adduniv" class="form-horizontal" method="post">
							<div class="form-group row">
								<label for="name" class="col-sm-3 control-label">University Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="name" name="name" placeholder="University name" value="<?php echo set_value('name'); ?>">
									<span class="text-danger" id="name_error"></span>
								</div>
							</div>	

							<div class="form-group row"> 
								<label for="nickname" class="col-sm-3 control-label">Nick Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nick name" value="<?php echo set_value('nickname'); ?>">
									<span class="text-danger" id="inckname_error"></span>
								</div>
							</div>
							
							<!--<div class="form-group row"> 
								<label for="year_establis" class="col-sm-3 control-label">Year Establis</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="year_establis" name="year_establis" placeholder="Year establis" value="<?php echo set_value('year_establis'); ?>">
									<span class="text-danger"><?php echo form_error('year_establis'); ?></span>
								</div>
							</div>-->
							
							<div class="form-group row"> 
								<label for="website" class="col-sm-3 control-label">Website</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="website" name="website" placeholder="www.example.com" value="<?php echo set_value('website'); ?>">
									<span class="text-danger"></span>
								</div>
							</div>
							
							<!--<div class="form-group row"> 
								<label for="address_one" class="col-sm-3 control-label">Street Address 1</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="address_one" name="address_one" placeholder="Address line one" value="<?php echo set_value('address_one'); ?>">
									<span class="text-danger"><?php echo form_error('address_one'); ?></span>
								</div>
							</div>
							
							<div class="form-group row"> 
								<label for="address_two" class="col-sm-3 control-label">Street Address 2</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="address_two" name="address_two" placeholder="JAddress line one" value="<?php echo set_value('address_one'); ?>">
									<span class="text-danger"><?php echo form_error('address_two'); ?></span>
								</div>
							</div>
							
							<div class="form-group row"> 
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
									<select placeholder="Satate" class="form-control" id="states" name="state" onchange="getCityByStateId(this)">
										<?php 
										$stateOption = '<option value="">Select state</option>';
											$listState = $this->utilities->getAllState('231');
											if($listState){
												foreach($listState as $state){
													$stateOption.="<option value='".$state->id . "'" . set_select('state', $state->id) . ">".$state->name."</option>";
												}
												echo $stateOption;
											}
										?>
									</select>
									<span class="text-danger" id="states_error"></span>
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
													$cityOption.="<option value='". $city->id ."'>".$city->name."</option>";
												}
												echo $cityOption;
											}
										?>
									</select>
									<span class="text-danger" id="city_error"></span>
								</div>
							</div>
							
							<div class="form-group row"> 
								<label for="full_name_id" class="col-sm-3 control-label"></label>
								<div class="col-sm-9">
									<button type="button" class="btn btn-md btn-primary" onclick="addunivbyuser();">Add university</button>
								</div>
							</div>    
						</form>
					</div>
				</div>
			<fieldset>
		</div>
		</div>
	</div>
</div>
