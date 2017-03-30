<div class="row">
    <div class="col-md-12 well">
		<?php $attributes = array("name" => "addusersuni", "class"=>"form-horizontal");
						echo form_open("common/commonctrl/addusersuniv", $attributes);?>
			<legend>
				Hi! <?php echo $name; ?>
				<p>
					Please select your school
				</p>
			</legend>
			<fieldset>
				<div class="form-group row">
					<label for="passwd" class="col-sm-3 control-label">State</label>
					<div class="col-sm-9">
						<select placeholder="State" class="form-control" id="state" name="state" onchange="getUniListByStateId(this,1)">
							<?php 
							$stateOption = '<option value="">Select State</option>';
								$listState = $this->utilities->getAllState('','3926');
								if($listState){
									foreach($listState as $state){
										$stateOption.="<option value='". $state->id ."'" . set_select('state', $state->id) . ">".$state->name."</option>";
									}
									echo $stateOption;
								}
							?>
						</select>
						<span class="text-danger"><?php echo form_error('state'); ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="passwd" class="col-sm-3 control-label">School</label>
					<div class="col-sm-9">
						<select placeholder="School" class="form-control" id="university" name="university" onchange="openuserunivaddform(this);">
							<?php 
							$univOption = '<option value="">Select School</option>';
								$listUniv = $this->utilities->getListUnivesityByStatteId('3926');
								if($listUniv){
									foreach($listUniv as $univ){
										$univOption.="<option value='". $univ->id ."'>".$univ->name."</option>";
									}
								}
								$univOption .= '<option value="-2">Other</option>';
								echo $univOption;
							?>
						</select>
						<span class="text-danger"><?php echo form_error('university'); ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-4 control-label">&nbsp;</label>
					<div class="col-sm-8">
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-lg-offset-2 col-sm-10">
						<div class="text-center">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>

			</fieldset>
		<?php echo form_close(); ?>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
</div>